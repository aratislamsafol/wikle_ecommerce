<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.coupon.index');
    }

    public function getall()
    {
        $coupon = Coupon::orderBy('id','DESC')->latest()->get();

        return datatables($coupon)

          ->addColumn('created_at', function ($coupon) {
              if($coupon->created_at==null){
                  return 'this is null';
              }else{
                return $coupon->created_at->diffForHumans();
              }
          })
          ->addColumn('updated_at', function ($coupon) {
            if($coupon->updated_at==null){
                return 'this is null';
            }else{
              return $coupon->updated_at->diffForHumans();
            }
        })

          ->addColumn('action', 'backend.coupon.action')
          ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = View::make('backend.coupon.create')->render();
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

        ]);

        $coupon = new Coupon;

        $coupon->coupon_name=$request->coupon_name;
        $coupon->discount=$request->discount;

        $coupon->save();
        return response()->json($coupon);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tougallery =Coupon::find($id);
        $view = View::make('backend.coupon.view', compact('tougallery'))->render();

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
        $coupon =Coupon::find($id);
        $view = View::make('backend.coupon.edit', compact('coupon'))->render();
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
        $coupon =Coupon::find($id);
        $this->validate($request, [

        ]);
        $coupon->coupon_name=$request->coupon_name;
        $coupon->status=$request->status;
        $coupon->discount=$request->discount;

        $coupon->save();
        return response()->json($coupon);
    }

     /**

      */
    // public function active(Request $request)
    // {
    //     $where = array('id' => $request->id);
    //     $company  = Coupon::where($where)->first();

    //     return Response()->json($company);

    //     // // dd($request->all());
    //     // $coupon =Coupon::find($id);
    //     // $this->validate($request, [

    //     // ]);
    //     // $coupon->status=$request->status;
    //     // // dd($coupon);
    //     // $coupon->save();
    //     // return response()->json($coupon);
    // }

    // public function store_active(Request $request){
    //     $companyId = $request->id;

    //     $company   =   Coupon::updateOrCreate(
    //                 [
    //                  'id' => $companyId
    //                 ],
    //                 [
    //                 'status' => 2,
    //                 ]);

    //     return Response()->json($company);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon =Coupon::find($id);
        $coupon->delete();
        return response()->json(['type' => 'success', 'message' => 'Successfully Deleted']);
    }
}
