<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Information;
use PDF;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        
        $products = Product::where('status',1)->get();
        if($request->has('brand'))
        {
            $products = Product::where('status',1)->where('brand_id',$request->brand)->get();
            
        }
        if($request->has('categories'))
        {
            $products = Product::where('status',1)->where('categories_id',$request->categories)->get();
        }

        return view('user.home',compact('products'));
    }

    public function show($id)
    {
        
        $products = Product::join('tbl_categories','tbl_categories.id', '=','tbl_products.categories_id')
                            ->join('tbl_brands','tbl_brands.id', '=','tbl_products.brand_id')
                            ->select('tbl_products.*','tbl_brands.name as brand_name','tbl_categories.name as categories_name')
                            ->where('tbl_products.status',1)
                            ->where('tbl_products.id',$id)->first();
        $product_like = Product::where('.status',1)
                                ->where('categories_id',$products->categories_id)
                                ->get();
                              
        return view('user.details',compact('products','product_like'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        //... Validation here


        return view('home.products');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        //... Validation here


        return view('home.products');
    }

    public function destroy($id)
    {
        
        return view('home.products');
    }

    public function sum_order(Request $request)
    {
    
        $order = Order::where('user_id',Auth::user()->id)->where('status',1)->get();
        $sum_order = count($order);       
        return $sum_order;
    }

    public function send_mail()
    {
        $name = "Le Van Quy";
        Mail::send('user.email.register', compact('name'), function($email) use($name){
            $email->subject("Demo test mail");
            $email->to('levanquy15052001@gmail.com', $name);
        });
    }

    public function pdf_bill($id)
    {

        $Information  = Information::with('Order_PDF')->where('user_id',$id)->first()->toArray();
        
        if(Auth::check())
        {
            $Information  = Information::with('Order_PDF')->where('user_id',$id)->first()->toArray();
            $total_order = 0;
            for($i =0 ; $i< count($Information['order__p_d_f']) ;$i++)
            {
                $product = Product::where('id',$Information['order__p_d_f'][$i]['product_id'])->first();
                $Information['order__p_d_f'][$i]['product_name']=$product->name;
                $total_order += $Information['order__p_d_f'][$i]['price'] * $Information['order__p_d_f'][$i]['qty'];

            }

             $pdf = PDF::loadView('user.email.bill_pdf',compact('Information','total_order'));
             return $pdf->download('Bill_PDF.pdf');

        }

        return redirect()->back();
        
    }
}
