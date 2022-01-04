
@extends('backend.admin_dash')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
@section('category') active @endsection
@section('main_content')

<div class="row p-4">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Category</h2>
        </div>
        <div class="pull-right mb-2">
            <a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Create Company</a>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card-body">
        <table class="table table-bordered" id="ajax-crud-datatable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Category Name</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
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

{{-- View Modal --}}
<div class="modal fade" id="modal_view" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="view">Category View</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 table-responsive">
                    <table id="CompanyForm" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                              <th scope="col"><p><b>Name : </b><span id="view_category_name" class="text-success"></span></p></th>
                              <th scope="col"><p><b>Company Name : </b><span id="status" class="text-success"></span></p></th>

                            </tr>
                          </thead>

                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready( function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#ajax-crud-datatable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ url('ajax-crud-datatable') }}",
    columns: [
    { data: 'id', name: 'id' },
    { data: 'category_name', name: 'category_name' },
    { data: 'status', name: 'status' },
    { data: 'created_at', name: 'created_at' },
    {data: 'action', name: 'action', orderable: false},
    ],
    order: [[0, 'desc']]
    });
    });
    function add(){
        $('#CompanyForm').trigger("reset");
        $('#CompanyModal').html("Category ADD");
        $('#company-modal').modal('show');
        $('#id').val('');
    }

    function viewfun(id){
    $.ajax({
        type:"GET",
        url: "{{ url('view-cat') }}",
        data: { id: id },
        dataType: 'json',
        success: function(res){
            $('#view').html("View Category");
            $('#modal_view').modal('show');
            $('#id').val(res.id);
            $('#view_category_name').val(res.category_name);
            // $('#status').val(res.status);
        }
    });
    }

    function editFunc(id){
    $.ajax({
        type:"POST",
        url: "{{ url('edit-company') }}",
        data: { id: id },
        dataType: 'json',
        success: function(res){
            $('#CompanyModal').html("Edit Category");
            $('#company-modal').modal('show');
            $('#id').val(res.id);
            $('#name').val(res.category_name);
            $('#status').val(res.status);
        }
    });
    }

    function deleteFunc(id){
    if (confirm("Delete Record?") == true) {
    var id = id;
    // ajax
    $.ajax({
    type:"POST",
    url: "{{ url('delete-company') }}",
    data: { id: id },
    dataType: 'json',
    success: function(res){
    var oTable = $('#ajax-crud-datatable').dataTable();
    oTable.fnDraw(false);
    }
    });
    }
    }
    $('#CompanyForm').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
    type:'POST',
    url: "{{ url('store-company')}}",
    data: formData,
    cache:false,
    contentType: false,
    processData: false,
    success: (data) => {
    $("#company-modal").modal('hide');
    var oTable = $('#ajax-crud-datatable').dataTable();
    oTable.fnDraw(false);
    $("#btn-save").html('Submit');
    $("#btn-save"). attr("disabled", false);
    },
    error: function(data){
    console.log(data);
    }
    });
    });
    </script>
  @stop
