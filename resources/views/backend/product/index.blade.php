@extends('backend.admin_dash')
@section('product') active @endsection
@section('main_content')

</nav>
<div class="sl-pagebody">

    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">All Brand</h6>

      <div class="panel-heading">
            <button class="btn btn-success" onclick="create()"><i class="glyphicon glyphicon-plus"></i>
                New Product Add
            </button>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12 col-sm-12 table-responsive">
                <table id="manage_all" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Product Category</th>
                        <th>Product Brand</th>
                        <th>Product Quantity</th>
                        <th>Product Price</th>
                        <th>Product short description</th>
                        <th>Product long description</th>
                        <th>Product Information</th>
                        <th>Product Image1</th>
                        <th>Product Image2</th>
                        <th>Product Image3</th>
                        <th>Product Status</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    </div><!-- card -->


  </div><!-- sl-pagebody -->

    <!--========================  User Modal  section =================-->
    <div class="modal fade" id="modalUser" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <p class="modal-title" id="myModalLabel"></p>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div id="modal_data"></div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media screen and (min-width: 768px) {
            #modalUser .modal-dialog {
                width: 75%;
                border-radius: 5px;
            }
        }
    </style>
     <script>
        $(function () {
            table = $('#manage_all').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('getall.product') !!}',
                columns: [
                    {data: 'product_name', name: 'product_name'},
                    {data: 'category_id', name: 'category_id'},
                    {data: 'brand_id', name: 'brand_id'},
                    {data: 'product_quantity', name: 'product_quantity'},
                    {data: 'price', name: 'price'},
                    {data: 'short_description', name: 'short_description'},
                    {data: 'long_description', name: 'long_description'},
                    {data: 'product_information', name: 'product_information'},
                    {data: 'image_one', name: 'image_one'},
                    {data: 'image_two', name: 'image_two'},
                    {data: 'image_three', name: 'image_three'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action'}
                ]
            });
        });
    </script>
    <script type="text/javascript">

        function reload_table() {
            table.ajax.reload(null, false); //reload datatable ajax
        }

        function create() {

            $("#modal_data").empty();
            $('.modal-title').text('New Product Add'); // Set Title to Bootstrap modal title

            $.ajax({
                headers: {'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')},
                type: 'GET',
                url: 'products/create',
                success: function (data) {
                    $("#modal_data").html(data.html);
                    $('#modalUser').modal('show');
                },
                error: function (result) {
                    $("#modal_data").html("Sorry Cannot Load Data");
                }
            });
        }


        $("#manage_all").on("click", ".edit", function () {

            $("#modal_data").empty();
            $('.modal-title').text('Edit Events'); // Set Title to Bootstrap modal title

            var id = $(this).attr('id');

            $.ajax({
                url: '/products/' + id + '/edit',
                type: 'get',
                success: function (data) {
                    $("#modal_data").html(data.html);
                    $('#modalUser').modal('show'); // show bootstrap modal
                },
                error: function (result) {
                    $("#modal_data").html("Sorry Cannot Load Data");
                }
            });
        });

        $("#manage_all").on("click", ".view", function () {

            $("#modal_data").empty();
            $('.modal-title').text('View Events'); // Set Title to Bootstrap modal title

            var id = $(this).attr('id');

            $.ajax({
                url: '/products/' + id,
                type: 'get',
                success: function (data) {
                    $("#modal_data").html(data.html);
                    $('#modalUser').modal('show'); // show bootstrap modal
                },
                error: function (result) {
                    $("#modal_data").html("Sorry Cannot Load Data");
                }
            });
        });

    </script>
    <script type="text/javascript">

        $(document).ready(function () {
            $("#manage_all").on("click", ".delete", function () {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var id = $(this).attr('id');
                swal({
                    title: "Are you sure",
                    text: "Deleted data cannot be recovered!!",
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Delete",
                    cancelButtonText: "Cancel"
                }, function () {
                    $.ajax({
                        url: '/products/' + id,
                        data: {"_token": CSRF_TOKEN},
                        type: 'DELETE',
                        dataType: 'json',
                        success: function (data) {

                            if (data.type === 'success') {

                                swal("Done!", "Successfully Deleted", "success");
                                reload_table();

                            } else if (data.type === 'danger') {

                                swal("Error deleting!", "Try again", "error");

                            }
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            swal("Error deleting!", "Try again", "error");
                        }
                    });
                });
            });
        });

    </script>

@stop



