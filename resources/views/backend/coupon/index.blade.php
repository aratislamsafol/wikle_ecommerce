@extends('backend.admin_dash')
@section('coupon') active @endsection
@section('main_content')

</nav>
<div class="sl-pagebody">

    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">All Coupon</h6>

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
                        <th>Coupon Name</th>
                        <th>Discount</th>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- boostrap company model -->
<div class="modal fade" id="company-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="CompanyModal"></h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="CompanyForm" name="CompanyForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Category Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category Name" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="status" value="" name="status" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save">Save changes
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
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
                ajax: '{!! route('getall.coupon') !!}',
                columns: [
                    {data: 'coupon_name', name: 'coupon_name'},
                    {data: 'discount', name: 'discount'},
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
                url: '/coupons/create',
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
                url: '/coupons/' + id + '/edit',
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


    // // Try to Active
    // function editFunc(id){
    //     $.ajax({
    //         type:"POST",
    //         url: "{{ url('edit-coupon') }}",
    //         data: { id: id },
    //         dataType: 'json',
    //         success: function(res){
    //             $('#CompanyModal').html("Edit Category");
    //             $('#company-modal').modal('show');
    //             $('#id').val(res.id);
    //             $('#name').val(res.coupon_name);

    //         }
    //     });
    //     }


    // $('#CompanyForm').submit(function(e) {
    // e.preventDefault();
    // var formData = new FormData(this);
    // $.ajax({
    // type:'POST',
    // url: "{{ url('store-company')}}",
    // data: formData,
    // cache:false,
    // contentType: false,
    // processData: false,
    // success: (data) => {
    // $("#company-modal").modal('hide');
    // var oTable = $('#ajax-crud-datatable').dataTable();
    // oTable.fnDraw(false);
    // $("#btn-save").html('Submit');
    // $("#btn-save"). attr("disabled", false);
    // },
    // error: function(data){
    // console.log(data);
    // }
    // });
    // });




        $("#manage_all").on("click", ".view", function () {

            $("#modal_data").empty();
            $('.modal-title').text('View Events'); // Set Title to Bootstrap modal title

            var id = $(this).attr('id');

            $.ajax({
                url: '/coupons/' + id,
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
                        url: '/coupons/' + id,
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



