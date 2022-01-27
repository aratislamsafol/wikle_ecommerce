@extends('fontend.font_dash')
@section('main_section')
@section('cart')active @endsection
@include('fontend.inc.banner')
                    <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="#">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>

                    @php
                        $products=App\Product::where('status',1)->latest()->limit(5)->get();
                    @endphp

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                         @foreach ($products as $product)
                        <div class="thubmnail-recent">
                            <img src="{{asset($product->image_one)}}" class="recent-thumb" alt="">
                            <h2><a href="{{url('product/item/details/'.$product->id)}}">{{$product->product_name}}</a></h2>
                            <div class="product-sidebar-price">
                                <ins>price {{$product->price}} tk</ins>
                            </div>
                        </div>
                        @endforeach
                    </div>



                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        @php
                            $product_details=App\Product::where('status',1)->latest()->limit(5)->get()
                        @endphp
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

                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts as $cart)

                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a href="{{url('cart/destroy/'.$cart->id)}}" title="Remove this item" class="remove">×</a>
                                            </td>

                                            <td class="product-thumbnail">
                                                <a href=""><img src="{{asset($cart->product->image_two)}}"  width="145" height="145" alt="poster_1_up" class="shop_thumbnail"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="{{url('product/item/details/'.$cart->id)}}">{{$cart->product->product_name}}</a>
                                            </td>

                                            <td class="product-price">
                                                <span class="amount">{{$cart->product->price}}tk</span>
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    {{-- @php
                                                        dd($cart->id);
                                                    @endphp --}}
                                                    <form action="{{route('carts.update',$cart->id)}}" method="POST">
                                                    @csrf
                                                    {{-- @method('PUT') --}}
                                                    {{-- {{route('carts.update',$cart->id)}} --}}
                                                        <input type="number" size="4" class="input-text qty text" min='1' value={{$cart->product_qty}} name="product_qty">

                                                        {{-- <input type="button" class="minus" value="-"> --}}

                                                        {{-- <input type="button" class="plus" value="+"> --}}
                                                        <button type="submit" class="btn btn-sm">Update</button>
                                                    </form>
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="amount">{{$cart->price * $cart->product_qty}}tk</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td class="actions" colspan="6">
                                                <form action="{{route('coupon.add')}}" method="get">
                                                    <div class="coupon">
                                                        <label for="coupon_code">Coupon:</label>
                                                        <input type="text" placeholder="Coupon code" value="" id="coupon_code" class="input-text" name="coupon_name">
                                                        <button type="submit" class="site-btn">APPLY COUPON</button>
                                                    </div>
                                                </form>
                                                    {{-- <button type="submit">update cart</button> --}}


                                                    <a value="Checkout"  class="site-btn" href="{{route('checkout.page')}}">Checkout</a>
{{--
                                                    <input type="submit" value="Checkout" href="{{route('checkout.page')}}" name="proceed" class="checkout-button button alt wc-forward"> --}}

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                            <div class="cart-collaterals">


                                <div class="cross-sells">
                                    <h2>You may be interested in...</h2>
                                    <ul class="products">

                                        {{-- @php
                                            $cart_data=App\Cart::where('user_ip',request()->ip())->get();

                                            $product=App\Product::where('status',1)->where('id',$cart_data->product_id)->latest()->get();

                                            $show_data=App\Category::where('status',1)->where('id',$product->category_id)->latest()->get();

                                            // $product_data=App\Product::where('category_id',$show_data->id)->latest()->get();
                                        @endphp

                                        @foreach ($show_data as $sd)

                                        {{asset($sd->product->image_one)}}
                                        {{$sd->product->product_name}}--}}
                                        {{-- @foreach ($carts->product->category->product->product_name as $sd) --}}

                                        <li class="product">
                                            <a href="">
                                                <img src="" width="" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="img/product-2.jpg">
                                                <h3>sdff</h3>
                                                <span class="price"><span class="amount">12</span></span>
                                            </a>

                                            {{-- <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="single-product.html">Select options</a> --}}
                                        </li>
                                        {{-- @endforeach --}}
                                    </ul>
                                </div>


                                <div class="cart_totals ">
                                    <h2>Cart Totals</h2>

                                    <table cellspacing="0">
                                        <tbody>
                                            @if (Session::has('coupon'))
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount">{{$sub_total}} tk</span></td>
                                            </tr>

                                            <tr class="shipping">
                                                <th>Discount ({{Session()->get('coupon')['coupon_name']}})</th>
                                                <td> {{$discount=$sub_total*session()->get('coupon')['discount']/100}} tk <a href="{{url('coupon/destroy')}}"><i class="fa fa-times"></i></a></td>
                                            </tr>

                                            <tr class="shipping">
                                                <th>Shipping and Handling</th>
                                                <td>Free Shipping</td>
                                            </tr>

                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount">{{$sub_total - $discount}} tk</span></strong> </td>
                                            </tr>
                                            @else
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount">{{$sub_total}} tk</span></td>
                                            </tr>

                                            <tr class="shipping">
                                                <th>Shipping and Handling</th>
                                                <td>Free Shipping</td>
                                            </tr>

                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount">{{$sub_total}} tk</span></strong> </td>
                                            </tr>
                                            @endif

                                        </tbody>
                                    </table>
                                </div>





                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
