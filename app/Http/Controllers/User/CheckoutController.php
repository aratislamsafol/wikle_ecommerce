<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function Index(){
        if(Auth::check()){
            return view('fontend.pages.checkout');
        }else{
            return Redirect()->route('login');
        }
    }

    // public function OrderComplete(){

    //     return view('fontend.pages.payment.easycheckout');
    // }
}
