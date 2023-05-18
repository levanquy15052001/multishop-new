<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    
    public function index(Request $request)
    {
      
        $order_item = Order::where('tbl_order.user_id',Auth::user()->id)
                                ->join('tbl_products','tbl_products.id', '=','tbl_order.product_id')
                                ->select('tbl_products.*','tbl_order.id as id_order','tbl_order.qty as order_qty')
                                ->where('tbl_order.status',1)
                                ->get();
        if(count($order_item)>0)
        {
            $total_order = 0;
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
            return view('user.order',compact('order_item','total_order'));
        }
        return redirect()->route('index')->with('waring','Cart is Empty');
       
    }
    public function order(Request $request,$id)
    {
        $Order  = Order::where('user_id',Auth::user()->id)
                        ->where('product_id',$id)
                        ->where('status',1)
                        ->first();
        if($Order == null)
        {
            $Order = new Order();
            $Order->user_id = Auth::user()->id;
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

    public function action(Request $request)
    {
        if($request->has('action') && $request->has('id'))
        {
            $order = Order::where('id',$request->id)->first();
            if($request->action=='down')
            {
                if( $order->qty==1)
                {
                    $order->delete();
                    return redirect()->back();
                }
               $order->qty -= 1;
               $order->save();
               return redirect()->back();
            }
            if($request->action=='up')
            {
               $order->qty += 1;
               $order->save();
               return redirect()->back();
            }
            if($request->action=='delete')
            {
                $order->delete();
                return true;
            }
            if($request->action =='delete_payment')
            {
                $order->delete();
                return redirect()->back();
            }
        }
    }
}
