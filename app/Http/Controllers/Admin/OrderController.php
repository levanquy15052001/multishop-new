<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Information;
use App\Models\Order;
use App\Models\OrderOffline;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Route;

class OrderController extends Controller
{
    public function index()
    {
        $Information  = Information::with('Order')->get()->toArray();
        
        for ( $i = 0 ; $i < count($Information) ; $i++)
        {
            $total_order = 0;
            foreach ($Information[$i]['order'] as $key => $value)
            {
                $product_name = Product::where('id',$value['product_id'])->select('name')->first();
                $Information[$i]['order'][$key]['product_name'] = $product_name->name;
                $total_order += $Information[$i]['order'][$key]['price'] * $Information[$i]['order'][$key]['qty'];
            }
            $Information[$i]['total'] = $total_order;
        }
        return view('admin.order',compact('Information'));  
    }

    public function show($id)
    {
       dd($id);
        
    }

    public function store(Request $request)
    {
        if($request->has('action') && $request->has('id'))
        {
            $order = Order::where('id',$request->id)->first();
            if($request->action=='delete')
            {
                $order->delete();
                return redirect()->back()->with('success','Delete product to cart successfully');
            }
            
            if($request->action=='update')
            {

              return redirect()->route('admin.update.order',$request->id);
            }

            if($request->action=='confirm')
            {
                $Information  = Information::with('Order')->where('user_id',$request->id)->first()->toArray();

                
                for($i =0 ; $i< count($Information['order']) ;$i++)
                {
                    $product = Product::where('id',$Information['order'][$i]['product_id'])->first();
                    $Information['order'][$i]['product_name']=$product->name;

                }

                $total_order = 0;

                for($i =0 ; $i< count($Information['order']) ;$i++)
                {

                    $total_order += $Information['order'][$i]['price'] * $Information['order'][$i]['qty'];

                }

                Mail::send('user.email.bill', compact('Information','total_order'), function($email) use($Information){
                    $email->subject("Bill of sale");
                    $email->to($Information['email'], $Information['name']);
                });
  
                Order::where('user_id',$request->id)
                                ->where('status',2)    
                                ->update(['status'=>3]);
                            
                                
                return redirect()->route('admin.order')->with('success','Confirm Order Successfully');
            }
        }

        return view('home.products');
    }
    public function edit ($id){
        dd($id);
    }

    public function update(Request $request, $id)
    {
       dd($id);


        return view('home.products');
    }

    public function destroy($id)
    {
       
        return view('home.products');
    }

    public function update_order($id)
    {
      
        $product = Product::where('status',1)->get();
        $Information  = Information::with('Order')->where('user_id',$id)->first()->toArray();
       
            $total_order = 0;
            foreach ($Information['order'] as $key => $value)
            {
                $product_name = Product::where('id',$value['product_id'])->select('name')->first();
                $Information['order'][$key]['product_name'] = $product_name->name;
                $total_order += $Information['order'][$key]['price'] * $Information['order'][$key]['qty'];
                $Information['total'] = $total_order;
            }       
        return view('admin.update_order',compact('product','Information'));
    }

    public function create()
    {
        return view('admin.create_order');
    }
    
    public function information(Request $request)
    {
        $Information = Information::where('email',$request->email)->first();
        return $Information;
    }

    public function save_information(Request $request)
    {
        if ($request->has('update'))
        {
            return redirect()->route('admin.update.order',$request->user_id);
        }

          // vaidate
       
        $Information = new Information();
        $Information->name = $request->name;
        $Information->admin_id = Auth::guard('admin')->user()->id;
        $Information->address = $request->address;
        $Information->city = $request->city;
        $Information->district = $request->district;
        $Information->ward = $request->ward;
        $Information->phone = $request->phone;
        $Information->email = $request->email;
        $Information->save();
        return redirect()->route('admin.order.offline',$Information->id);
           
    }

    public function order_offline($id)
    { 
        $product = Product::where('status',1)->get();

        $Information = Information::with('Order_offline')->where('tbl_information.id',$id)->first();

        $Information['total_order'] = 0;
        foreach($Information->Order_offline as $key => $value)
        {
            
            foreach($product as  $item)
                {
                    if($value->product_id == $item->id)
                    {
                        $Information->Order_offline[$key]['product_name'] = $item->name;
                        $Information['total_order']+=  $Information->Order_offline[$key]->price * $Information->Order_offline[$key]->qty;
                    }
                }
        }
        return view('admin.order_offline',compact('Information','product'));
    }
    
