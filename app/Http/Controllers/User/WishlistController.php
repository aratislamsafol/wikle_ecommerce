<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Product;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){
        $wishlist_show=Wishlist::where('user_id',Auth::id())->latest()->get();
        return view('fontend.pages.wishlist',compact('wishlist_show'));
    }

    public function AddWishlist($product_id){
        $checks=Wishlist::where('product_id',$product_id)->first();

        if($checks){
            return Redirect()->back()->with("Added peror");
        }else{
            Wishlist::insert([
                'user_id'=>Auth::id(),
                'product_id'=>$product_id,
            ]);
            return Redirect()->back();
        }
    }

    public function Remove($id){
        $get_id=Wishlist::where('user_id',Auth::id())->findOrFail($id)->Delete();

        return Redirect()->back();
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchlive(Request $request_val)
{
$search_val = $request_val->id;
if (is_null($search_val))
{
return view('demos.searchlive');
}
else
{
$posts_data = Post::where('title','LIKE',"%{$search_val}%")->get();
return view('demos.searchLiveajax')->withPosts($posts_data);
}
}
}
