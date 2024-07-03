@extends("layouts.conquer2")
@section('content')
    <div class="modal fade" id="disclaimer" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">DISCLAIMER</h4>
                </div>
                <div class="modal-body">
                    Pictures shown are for illustration purpose only. Actual product may vary due to product enhancement.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-wide">
            <div class="modal-content" id="showproducts">
                <!--loading animated gif can put here-->
            </div>
        </div>
    </div>
    <div class="page-content">
        <h3 class="page-title">
            Hotel
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="{{route('user.index')}}">User</a>
                </li>
                <li >
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="#" onclick="showInfo()">
                        <i class="icon-bulb"></i></a>
                </li>

            </ul>
            <div class="page-toolbar">
                <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height btn-primary" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                    <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
                </div>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-info">
                {!! session('status') !!}
            </div>
        @endif

        <div class="container">
            <h2>User</h2>
            <p>Ini adalah tabel user</p>
            <a href="#modalCreate" data-toggle="modal" class="btn btn-success">+ New User</a>
            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>password</th>
                    <th>role</th>
                    <th>points</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th>action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user_index_controller as $data)
                    <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->password}}</td>
                    <td>{{$data->role}}</td>
                    <td>{{$data->points}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>{{$data->updated_at}}</td>
                    <td><form method="POST" action="{{route('user.destroy',$data->id)}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="delete" class="btn btn-danger" onclick="return confirm('Are you sure to delete {{$data->id}} - {{$data->name}} ? ');">
                        </form></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add New Type</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route("user.store")}}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="form_name"
                                   aria-describedby="nameHelp" placeholder="Enter your Name">
                            <br>
                            <label for="name">Email</label>
                            <input type="email" class="form-control" id="name" name="form_email"
                                   aria-describedby="nameHelp" placeholder="Enter your Email">
                            <br>
                            <label for="name">Password</label>
                            <input type="password" class="form-control" id="name" name="form_password"
                                   aria-describedby="nameHelp" placeholder="Enter your Email">
                            <br>
                            <label for="hotel_id">Role</label>
                            <select name="form_role" id="hotel_id" class="form-control">
                                <option value="owner">owner</option>
                                <option value="staff">staff</option>
                                <option value="pembeli">pembeli</option>
                            </select>
                            <br>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-wide">
            <div class="modal-content" >
                <div class="modal-body" id="modalContent">
                    {{-- You can put animated loading image here... --}}
                </div>
            </div>
        </div>
    </div>
@endsection

