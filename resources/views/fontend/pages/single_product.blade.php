@extends('fontend.font_dash')
@section('main_section')
@section('product_details')active @endsection
@include('fontend.inc.banner')
                    <h2>Product Details</h2>
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
                    @foreach ($product_details as $row)
                    <div class="thubmnail-recent">
                        <img src="{{asset($row->image_one)}}" class="recent-thumb" alt="">
                        <h2><a href="{{url('product/item/details/'.$row->id)}}">{{$row->product_name}}</a></h2>
                        <div class="product-sidebar-price">
                            <ins>price: {{$row->price}}tk</ins>
                        </div>
                    </div>

                    @endforeach
                </div>
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Recent Added</h2>
                    <ul>
                        @foreach ($product_details as $row)
                        <li><a href="">{{$row->product_name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="product-breadcroumb">
                        <a href="{{url('/')}}">Home</a>
                        <a href="">{{$pro_get->category->category_name}}</a>
                        <a href="">{{$pro_get->product_name}}</a>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="product-images">
                                <div class="product-main-img">
                                    <img src="{{asset($pro_get->image_one)}}" alt="">
                                </div>


                                <div class="related-products-carousel">
                                    <img data-imgbigurl="{{asset($pro_get->image_one)}}"
                                            src="{{asset($pro_get->image_one)}}" alt="">
                                        <img data-imgbigurl="{{asset($pro_get->image_two)}}"
                                            src="{{asset($pro_get->image_two)}}" alt="">
                                        <img data-imgbigurl="{{asset($pro_get->image_three)}}"
                                            src="{{asset($pro_get->image_three)}}" alt="">
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="product-inner">
                                <h2 class="product-name">{{$pro_get->product_name}}</h2>
                                <div class="product-inner-price">
                                    <ins>price: {{$pro_get->price}}tk</ins>
                                </div>

                                <form action="" class="cart">
                                    <div class="quantity">
                                        <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                    </div>
                                    <button class="add_to_cart_button" type="submit">Add to cart</button>
                                </form>

                                <div class="product-inner-category">
                                    <p>Category: <a href="">{{$pro_get->category->category_name}}</a>. Brand: <a href="">{{$pro_get->brand->brand_name}}</a> </p>
                                </div>

                                <div role="tabpanel">
                                    <ul class="product-tab" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                                            <h2>Product Description</h2>
                                            <p>{{$pro_get->long_description}}</p>

                                            <p>{{$pro_get->short_description}}</p>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="profile">
                                            <h2>Reviews</h2>
                                            <div class="submit-review">
                                                <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                <div class="rating-chooser">
                                                    <p>Your rating</p>

                                                    <div class="rating-wrap-post">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                <p><input type="submit" value="Submit"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="related-products-wrapper">
                        <h2 class="related-products-title">Related Products</h2>
                        <div class="related-products-carousel">
                            @foreach ($related_pro as $rp)
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="{{asset($rp->image_one)}}" alt="">
                                    <div class="product-hover">
                                        <form action="{{url('cart/add/item/'.$rp->id)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="price" value="{{$rp->price}}">
                                            <button type="submit" class="add-to-cart-link bb"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                        </form>
                                        <a href="{{url('product/item/details/'.$rp->id)}}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>

                                <h2><a href="">{{$rp->product_name}}</a></h2>

                                <div class="product-carousel-price">
                                    <ins>{{$rp->product_name}}tk</ins>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
