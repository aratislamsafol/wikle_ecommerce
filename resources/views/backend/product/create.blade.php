<form id='create' action="" enctype="multipart/form-data" method="post"
      accept-charset="utf-8">
      @csrf
    <div class="box-body">
        <div id="status"></div>
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
            <input type="file" class="form-control" id="image_one" name="image_one" value=""
                   placeholder="" required>
            <span id="error_first_name" class="has-error"></span>
        </div>

        <div class="form-group col-md-10 col-sm-12">
            <label for="tour_image">Product Image2</label>
            <input type="file" class="form-control" id="image_two" name="image_two" value=""
                   placeholder="" required>
            <span id="error_first_name" class="has-error"></span>
        </div>
        <div class="form-group col-md-10 col-sm-12">
            <label for="tour_image">Product Image3</label>
            <input type="file" class="form-control" id="image_three" name="image_three" value=""
                   placeholder="" required>
            <span id="error_first_name" class="has-error"></span>
        </div>
        <div class="form-group col-md-10 col-sm-12">
            <label for="tour_image">status</label>
            <input type="text" class="form-control" id="status" name="status" value=""
                   placeholder="" required>
            <span id="error_first_name" class="has-error"></span>
        </div>

        <div class="clearfix"></div>
        <div class="form-group col-md-12">
            <input type="submit" id="submit" name="submit" value="Save" class="btn btn-primary">
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- /.box-body -->
</form>


<script>
    $(document).ready(function () {
        $('#loader').hide();
        $('#create').validate({// <- attach '.validate()' to your form
            // Rules for form validation
            rules: {


            },
            // Messages for form validation
            messages: {

            },
            submitHandler: function (form) {

                var myData = new FormData($("#create")[0]);

                $.ajax({
                    headers: {'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')},
                    url: "{{ route('products.store') }}",
                    type: 'POST',
                    data: myData,
                    dataType: 'json',
                    cache: false,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $('#loader').show();

                        // $("#submit").prop('disabled', false); // disable button
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

                        console.error(error)
                        // console.log(error.responseJSON.errors);
                    // Swal.fire({
                    //     text: 'Event Name already added Or file is not jpg,png,jpeg',
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





