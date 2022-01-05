<form id='edit' action="{{ route('tours.update', $tours->id) }}" enctype="multipart/form-data" method="post" >

    <div class="box-body">
        <div id="status"></div>
           {{method_field('PATCH')}}

        <div class="form-group col-md-10 col-sm-12">
            <label for="tour_image">Tour Image </label>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="file" class="form-control" id="tour_image" name="tour_image"
                   placeholder="" >

            <img src="{{ asset($tours->tour_image) }}" frameborder="0" width="100%" height="70%">
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
        $('#edit').validate({// <- attach '.validate()' to your form
            // Rules for form validation
            rules: {
                tour_image: {
                    required: true
                }
            },
            // Messages for form validation
            messages: {
                tour_image: {
                    required: 'Please enter Tour image'
                }
            },
            submitHandler: function (form) {

                var myData = new FormData($("#edit")[0]);

                $.ajax({
                    headers: {'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')},

                    url: "{{ route('tours.update', $tours->id) }}",
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
                        // console.log(error.responseJSON);
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
<script>
    $(function(){
      'use strict';

      // Inline editor
      var editor = new MediumEditor('.editable');

      // Summernote editor
      $('#summernote').summernote({
        height: 150,
        tooltip: false
      })
    });
  </script>
