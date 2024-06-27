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
            Product
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="{{route('product.index')}}">Product</a>
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
            <h2>Product Table</h2>
            <p>Ini adalah tabel Product</p>
            <a href="#modalCreate" data-toggle="modal" class="btn btn-success">+ New Product</a>
            <a href="{{route('producttype.index')}}" data-toggle="modal" class="btn btn-info">Type</a>
            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>product name</th>
                    <th>product type</th>
                    <th>price ($)</th>
                    <th>Owned By</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    {{--                    <th>Action</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($product_index_controller as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->product_name}}</td>
                        <td>{{$data->product_type->product_type_name}}</td>
                        <td>{{$data->price}}</td>
                        <td>{{$data->hotel->hotel_name}}</td>
                        <td>{{$data->created_at}}</td>
                        <td>{{$data->updated_at}}</td>
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
                        <form method="POST" action="{{route("product.store")}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" class="form-control" id="name" name="form_product_name"
                                       aria-describedby="nameHelp" placeholder="Enter your Product Name">
                                <br>
                                <label for="hotel_id">Product Type</label>
                                <select name="form_product_type_id" id="hotel_id" class="form-control">
                                    @foreach ($product_type_controller as $data)
                                        <option value="{{$data->id}}">{{$data->product_type_name}}</option>
                                    @endforeach
                                </select>
                                <br>
                                <label for="available_room">Price</label>
                                <input type="number" min="100" step="10" class="form-control" id="available_room" name="form_price"
                                       aria-describedby="nameHelp" placeholder="Enter your Price">
                                <br>
                                <br>
                                <label for="hotel_id">Owned by</label>
                                <select name="form_hotel_id" id="hotel_id" class="form-control">
                                    @foreach ($product_hotel_id_controller as $data)
                                        <option value="{{$data->id}}">{{$data->hotel_name}}</option>
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
