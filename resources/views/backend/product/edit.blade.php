<form id='edit' action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" method="post" >

    <div class="box-body">
        <div id="status"></div>
           {{method_field('PATCH')}}
            <div class="form-group col-md-10 col-sm-12">
                <label for="tour_image">product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value=""
                       placeholder="" required>
                <span id="error_first_name" class="has-error"></span>
            </div>
            <div class="form-group col-md-10 col-sm-12">
                <label for="tour_image">Category Name</label>
                <input type="text" class="form-control" id="category_id" name="category_id" value=""
                       placeholder="" required>
                <span id="error_first_name" class="has-error"></span>
            </div>
            <div class="form-group col-md-10 col-sm-12">
                <label for="tour_image">Brand Name</label>
                <input type="text" class="form-control" id="brand_id" name="brand_id" value=""
                       placeholder="" required>
                <span id="error_first_name" class="has-error"></span>
            </div>
            <div class="form-group col-md-10 col-sm-12">
                <label for="tour_image">Product code</label>
                <input type="text" class="form-control" id="product_code" name="product_code" value=""
                       placeholder="" required>
                <span id="error_first_name" class="has-error"></span>
            </div>
            <div class="form-group col-md-10 col-sm-12">
                <label for="tour_image">Product Quantity</label>
                <input type="text" class="form-control" id="product_quantity" name="product_quantity" value=""
                       placeholder="" required>
                <span id="error_first_name" class="has-error"></span>
            </div>
            <div class="form-group col-md-10 col-sm-12">
                <label for="tour_image">Price</label>
                <input type="text" class="form-control" id="price" name="price" value=""
                       placeholder="" required>
                <span id="error_first_name" class="has-error"></span>
            </div>
            <div class="form-group col-md-10 col-sm-12">
                <label for="tour_image">Sort Description</label>
                <input type="text" class="form-control" id="short_description" name="short_description" value=""
                       placeholder="" required>
                <span id="error_first_name" class="has-error"></span>
            </div>
            <div class="form-group col-md-10 col-sm-12">
                <label for="tour_image">Long Description</label>
                <input type="text" class="form-control" id="long_description" name="long_description" value=""
                       placeholder="" required>
                <span id="error_first_name" class="has-error"></span>
            </div>
            <div class="form-group col-md-10 col-sm-12">
                <label for="tour_image">Product Information</label>
                <input type="text" class="form-control" id="product_information" name="product_information" value=""
                       placeholder="" required>
                <span id="error_first_name" class="has-error"></span>
            </div>

            <div class="form-group col-md-10 col-sm-12">
                <label for="tour_image">Product Image1</label>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="file" class="form-control" id="image_one" name="image_one" value=""
                       placeholder="" required>
                <span id="error_first_name" class="has-error"></span>
                <img src="{{ asset($product->image_one) }}" frameborder="0" width="100%" height="70%">
            </div>

            <div class="form-group col-md-10 col-sm-12">
                <label for="tour_image">Product Image2</label>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="file" class="form-control" id="image_two" name="image_two" value=""
                       placeholder="" required>
                <span id="error_first_name" class="has-error"></span>
                <img src="{{ asset($product->image_two) }}" frameborder="0" width="100%" height="70%">
            </div>
            <div class="form-group col-md-10 col-sm-12">
                <label for="tour_image">Product Image3</label>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="file" class="form-control" id="image_three" name="image_three" value=""
                       placeholder="" required>
                <span id="error_first_name" class="has-error"></span>
                <img src="{{ asset($product->image_three) }}" frameborder="0" width="100%" height="70%">
            </div>
            <div class="form-group col-md-10 col-sm-12">
                <label for="tour_image">status</label>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" class="form-control" id="status" name="status" value=""
                       placeholder="" required>
                <span id="error_first_name" class="has-error"></span>
            </div>

            <div class="clearfix"></div>
            <div class="form-group col-md-12">
                <input type="submit" id="submit" name="submit" value="Save" class="btn btn-primary">
            </div>
            <div class="clearfix"></div>
    </div>  <!-- /.box-body -->
</form>


<script>
    $(document).ready(function () {
        $('#loader').hide();
        $('#edit').validate({// <- attach '.validate()' to your form
            // Rules for form validation
            rules: {
                // tour_image: {
                //     required: true
                // }
            },
            // Messages for form validation
            messages: {
                // tour_image: {
                //     required: 'Please enter Tour image'
                // }
            },
            submitHandler: function (form) {

                var myData = new FormData($("#edit")[0]);

                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),

                    url: "{{ route('products.update', $product->id) }}",
                    type: 'post',
                    data: myData,
                    dataType: 'json',
                    cache: false,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $('#loader').show();
                    },
                    success: function (data) {

                        $("#status").html(data.html);
                        reload_table();
                        $('#loader').hide();
                        $("#submit").prop('disabled', false); // disable button
                        $("html, body").animate({scrollTop: 0}, "slow");
                        $('#modalUser').modal('hide'); // hide bootstrap modal
                    },
                    error:function(error){

                    // Swal.fire({
                    //     text: 'Course name Already added! try another',
                    //     icon: 'error',
                    //     confirmButtonText: 'Ok'
                    //     })
                    }
                });
            }
            // <- end 'submitHandler' callback
        });                    // <- end '.validate()'

    });
</script>
