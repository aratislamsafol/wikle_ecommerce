<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\OrederItems;
use App\Shipping;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function StoreOrder(Request $request){

        // dd($request->all());
        // $request->validate([
        //     'shipping_first_name' => 'required|max:30',
        //     'shipping_last_name' => 'required|max:30',
        //     'shipping_phone' => 'required|min:10|numeric',
        //     'shipping_email' => 'required|email',
        //     'shipping_state' => 'required|max:255',
        //     'shipping_address' => 'required|max:255',
        //     'post_code' => 'required|max:255',
        // ],
        // [
        //     'shipping_first_name.required'=>'First Name is not valid(max 30 chars)',
        //     'shipping_last_name.required'=>'Last Name is not valid(max 30 chars)',
        //     'shipping_phone.required'=>'Phone Number Must be upper to 10 Digit',
        //     'shipping_email.required'=>'Email is Not Required',
        // ]);


        $order_id=Order::insert([
            'user_id' =>Auth::id(),
            'invoice_no' => mt_rand(10000000,99999999),
            'total'=>$request->total,
            'subtotal'=>$request->subtotal,
            'coupon_discount'=>$request->coupon_discount,
            'payment_type' =>$request->payment_type,
            'created_at'=>Carbon::now(),
        ]);

        $carts=Cart::where('user_ip',request()->ip())->latest()->get();

        foreach($carts as $cart){
            OrederItems::insert([
                'order_id'=>$order_id,
                'product_id'=>$cart->product_id,
                'product_qty'=>$cart->product_qty,
                'created_at'=>Carbon::now(),
            ]);
        }

        return view('fontend.pages.payment.easycheckout',compact('data'));
    }

    public function ShippingData(Request $request,$id){
// Shipping::insert([
    $data=array();
    $data['order_id']=$order_id;
    $data['shipping_first_name']=$request->shipping_first_name;
    $data['shipping_last_name']=$request->shipping_last_name;
    $data['shipping_email']=$request->shipping_email;
    $data['shipping_phone']=$request->shipping_phone;
    $data['division_id']=$request->division_id;
    $data['distric_id']=$request->distric_id;
    $data['shipping_state']=$request->shipping_state;
    $data['post_code']=$request->post_code;
    $data['created_at']=Carbon::now();
// ]);

if(Session::has('coupon')){
    Session::forget('coupon');
}

Cart::where('user_ip',request()->ip())->delete();
    }
}
