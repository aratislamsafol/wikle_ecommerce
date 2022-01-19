@extends('fontend.font_dash')
@section('main_section')
@section('category')active @endsection
@include('fontend.inc.banner')
                    <h2>Category Product</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .ex{
        background-size: 400px 400px;
    }
</style>

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        @foreach ($categories as $cat)
                            <li data-filter=".filter{{$cat->id}}">{{$cat->category_name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach ($categories as $cat)
                @php
                    $products=App\Product::where('category_id',$cat->id)->latest()->get();
                @endphp
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix filter{{$cat->id}}">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg ex" data-setbg="{{asset($product->image_one)}}">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="{{ route('add.wishlist',$product->id)}}"><i class="fa fa-heart"></i></a></li>
                                    <li><a href=""><i class="fa fa-retweet"></i></a></li>
                                    <form action="{{url('cart/add/item/'.$product->id)}}" method="post">
                                        @csrf
                                        <input type="hidden" name="price" value="{{$product->price}}">
                                        <button type="submit" class="add-to-cart-link bb"><i class="fa fa-shopping-cart"></i></button>
                                    </form>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="">{{$product->product_name}}</a></a></h6>
                                <h5>price:{{$product->price}}Tk</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</section>
<!-- Featured Section End -->

@endsection
