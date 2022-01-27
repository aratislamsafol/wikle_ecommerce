@extends('fontend.font_dash')
@section('main_section')
@include('fontend.inc.banner')
                    <h2>Easy Payment Gateway</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="padding:30px">
    <div class="row">
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form method="POST" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="firstName">Full name</label>
                        <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder=""
                               value="{{ $data['shipping_first_name'] }}" required>
                        <div class="invalid-feedback">
                            Valid customer name is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="mobile">Mobile</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+88</span>
                        </div>
                        <input type="text" name="customer_mobile" class="form-control" id="mobile" placeholder="Mobile"
                               value=" {{$data['shipping_phone']}}" required>
                        <div class="invalid-feedback" style="width: 100%;">
                            Your Mobile number is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                    <input type="email" name="customer_email" class="form-control" id="email"
                           placeholder="you@example.com" value="{{$data['shipping_email']}}" required>
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>




                <hr class="mb-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="same-address">
                    <input type="hidden" value="12000" name="amount" id="total_amount" required/>
                    <input type="hidden" value="{{$data['shipping_last_name']}}" name="shipping_last_name" id="shipping_last_name" required/>
                    <input type="hidden" value="{{$data['post_code']}}" name="post_code" id="post_code" required/>
                    <input type="hidden" value="{{$data['division_id']}}" name="division_id" id="division_id" required/>
                    <input type="hidden" value="{{$data['distric_id']}}" name="distric_id" id="distric_id" required/>
                    <input type="hidden" value="{{$data['shipping_state']}}" name="shipping_state" id="shipping_state" required/>

                    <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="save-info">
                    <label class="custom-control-label" for="save-info">Save this information for next time</label>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                        token="if you have any token validation"
                        postdata=""
                        order="If you already have the transaction generated for current order"
                        endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                </button>
            </form>
        </div>
    </div>
</div>


<!-- If you want to use the popup integration, -->
<script>
    var obj = {};
    obj.cus_name = $('#customer_name').val();
    obj.shipping_last_name=$('#shipping_last_name').val();
    obj.cus_phone = $('#mobile').val();
    obj.cus_email = $('#email').val();
    obj.cus_addr1 = $('#address').val();
    obj.amount = $('#total_amount').val();

    obj.post_code = $('#post_code').val();
    obj.division_id = $('#division_id').val();
    obj.distric_id = $('#distric_id').val();
    obj.shipping_state = $('#shipping_state').val();

    // $("#customer_name").change(function(){
    //     obj.cus_name = $('#customer_name').val();
    //  });
    //  $("#mobile").change(function(){
    //     obj.cus_phone = $('#mobile').val();
    //  });
    //   $("#email").change(function(){
    //     obj.cus_email = $('#email').val();
    //  });

    //  $("#address").change(function(){
    //     obj.cus_addr1 = $('#address').val();
    //  });


    //  $("#total_amount").change(function(){
    //     obj.amount = $('#total_amount').val();
    //  });

    $('#sslczPayBtn').prop('postdata', obj);

    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>
@endsection
