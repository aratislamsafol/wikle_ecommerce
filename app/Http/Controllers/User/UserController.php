<?php

namespace App\Http\Controllers\User;

use App\Brand;
use App\Category;

use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

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
        $related_pro=Product::where('category_id',$pro_get->category_id)->where('id','!=',$product_id)->latest()->get();

        return view('fontend.pages.single_product',compact('product_details','pro_get','related_pro'));
    }

    // ======================SHOP Page==============================
    public function ShowAllProductsss(){
        $all_product=Product::where('status',1)->latest()->paginate(12);
        return view('fontend.pages.shop',compact('all_product'));
    }



    // public function

    public function Logout(){
        Auth::logout();
        return Redirect()->route('user.dashboard');
    }

    public function UserProfile(){
        $profile=User::where('id',Auth::id())->get();

        return view('fontend.pages.profile.index',compact('profile'));
    }

    public function Edit($id){

        $user_id=User::find($id);

        return view('fontend.pages.profile.update',compact('user_id'));
    }

    public function UserProfileUpdate(Request $request,$id){
         User::find($id)->updated([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'phone_number' => $request->phone_number,
            'street_address' => $request->street_address,
        ]);

        return Redirect()->back();
    }
}
