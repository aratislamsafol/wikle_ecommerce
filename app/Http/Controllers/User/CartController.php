<?php

namespace App\Http\Controllers\User;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $sub_total = Cart::all()->where('user_ip', request()->ip())->sum(function ($res) {
            return $res->product_qty * $res->price;
        });
        return view('fontend.pages.cart',compact('carts','sub_total'));
    }

    public function AddCart(Request $request,$id){

        $check=Cart::where('product_id',$id)->where('user_ip',request()->ip())->first();
        if($check){
            Cart::where('product_id',$id)->increment('product_qty');
            return Redirect()->back()->with('success', 'Product Added');
        }else{
            Cart::insert([
                'product_id'=>$id,
                'product_qty'=>1,
                'price'=>$request->price,
                'user_ip'=>request()->ip(),
            ]);
            return Redirect()->back()->with('success', 'Product Added');
        }
    }

    // public function AddCartSinglePage(Request $request,$id){
    //     $check=Cart::where('product_id',$id)->where('user_ip',request()->ip())->first();
    //     if($check){
    //         Cart::where('product_id',$id)->increment('product_qty');
    //         return Redirect()->back()->with('success', 'Product Added');
    //     }else{
    //         Cart::insert([
    //             'product_id'=>$id,
    //             'product_qty'=>1,
    //             'price'=>$request->price,
    //             'user_ip'=>request()->ip(),
    //         ]);
    //         return Redirect()->back()->with('success', 'Product Added');
    //     }
    // }


    public function Remove($id)
    {
        Cart::where('user_ip', request()->ip())->find($id)->delete();
        return Redirect()->back();
    }

    public function UpdateCart(Request $request, $cart_id)
    {
        // dd($request->all());
        Cart::where('id', $cart_id)->where('user_ip', request()->ip())->Update([
            'product_qty' => $request->product_qty,
        ]);
        return Redirect()->back();
    }



}
