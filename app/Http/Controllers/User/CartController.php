<?php

namespace App\Http\Controllers\User;

use App\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        return view('fontend.pages.cart');
    }

    public function AddCart(Request $request,$id){
        $check=Cart::where('product_id',$id)->first();
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
}
