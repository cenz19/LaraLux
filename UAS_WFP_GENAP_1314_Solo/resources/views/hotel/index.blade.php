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

        @if (session('status'))
            <div class="alert alert-info">
                {!! session('status') !!}
            </div>
        @endif

        <div class="container">
            <h2>Hotel Table</h2>
            <p>Ini adalah tabel Hotel</p>
{{--            <a href="{{route('hotel.report')}}" data-toggle="modal" class="btn btn-info">Top 3</a>--}}
            <a href="#modalCreate" data-toggle="modal" class="btn btn-success">+ New Hotel</a>
            <a href="{{route('hoteltype.index')}}" data-toggle="modal" class="btn btn-info">Type</a>
            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>hotel image</th>
                    <th>hotel name</th>
                    <th>address</th>
                    <th>phone number</th>
                    <th>email</th>
                    <th>type</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th>Action</th>
                    <th>Reservation</th>
                </tr>
                </thead>
                <tbody>
                @foreach($hotel_index_controller as $data)
                    <tr>
                    <td>{{$data->id}}</td>
                    <td>
                        <img height='100px' width='100px' alt="image of {{$data->hotel_name}}" src="{{ asset('/logo/hotel/'.$data->hotel_image)}}"/><br>
                    </td>
                    <td>{{$data->hotel_name}}</td>
                    <td>{{$data->address}}</td>
                    <td>{{$data->phone_number}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->hotel_type->hotel_type_name}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>{{$data->updated_at}}</td>
                    <td>
                        <a href="{{ url('hotel/uploadLogo/'.$data->id) }}" class="btn btn-success">upload Hotel Picture</a>
                        <a href="#modalEditA" class="btn btn-warning" data-toggle="modal" onclick="getEditFormHotel({{$data->id}})">Edit this row</a>
                        <form method="POST" action="{{route('hotel.destroy',$data->id)}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="delete this row" class="btn btn-danger" onclick="return confirm('Are you sure to delete {{$data->id}} - {{$data->hotel_name}} ? ');">
                        </form>
                    </td>
                    <td><a href="{{url("hotel/transaction/".$data->id)}}" class="btn-success btn">Reserve this hotel</a></td>
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
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalEditA" tabindex="-1" role="basic" aria-hidden="true">
             <div class="modal-dialog modal-wide">
                   <div class="modal-content" >
                          <div class="modal-body" id="modalContent">
                                 {{-- You can put animated loading image here... --}}
                              </div>
                         </div>
                 </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        function getEditFormHotel(hotel_id)
        {
            $.ajax({
                type:'POST',
                url:'{{route("hotel.getEditFormHotel")}}',
                data: {
                    '_token' : '<?php echo csrf_token() ?>',
                    'id': hotel_id
                },
                success: function(data){
                    $('#modalContent').html(data.msg)
                }
            });
        }
    </script>

@endsection