    public function add_order_offline(Request $request)
    {
      
        $product  = Product::where('id',$request->id_product)->first();

        if($product->price > $product->price_sale && $product->price_sale !=0)
        {
            $price = $product->price_sale;
        }
        else
        {
            $price = $product->price;
        }

        $data =  OrderOffline::where('information_id',$request->id_information)
                                ->where('product_id',$request->id_product)->first();

        if($data == null)
        {
            $data = new OrderOffline();
            $data->information_id = $request->id_information;
            $data->product_id = $request->id_product;
            $data->price =$price;
            $data->qty = 1;
            $data->status = 1;
            $data->save();
            return redirect()->back()->with('success','Add to Order Product Successfully');
        }
        else
        {
            $data->qty +=1;
            $data->save();
            return redirect()->back()->with('success','Update to Order Product Successfully');
        }
        

    }

    public function confirm_order_offline($id,$action)
    {
        if($action=="delete")
        {
            OrderOffline::where('id',$id)->delete();
            return redirect()->back()->with('success','Delete Product Successfully');
        }
        if($action=="confirm")
        {

        
            
            $order_offline = OrderOffline::where('information_id',$id)->update(['status'=>2]);

            return redirect()->route('admin.order.offline.history')->with('success','Order Confirm Successfully');
        }
    }

    public function order_offline_history()
    {

        $product = Product::where('status',1)->get();

        $Information = Information::with('Order_offline')->where('user_id',0)->get();
       
        foreach($Information as $key => $value)
        {
            $Information[$key]['qty_prodyuct'] = 0;
            $Information[$key]['total_order'] = 0;

             foreach($value->Order_offline as $item)
             {
                $Information[$key]['qty_prodyuct'] += $item->qty;
                $Information[$key]['total_order'] += $item->qty* $item->price;
             }
        }
       
        return view('admin.order_offline_history',compact('Information'));
    }

    public function statistical()
    {
       
        $order = Order::where('tbl_order.status',3)
                         ->join('tbl_products','tbl_products.id', '=','tbl_order.product_id')
                        ->get();
               
        $order_offline = OrderOffline::where('tbl_order_offline.status',2)
                                    ->join('tbl_products','tbl_products.id', '=','tbl_order_offline.product_id')
                                    ->get();
  
        $order_sum = Order::where('tbl_order.status',3)->sum('tbl_order.qty');  
        $order_offline_sum =  OrderOffline::where('status',2)->sum('qty');  
        $sum_order_product = $order_sum + $order_offline_sum;
       
        $categories = Categories::where('status',1)->get();
       
        foreach($categories as $key =>$value)
        { 
            $categories[$key]['sum'] = 0;
            foreach($order as $item)
            {
                if($item->categories_id == $value->id)
                {
                    $categories[$key]['sum']+=$item->qty;
                   
                }
            }

            foreach($order_offline as $item)
            {
                if($item->categories_id == $value->id)
                {
                    $categories[$key]['sum']+=$item->qty;
                   
                }
            }

            $ratio = $categories[$key]['sum']/$sum_order_product * 100;
            $categories[$key]['ratio'] = number_format($ratio,2);
        }
       

        for($i = 0  ; $i<count($categories);  $i++)
        {
            $categories_chart[$i] = array("label"=>$categories[$i]->name. '('.$categories[$i]->sum.' item)', "y"=>$categories[$i]->ratio);
        }
        
        $barnd =Brand::where('status',1)->get();

        foreach($barnd as $key =>$value)
        { 
            $barnd[$key]['sum'] = 0;
            foreach($order as $item)
            {
                if($item->brand_id == $value->id)
                {
                    $barnd[$key]['sum']+=$item->qty;
                   
                }
            }

            foreach($order_offline as $item)
            {
                if($item->brand_id == $value->id)
                {
                    $barnd[$key]['sum']+=$item->qty;
                   
                }
            }
            
            $ratio = $barnd[$key]['sum']/$sum_order_product * 100;
            $barnd[$key]['ratio'] = number_format($ratio,2);
        }
       

        for($i = 0  ; $i<count($barnd);  $i++)
        {
            $brand_chart[$i] = array("label"=>$barnd[$i]->name . '('.$barnd[$i]->sum.' item)', "y"=>$barnd[$i]->ratio);
        }

         return view('admin.statistical',compact('categories_chart','brand_chart'));
    }

    public function add_order($id,$user)
    {
            $Product =  Product::where('id',$id)->first();

            if($Product->price > $Product->price_sale && $Product->price_sale == 0)
            {
                $price = $Product->price;
            }
            else
            {
                $price = $Product->price_sale;
            }
            
            $Order  = Order::where('user_id',$user)
                            ->where('product_id',$id)
                            ->where('status',2)
                            ->first();
            if($Order == null)
            {
                $Order = new Order();
                $Order->user_id = $user;
                $Order->status = 2;
                $Order->price = $price;
                $Order->product_id = $id;
                $Order->qty = 1;
                $Order->save();
            return Redirect::back()->with('success','Product added to cart successfully');

            }
            else
            {
                $Order->qty+=1;
                $Order->save();
                return Redirect::back()->with('success','Product updated to cart successfully');
            }
            dd($id);
    }
}
