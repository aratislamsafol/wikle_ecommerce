@extends('fontend.font_dash')
@section('main_section')

@include('fontend.inc.banner')
                <h2>User Profile</h2>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Page title area -->


<div class="container mt-3" style="padding: 20px">
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <a href="{{route('home')}}" class="list-group-item btn-primary btn-block"><span>Home</span></a>
                    {{-- <li href="" Home</li> --}}
                    <a href="" class="list-group-item btn-primary btn-block"><span>My Order</span></a>
                    <a class="list-group-item btn-block btn-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
        <div class="col-sm-8">
          <div class="card">
            <div class="card-body">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                          <th scope="col">First Name</th>
                          <th scope="col">Last Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Address</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($profile as $row)
                            <tr>
                                <th scope="row">{{$row->f_name}}</th>
                                <td>{{$row->l_name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->phone_number}}</td>
                                <td>{{$row->street_address}}</td>
                                <td><a href="{{route('update.profile',$row->id)}}" class="btn btn-primary">Update</a></td>
                            </tr>
                          @endforeach

                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
</div>


@endsection
