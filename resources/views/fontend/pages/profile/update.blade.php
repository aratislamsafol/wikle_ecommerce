@extends('fontend.font_dash')
@section('main_section')

@include('fontend.inc.banner')
                <h2>Profile Update</h2>
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

                          <th scope="col">Phone</th>
                          <th scope="col">Address</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <form action="{{url('update/user/profile/'.$user_id->id)}}" method="post">

                            <th scope="row">
                                <input type="text" name="f_name" class="form-control" value={{$user_id->f_name}} id="f_name" aria-describedby="f_name">
                            </th>
                            <td><input type="text" name="l_name" class="form-control" value={{$user_id->l_name}} id="l_name" aria-describedby="l_name"></td>

                            <td><input type="number" name="phone_number" value={{$user_id->phone_number}} class="form-control" id="phone_number" aria-describedby="phone_number"></td>
                            <td><input type="text" name="street_address" value={{$user_id->street_address}} class="form-control" id="street_address" aria-describedby="street_address"></td>
                            <td><button type="submit">Save</button></td>
                        </form>
                        </tr>

                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
</div>


@endsection
