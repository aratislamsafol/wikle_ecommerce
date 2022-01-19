<?php

namespace App\Http\Controllers\User;

use App\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    public function ApplyCoupon(Request $request){
        // dd($request->all());
        $check=Coupon::where('coupon_name',$request->coupon_name)->first();

        if($check){
            Session::put('coupon',[
                'coupon_name'=>$check->coupon_name,
                'discount'=>$check->discount,
            ]);
            return Redirect()->back()->with('success', 'Coupon Added Successfully');
        }else{
            return Redirect()->back()->with('Fail', 'Wrong Coupon');
        }
    }

    public function CouponDestroy()
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
            return Redirect()->back()->with('success', 'Coupon Removed Successfully');
        }
    }
}
