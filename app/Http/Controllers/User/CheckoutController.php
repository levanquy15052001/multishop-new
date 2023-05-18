<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\Order;
use App\Models\Order_details;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index ()
    {
        $order_item = Order::where('tbl_order.user_id',Auth::user()->id)
                                ->join('tbl_products','tbl_products.id', '=','tbl_order.product_id')
                                ->select('tbl_products.*','tbl_order.id as id_order','tbl_order.qty as order_qty')
                                ->where('tbl_order.status',1)
                                ->get();
        $total_order = 0;
        if(count($order_item)>0)
        {
            for($i = 0 ; $i < count($order_item); $i ++)
            {
                if($order_item[$i]->price_sale == 0 && $order_item[$i]->price_sale < $order_item[$i]->price)
                    {
                        $total_order += $order_item[$i]->price * $order_item[$i]->order_qty;
                    }
                else {
                        $total_order += $order_item[$i]->price_sale * $order_item[$i]->order_qty;
                    }
            }
            $Information = Information::where('user_id',Auth::user()->id)->first();
            return view('user.checkout',compact('order_item','total_order','Information'));
        }
        return redirect()->back()->with('waring','Cart is Empty');
      
    }

    public function payment(Request $request)
    {
        $Information = Information::where('user_id',Auth::user()->id)->first();

        if($Information == null)
        {
            $rule = [
                'name' => 'required',
                'email' => 'required|email:rfc,dns',
                'phone' => 'required|numeric|min:10',
                'address' => 'required',
                'city' => 'required',
                'district' => 'required',
                'ward' => 'required',
            ];
            $request->validate($rule);

            $Information = new Information(); 
            $Information->user_id = Auth::user()->id;
            $Information->name =$request->name;
            $Information->email =$request->email;
            $Information->phone =$request->phone;
            $Information->address =$request->address;
            $Information->city =$request->city;
            $Information->ward =$request->ward;
            $Information->district =$request->district;
            $Information->save();
        }

        $payment =  Order::where('tbl_order.user_id',Auth::user()->id)
                            ->where('tbl_order.status',1)
                            ->join('tbl_products','tbl_products.id', '=','tbl_order.product_id')
                            ->select('tbl_products.price as pr_price','tbl_products.price_sale as pr_price_sale','tbl_order.*')
                            ->get();
        for($i = 0 ; $i < count($payment); $i ++)
        {
            if($payment[$i]->pr_price > $payment[$i]->pr_price_sale  &&  $payment[$i]->pr_price_sale == 0)
            {
                $payment[$i]->price = $payment[$i]->pr_price;
                $payment[$i]->status = 2;
                $payment[$i]->save();
            }
            else
            {
                $payment[$i]->price = $payment[$i]->pr_price_sale;
                $payment[$i]->status = 2;
                $payment[$i]->save();
            }
        }
        
         return redirect()->route('index')->with('success','Payment success');
    }

    public function payment_show(Request $request)
    {
        $payment =  Order::where('tbl_order.user_id',Auth::user()->id)
                        ->join('tbl_products','tbl_products.id', '=','tbl_order.product_id')
                        ->select('tbl_products.img as product_img','tbl_products.name as product_name','tbl_order.*')
                        ->where('tbl_order.status','<>',1)
                        ->where('tbl_order.status','<>',0)
                        ->get();
        if(count($payment)>0)
        {
            return view('user.payment',compact('payment'));
        }

        return redirect()->back()->with('waring','Payment is Empty');

    }
}