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
            'product_name' => 'required|max:100',
            'product_code' => 'required|max:100',
            'price' => 'required|max:100',
            'product_quantity' => 'required|max:100',

            'tour_image1'=> 'required|mimes:jpeg,png,jpg',
            'tour_image2'=> 'required|mimes:jpeg,png,jpg',
            'tour_image3'=> 'required|mimes:jpeg,png,jpg',
        ]);

        $product = new Product;

        $product->product_name=$request->product_name;
        $product->short_description=$request->short_description;
        $product->long_description=$request->long_description;
        $product->product_information=$request->product_information;
        $product->product_quantity=$request->product_quantity;
        $product->price=$request->price;
        $product->status=$request->status;
        $product->product_slug=strtolower(str_replace(' ','-',$request->product_name));
        $product->product_code=$request->product_code;


        $toursimage = $request->file('tour_image1');
        $name_gen =rand(100000,999999). ".".$toursimage->getClientOriginalExtension();
        Image::make($toursimage)->resize(1024, 576 )->save( public_path('/uploads/product/' . $name_gen));
        $notcepath = ('/uploads/product') . '/' .$name_gen;
        $product->image_one = $notcepath;

        $toursimage = $request->file('tour_image2');
        $name_gen =rand(100000,999999). ".".$toursimage->getClientOriginalExtension();
        Image::make($toursimage)->resize(1024, 576 )->save( public_path('/uploads/product/' . $name_gen));
        $notcepath = ('/uploads/product') . '/' .$name_gen;
        $product->image_two = $notcepath;

        $toursimage = $request->file('tour_image3');
        $name_gen =rand(100000,999999). ".".$toursimage->getClientOriginalExtension();
        Image::make($toursimage)->resize(1024, 576 )->save( public_path('/uploads/product/' . $name_gen));
        $notcepath = ('/uploads/product') . '/' .$name_gen;
        $product->image_three = $notcepath;

        $product->save();

        return response()->json($product);
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
        $this->validate($request, [
            'product_name' => 'required|max:100',
            'product_code' => 'required|max:100',
            'price' => 'required|max:100',
            'product_quantity' => 'required|max:100',

            'tour_image1'=> 'required|mimes:jpeg,png,jpg',
            'tour_image2'=> 'required|mimes:jpeg,png,jpg',
            'tour_image3'=> 'required|mimes:jpeg,png,jpg',
        ]);

        $product = new Product;

        $product->product_name=$request->product_name;
        $product->short_description=$request->short_description;
        $product->long_description=$request->long_description;
        $product->product_information=$request->product_information;
        $product->product_quantity=$request->product_quantity;
        $product->price=$request->price;
        $product->status=$request->status;
        $product->product_slug=strtolower(str_replace(' ','-',$request->product_name));
        $product->product_code=$request->product_code;

        if($request->file('tour_image1')!=null){
            unlink(public_path($product->image_one));
            $toursimage = $request->file('tour_image1');
            $name_gen =rand(100000,999999). ".".$toursimage->getClientOriginalExtension();
            Image::make($toursimage)->resize(1024, 576 )->save( public_path('/uploads/product/' . $name_gen));
            $notcepath = ('/uploads/product') . '/' .$name_gen;
            $product->image_one = $notcepath;
        }

        if($request->file('tour_image2')!=null){
            unlink(public_path($product->image_two));
            $toursimage = $request->file('tour_image2');
            $name_gen =rand(100000,999999). ".".$toursimage->getClientOriginalExtension();
            Image::make($toursimage)->resize(1024, 576 )->save( public_path('/uploads/product/' . $name_gen));
            $notcepath = ('/uploads/product') . '/' .$name_gen;
            $product->image_two = $notcepath;
        }

        if($request->file('tour_image3')!=null){
            unlink(public_path($product->image_three));
            $toursimage = $request->file('tour_image3');
            $name_gen =rand(100000,999999). ".".$toursimage->getClientOriginalExtension();
            Image::make($toursimage)->resize(1024, 576 )->save( public_path('/uploads/product/' . $name_gen));
            $notcepath = ('/uploads/product') . '/' .$name_gen;
            $product->image_three = $notcepath;
        }

        $product->save();
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
