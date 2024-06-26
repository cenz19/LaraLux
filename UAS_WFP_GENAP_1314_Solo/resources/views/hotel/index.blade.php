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
                    <a href="{{route('hotel.index')}}">Hotel</a>
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

        <div class="container">
            <h2>Hotel Table</h2>
            <p>Ini adalah tabel Hotel</p>
            <a href="#modalCreate" data-toggle="modal" class="btn btn-info">+ New Hotel</a>
            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>hotel name</th>
                    <th>address</th>
                    <th>phone number</th>
                    <th>email</th>
                    <th>type</th>
{{--                    <th>Action</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($hotel_index_controller as $data)
                    <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->hotel_name}}</td>
                    <td>{{$data->address}}</td>
                    <td>{{$data->phone_number}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->hotel_type->hotel_type_name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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
                        <form method="POST" action="{{route("hotel.store")}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Hotel Name</label>
                                <input type="text" class="form-control" id="name" name="form_hotel_name"
                                       aria-describedby="nameHelp" placeholder="Enter your Hotel Name">
                                <br>
                                <label for="price">Address</label>
                                <input type="text" class="form-control" id="price" name="form_address"
                                       aria-describedby="nameHelp" placeholder="Enter your Address">
                                <br>
                                <label for="available_room">Phone Number</label>
                                <input type="text" class="form-control" id="available_room" name="form_phone_number"
                                       aria-describedby="nameHelp" placeholder="Enter your Phone Number">
                                <br>
                                <label for="images">Email</label>
                                <input type="email" class="form-control" id="images" name="form_email"
                                       aria-describedby="nameHelp" placeholder="Enter your Email">
                                <br>
                                <label for="hotel_id">Hotel Type</label>
                                <select name="form_hotel_type_id" id="hotel_id" class="form-control">
                                    @foreach ($hotel_type_controller as $data)
                                        <option value="{{$data->id}}">{{$data->hotel_type_name}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
