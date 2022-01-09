<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;
use Datatables;

class ProdcutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.product.index');
    }

    public function getall()
    {
        $product = Product::orderBy('id','DESC')->latest()->get();

        return datatables($product)

          ->addColumn('created_at', function ($product) {
              if($product->created_at==null){
                  return 'null';
              }else{
                return $product->created_at->diffForHumans();
              }
          })
          ->addColumn('updated_at', function ($product) {
            if($product->updated_at==null){
                return 'null';
            }else{
              return $product->updated_at->diffForHumans();
            }
        })

          ->addColumn('image_one', function ($product) {
              $url= asset($product->image_one);
             return '<img src="'.$url.'" frameborder="0" width="100%" height="80px">';
         })
         ->addColumn('image_two', function ($product) {
            $url= asset($product->image_two);
           return '<img src="'.$url.'" frameborder="0" width="100%" height="80px">';
       })
       ->addColumn('image_three', function ($product) {
            $url= asset($product->image_three);
            return '<img src="'.$url.'" frameborder="0" width="100%" height="80px">';
        })

          ->addColumn('action', 'backend.product.action')
          ->rawColumns(['image_one','action'])
          ->rawColumns(['image_two','action'])
          ->rawColumns(['image_three','action'])
          ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = View::make('backend.product.create')->render();
        return response()->json(['html' => $view]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            // 'product_name' => 'required|max:100',
            // 'product_code' => 'required|max:100',
            // 'price' => 'required|max:100',
            // 'product_quantity' => 'required|max:100',

            // 'tour_image1'=> 'required|mimes:jpeg,png,jpg',
            // 'tour_image2'=> 'required|mimes:jpeg,png,jpg',
            // 'tour_image3'=> 'required|mimes:jpeg,png,jpg',
        ]);

        // dd($request->all());
        $products = new Product;

        $products->product_name=$request->product_name;
        $products->category_id=$request->category_id;
        $products->review_id=1;
        $products->brand_id=$request->brand_id;
        $products->product_code=$request->product_code;
        $products->product_quantity=$request->product_quantity;
        $products->price=$request->price;
        $products->short_description=$request->short_description;
        $products->long_description=$request->long_description;
        $products->product_information=$request->product_information;
        $products->status=$request->status;
        $products->product_slug=strtolower(str_replace(' ','-',$request->product_name));
        $products->product_code=$request->product_code;

        $toursimage = $request->file('image_one');
        $name_gen =rand(100000,999999). ".".$toursimage->getClientOriginalExtension();
        Image::make($toursimage)->resize(1024, 576 )->save( public_path('/uploads/product/' . $name_gen));
        $notcepath = ('/uploads/product') . '/' .$name_gen;
        $products->image_one = $notcepath;

        $toursimage = $request->file('image_two');
        $name_gen =rand(100000,999999). ".".$toursimage->getClientOriginalExtension();
        Image::make($toursimage)->resize(1024, 576 )->save( public_path('/uploads/product/' . $name_gen));
        $notcepath = ('/uploads/product') . '/' .$name_gen;
        $products->image_two = $notcepath;

        $toursimage = $request->file('image_three');
        $name_gen =rand(100000,999999). ".".$toursimage->getClientOriginalExtension();
        Image::make($toursimage)->resize(1024, 576 )->save( public_path('/uploads/product/' . $name_gen));
        $notcepath = ('/uploads/product') . '/' .$name_gen;
        $products->image_three = $notcepath;

        $products->save();
        // dd($product);

        return response()->json($products);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product =Product::find($id);

        $view = View::make('backend.product.view', compact('product'))->render();

        return response()->json(['html' => $view]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product =Product::find($id);
        $view = View::make('backend.product.edit', compact('product'))->render();
        return response()->json(['html' => $view]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products =Product::findOrFail($id);
        $this->validate($request, [

        ]);

        // dd($request->all());
        $products->product_name=$request->product_name;
        $products->category_id=$request->category_id;
        $products->review_id=1;
        $products->brand_id=$request->brand_id;
        $products->product_code=$request->product_code;
        $products->product_quantity=$request->product_quantity;
        $products->price=$request->price;
        $products->short_description=$request->short_description;
        $products->long_description=$request->long_description;
        $products->product_information=$request->product_information;
        $products->status=$request->status;
        $products->product_slug=strtolower(str_replace(' ','-',$request->product_name));
        $products->product_code=$request->product_code;

        if($request->file('image_one')!=null){
            unlink(public_path($products->image_one));
            $tourimage = $request->file('image_one');
            $name_gen =rand(100000,999999). ".".$tourimage->getClientOriginalExtension();
            $path = public_path('uploads/product/'.$name_gen);
            Image::make($tourimage)->resize(1024, 576 )->save($path);
            $notcepath = 'uploads/product/' .$name_gen;
            $products->image_one = $notcepath;
        }
        if($request->file('image_two')!=null){
            unlink(public_path($products->image_two));
            $tourimage = $request->file('image_two');
            $name_gen =rand(100000,999999). ".".$tourimage->getClientOriginalExtension();
            $path = public_path('uploads/product/'.$name_gen);
            Image::make($tourimage)->resize(1024, 576 )->save($path);
            $notcepath = 'uploads/product/' .$name_gen;
            $products->image_two = $notcepath;
        }
        if($request->file('image_three')!=null){
            unlink(public_path($products->image_three));
            $tourimage = $request->file('image_three');
            $name_gen =rand(100000,999999). ".".$tourimage->getClientOriginalExtension();
            $path = public_path('uploads/product/'.$name_gen);
            Image::make($tourimage)->resize(1024, 576 )->save($path);
            $notcepath = 'uploads/product/' .$name_gen;
            $products->image_three = $notcepath;
        }

        $products->save();
        return redirect()->back()->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =Product::find($id);
        unlink(public_path($product->image_one));
        unlink(public_path($product->image_two));
        unlink(public_path($product->image_three));
        $product->delete();
        return response()->json(['type' => 'success', 'message' => 'Successfully Deleted']);
    }
}
