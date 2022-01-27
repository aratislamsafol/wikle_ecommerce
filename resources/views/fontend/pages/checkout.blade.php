@extends('fontend.font_dash')
@section('main_section')
{{-- @section('category')active @endsection --}}
@include('fontend.inc.banner')
                    <h2>CheckOut</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Search Products</h2>
                    <form action="">
                        <input type="text" placeholder="Search products...">
                        <input type="submit" value="Search">
                    </form>
                </div>

                <div class="single-sidebar">
                    <h2 class="sidebar-title">Products</h2>
                    @php
                        $product_details=App\Product::where('status',1)->latest()->limit(5)->get()
                    @endphp

                    @foreach ($product_details as $col)
                    <div class="thubmnail-recent">
                        <img src="{{asset($col->image_one)}}" class="recent-thumb" alt="">
                        <h2><a href="{{url('product/item/details/'.$col->id)}}">{{$col->product_name}}</a></h2>
                        <div class="product-sidebar-price">
                            <ins>price {{$col->price}} tk</ins>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="single-sidebar">
                    <h2 class="sidebar-title">Recent Posts</h2>
                    <ul>
                        @foreach ($product_details as $col)
                        <li><a href="{{url('product/item/details/'.$col->id)}}">{{$col->product_name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="woocommerce">


                        <div class="woocommerce-info">Have a coupon? <a class="showcoupon" data-toggle="collapse" href="#coupon-collapse-wrap" aria-expanded="false" aria-controls="coupon-collapse-wrap">Click here to enter your code</a>
                        </div>


                        <form action="{{route('coupon.add')}}" id="coupon-collapse-wrap" method="get" class="checkout_coupon collapse">

                            <p class="form-row form-row-first">
                                <input type="text" value="" id="coupon_code" placeholder="Coupon code" class="input-text" name="coupon_name">
                            </p>

                            <p class="form-row form-row-last">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </p>

                            <div class="clear"></div>
                        </form>

                        <form enctype="multipart/form-data" action="{{route('checkout_payment')}}" class="checkout" method="post" name="checkout">
                            @csrf
                            <h3>Billing Information</h3>
                            <div class="row" style="padding-bottom:15px">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="f_name" class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="shipping_first_name" id="shipping_first_name" aria-describedby="shipping_first_name" value="{{Auth::user()->f_name}}">

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="shipping_last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="shipping_last_name" id="shipping_last_name" aria-describedby="shipping_last_name" value="{{Auth::user()->l_name}}">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="shipping_email" class="form-label">Email address</label>
                                        <input type="email" name="shipping_email" class="form-control" id="shipping_email" aria-describedby="shipping_email" value="{{Auth::user()->email}}">

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="shipping_phone" class="form-label">Phone</label>
                                        <input type="number" class="form-control" name="shipping_phone" id="shipping_phone" aria-describedby="shipping_phone" value="{{Auth::user()->phone_number}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    @php
                                         $divisions = App\Division::orderBy('priority', 'asc')->get();
                                    @endphp
                                    <div class="mb-3">
                                        <label for="division_id" class="col-md-4 col-form-label text-md-right">Division</label>

                                        <select class="form-control" name="division_id" id="division_id" style=" margin-top: 2px; padding-left: 36%; padding-right: 32%;">

                                            <option value="">Select division</option>
                                            @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                            @endforeach

                                        </select>
                                      </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="distric_id" class="col-md-4 col-form-label text-md-right">District</label>
                                        <select class="form-control" name="distric_id" id="district-area" style="margin-top: 2px; padding-left: 26%; padding-right: 7%;">

                                        </select>
                                      </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="post_code" class="form-label">Post Code</label>
                                        <input type="text" class="form-control" name="post_code" id="post_code" aria-describedby="post_code">

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="text" class="form-label">Shipping Address</label>
                                        <input type="text" class="form-control" name="shipping_state" id="shipping_state" aria-describedby="shipping_state">
                                    </div>
                                </div>
                            </div>

                            <h3 id="order_review_heading" style="padding-top:15px">Your order</h3>

                            <div id="order_review" style="position: relative;">
                                <table class="shop_table">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $carts=App\Cart::where('user_ip',request()->ip())->get();
                                        @endphp
                                        @foreach ($carts as $cart)
                                        <tr class="cart_item">

                                            <td class="product-name">{{$cart->product->product_name}}
                                                <strong class="product-quantity">{{$cart->product_qty}}</strong> </td>

                                            <td class="product-total">
                                                <span class="amount">{{$cart->price*$cart->product_qty}} tk</span> </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        @php
                                            $sub_totals = App\Cart::all()->where('user_ip', request()->ip())->sum(function ($res) {
                                                return $res->product_qty * $res->price;
                                            });
                                        @endphp
                                        @if (Session::has('coupon'))
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>


                                            <input type="hidden" name="subtotal" id="subtotal" value="${{$sub_totals}}">
                                            <td><span class="amount">{{$sub_totals}} tk</span>
                                            </td>
                                        </tr>

                                        {{-- <tr class="shipping">
                                            <th>Shipping and Handling</th>
                                            <td>
                                                Free Shippingsdfdsfdsfds
                                                <input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
                                            </td>
                                        </tr> --}}

                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <input type="hidden" name="total" id="total" value="${{$sub_totals-$sub_totals*session()->get('coupon')['discount']/100}}">
                                            <td><strong><span class="amount">{{$sub_totals-$sub_totals*session()->get('coupon')['discount']/100}}</span></strong> </td>
                                        </tr>

                                        @else
                                        @php
                                            $sub_totals = App\Cart::all()->where('user_ip', request()->ip())->sum(function ($res) {
                                                return $res->product_qty * $res->price;
                                                });
                                        @endphp

                                        <input type="hidden" name="subtotal" id="subtotal" value="{{$sub_totals}}">

                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <input type="hidden" name="total" id="total" value="${{$sub_totals}}">
                                            <td><strong><span class="amount">{{$sub_totals}}</span></strong> </td>
                                        </tr>
                                        @endif

                                    </tfoot>
                                </table>


                                <div id="payment">
                                    <ul class="payment_methods methods">

                                        <li class="payment_method_cheque">
                                            <input type="radio" data-order_button_text="" value="hand_cash_delivery" name="payment_type" class="input-radio" id="payment_method_cheque">
                                            <label for="payment_method_cheque">Hand Cash Delivery </label>
                                        </li>

                                        <li class="payment_method_cheque">
                                            <input type="radio" data-order_button_text="" value="ssl_commerze" name="payment_type" class="input-radio" id="payment_method_cheque">
                                            <label for="payment_method_cheque">SSL Commmerze </label>
                                        </li>

                                    </ul>

                                    <div class="form-row place-order">

                                        <input type="submit" data-value="Place order" value="Place order" id="place_order" class="button alt">

                                    </div>

                                    <div class="clear"></div>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('frontend')}}/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
 $(document).ready(function()
{
    $("#division_id").change(function(){
        var division = $("#division_id").val();
        // Send an ajax request to server with this division
        $("#district-area").html("");
        var option = "";

        $.get( "http://127.0.0.1:8000/get-districts/"+division, function( data ) {

            data = JSON.parse(data);
            data.forEach( function(element) {
              option += "<option value='"+ element.id +"'>"+ element.district_name +"</option>";
            });

          $("#district-area").html(option);

        });
    })
})


</script>
@endsection
