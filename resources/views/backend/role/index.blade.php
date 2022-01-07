@extends('backend.admin_dash')
@section('role') active @endsection
@section('main_content')

</nav>

<div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Role Details</h5>

    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Role</h6>

      <div class="table-wrapper">
        <table id="datatable1" class="table display responsive nowrap">
          <thead>
            <tr>
              <th class="wd-15p">Role Id</th>
              <th class="wd-15p">Role Name</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($role_show as $rs)
              <tr>
                <td>{{$rs->id}}</td>
                <td>{{$rs->name}}</td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div><!-- card -->
  </div><!-- sl-pagebody -->


@endsection

<script>
    $('#datatable1').DataTable({
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
        });
</script>



