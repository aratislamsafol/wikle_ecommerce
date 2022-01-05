@extends('backend.admin_dash')
@section('brand') active @endsection
@section('main_content')

<span class="breadcrumb-item active">Tour gallery Table</span>
</nav>
<div class="sl-pagebody">

    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">All Tour</h6>

      <div class="panel-heading">
            <button class="btn btn-success" onclick="create()"><i class="glyphicon glyphicon-plus"></i>
                New Brand Add
            </button>

    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12 col-sm-12 table-responsive">
                <table id="manage_all" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Brand Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Update</th>
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
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">
                        Close
                    </button>
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
                ajax: '{!! route('getall.tour') !!}',
                columns: [
                    {data: 'brand_name', name: 'brand_name'},
                    {data: 'brand_image', name: 'brand_image'},
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
            $('.modal-title').text('New Brand Add'); // Set Title to Bootstrap modal title

            $.ajax({
                headers: {'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')},
                type: 'GET',
                url: 'tours/create',
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
                url: 'tours/' + id + '/edit',
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
                url: 'tours/' + id,
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
                        url: 'tours/' + id,
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



