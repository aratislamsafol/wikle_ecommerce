<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.brand.index');
    }

    public function getall()
    {
        $tours = Brand::orderBy('id','DESC')->latest()->get();

        return datatables($tours)

          ->addColumn('created_at', function ($tours) {
              if($tours->created_at==null){
                  return 'this is null';
              }else{
                return $tours->created_at->diffForHumans();
              }
          })
          ->addColumn('updated_at', function ($tours) {
            if($tours->updated_at==null){
                return 'this is null';
            }else{
              return $tours->updated_at->diffForHumans();
            }
        })

          ->addColumn('brand_image', function ($tours) {
              $url= asset($tours->brand_image);
             return '<img src="'.$url.'" frameborder="0" width="100%" height="80px">';
         })
          ->addColumn('action', 'backend.brand.action')
          ->rawColumns(['brand_image','action'])
          ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = View::make('backend.brand.create')->render();
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
            'tour_image'=> 'required|mimes:jpeg,png,jpg',
        ]);

        $tours = new Brand;

        $tours->brand_name=$request->brand_name;
        $tours->status=$request->status;

        $toursimage = $request->file('tour_image');
        $name_gen =rand(100000,999999). ".".$toursimage->getClientOriginalExtension();
        Image::make($toursimage)->resize(1024, 576 )->save( public_path('/uploads/brand/' . $name_gen));
        $notcepath = ('/uploads/brand') . '/' .$name_gen;
        $tours->brand_image = $notcepath;

        $tours->save();
        return response()->json($tours);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tougallery =Brand::find($id);
        $view = View::make('backend.brand.view', compact('tougallery'))->render();

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
        $tours =Brand::find($id);
        $view = View::make('backend.brand.edit', compact('tours'))->render();
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
        $tours =Brand::find($id);
        $this->validate($request, [
            'tour_image'     => 'mimes:jpeg,png,jpg',
        ]);
        $tours->brand_name=$request->brand_name;
        $tours->status=$request->status;

        if($request->file('tour_image')!=null){
            unlink(public_path($tours->brand_image));
            $tourimage = $request->file('tour_image');
            $name_gen =rand(100000,999999). ".".$tourimage->getClientOriginalExtension();
            $path = public_path('uploads/brand/'.$name_gen);
            Image::make($tourimage)->resize(1024, 576 )->save($path);
            $notcepath = 'uploads/brand/' .$name_gen;
            $tours->brand_image = $notcepath;
        }

        $tours->save();
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
        $tours =Brand::find($id);
        unlink(public_path($tours->brand_image));
        $tours->delete();
        return response()->json(['type' => 'success', 'message' => 'Successfully Deleted']);
    }
}
