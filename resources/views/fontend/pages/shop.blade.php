@extends('fontend.font_dash')
@section('main_section')
@include('fontend.inc.banner')
                    <h2>Happy Shopping</h2>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="single-sidebar">
    <h2 class="sidebar-title">Search Products</h2>
    <div class="form-group">
        <input type="search"onkeyup="search()" class="form-control" id="search">
    </div>
</div> --}}

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            @foreach ($all_product as $col)
            <div class="col-md-3 col-sm-6" id="general_data">
                <div class="single-shop-product">
                    <div class="product-upper">
                        <img src="{{asset($col->image_one)}}" style="height: 200px; width:200px" alt="">
                    </div>
                    <h2><a href="">{{$col->product_name}}</a></h2>
                    <div class="product-carousel-price">
                        <ins>price :{{$col->price}} tk</ins>
                    </div>

                    <div class="product-option-shop">
                        <form action="{{url('cart/add/item/'.$col->id)}}" method="post">
                            @csrf
                            <input type="hidden" name="price" value="{{$col->price}}">

                            {{-- <button type="button" class="add-to-cart-link bb" onclick="addToCart({{ $product->id }})"><i class="fa fa-plus"></i> Add to cart</button> --}}

                           <button type="submit" class="add-to-cart-link bb"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-3 col-sm-6" style="display: none" id="ajax_data">
                <div class="single-shop-product">
                    <div class="product-upper">
                        <img src="{{asset($col->image_one)}}" style="height: 200px; width:200px" alt="">
                    </div>
                    <h2><a href="">{{$col->product_name}}</a></h2>
                    <div class="product-carousel-price">
                        <ins>price :{{$col->price}} tk</ins>
                    </div>

                    <div class="product-option-shop">
                        <form action="{{url('cart/add/item/'.$col->id)}}" method="post">
                            @csrf
                            <input type="hidden" name="price" value="{{$col->price}}"> --}}

                            {{-- <button type="button" class="add-to-cart-link bb" onclick="addToCart({{ $product->id }})"><i class="fa fa-plus"></i> Add to cart</button> --}}

                           {{-- <button type="submit" class="add-to-cart-link bb"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                        </form>
                    </div>
                </div>
            </div> --}}
            @endforeach
        </div>
        {{$all_product->links()}}
    </div>
</div>

<script>
    function search(){
        var search=$('#search').val();
        console.log(search);
    }
</script>

@endsection
