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
            Facility
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="{{route('facility.index')}}">Facility</a>
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
            <h2>Facility Table</h2>
            <p>Ini adalah tabel Facility</p>
            @canany(['owner','staff'])
            <a href="#modalCreate" data-toggle="modal" class="btn btn-success">+ New Facility</a>
            @endcanany
            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>facility image</th>
                    <th>facility name</th>
                    <th>description</th>
                    <th>Owned by product</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    @canany(['owner','staff'])
                    <th>Action</th>
                    @endcanany
                </tr>
                </thead>
                <tbody>
                @foreach($facility_index_controller as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>
                            <img height='100px' width='100px' alt="image of {{$data->facility_name}}" src="{{ asset('/logo/facility/'.$data->facility_image)}}"/><br>
                        </td>
                        <td>{{$data->facility_name}}</td>
                        <td>{{$data->description}}</td>
                        <td>{{$data->product->product_name}}</td>
                        <td>{{$data->created_at}}</td>
                        <td>{{$data->updated_at}}</td>
                        @canany(['owner','staff'])
                        <td>
                            <a href="{{ url('facility/uploadLogo/'.$data->id) }}" class="btn btn-success">upload Facility Picture</a>
                            <a href="#modalEditA" class="btn btn-warning" data-toggle="modal" onclick="getEditFormFacility({{$data->id}})">Edit Facility</a>
                            <form method="POST" action="{{route('facility.destroy',$data->id)}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="delete" class="btn btn-danger" onclick="return confirm('Are you sure to delete {{$data->id}} - {{$data->facility_name}} ? ');">
                            </form>
                        </td>
                        @endcanany
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
                        <form method="POST" action="{{route("facility.store")}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Facility Name</label>
                                <input type="text" class="form-control" id="name" name="form_facility_name"
                                       aria-describedby="nameHelp" placeholder="Enter your Facility Name">
                                <br>
                                <label for="available_room">Description</label>
                                <textarea class="form-control" id="available_room" name="form_description" aria-describedby="nameHelp" placeholder="Enter your description"></textarea>
                                <br>

                                <label for="hotel_id">Owned by</label>
                                <select name="form_product_id" id="hotel_id" class="form-control">
                                    @foreach ($product_id as $data)
                                        <option value="{{$data->id}}">{{$data->product_name}}</option>
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
        function getEditFormFacility(facility_id)
        {
            $.ajax({
                type:'POST',
                url:'{{route("facility.getEditFormFacility")}}',
                data: {
                    '_token' : '<?php echo csrf_token() ?>',
                    'id': facility_id
                },
                success: function(data){
                    $('#modalContent').html(data.msg)
                }
            });
        }
    </script>

@endsection

