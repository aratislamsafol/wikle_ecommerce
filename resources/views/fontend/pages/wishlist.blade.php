@extends('fontend.font_dash')
@section('main_section')
{{-- @section('wishlist')active @endsection --}}
@include('fontend.inc.banner')
                    <h2>Wishlist</h2>
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
                        <ul>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
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
                                            <th class="product-thumbnail">Product</th>
                                            <th class="product-name">Product Name</th>
                                            <th class="product-name">Action</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($wishlist_show as $wl)

                                        <tr class="cart_item">

                                            <td class="product-remove">
                                                <a href="{{route('remove.wishlist',$wl->id)}}" title="Remove this item" class="remove" href="#">×</a>
                                            </td>

                                            <td class="product-thumbnail">
                                                <a href="single-product.html"><img src="{{asset($wl->product->image_one)}}" width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src=""></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="">{{$wl->product->product_name}}</a>
                                            </td>
                                            <td>
                                                <form action="{{url('cart/add/item/'.$wl->id)}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="price" value="{{$wl->product->price}}">

                                                    {{-- <button type="button" class="add-to-cart-link bb" onclick="addToCart({{ $product->id }})"><i class="fa fa-plus"></i> Add to cart</button> --}}

                                                    <button type="submit" class="add-to-cart-link bb"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                </form>


                                            </td>

                                            <td class="product-price">
                                                <span class="amount">{{$wl->product->price}} tk</span>
                                            </td>
                                        </tr>
                                        @endforeach
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
                                        </li>
                                        {{-- @endforeach --}}
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
