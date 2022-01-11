<?php

namespace App\Http\Controllers\User;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function Index(){
        $categories=Category::where('status',1)->latest()->get();
        $product=Product::where('status',1)->latest()->paginate(8);
        $brand=Brand::where('status',1)->latest()->get();

        return view('fontend.pages.index',compact('categories','product','brand'));
    }

    public function CategoryPage(){
        $categories=Category::where('status',1)->latest()->paginate(8);
        return view('fontend.pages.cat_page',compact('categories'));
    }

    public function SinglePage($product_id){
        $product_details=Product::where('status',1)->latest()->get();
        $pro_get=Product::findOrFail($product_id);

        return view('fontend.pages.single_product',compact('product_details','pro_get'));
    }



    // public function

    public function Logout(){
        Auth::logout();
        return Redirect()->route('user.dashboard');
    }
}
