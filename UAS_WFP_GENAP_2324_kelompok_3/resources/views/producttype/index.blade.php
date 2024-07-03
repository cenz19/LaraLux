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
            Product Type
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
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="{{route('producttype.index')}}">Type</a>
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
            <h2>Product Type Table</h2>
            <p>Ini adalah tabel Product Type</p>
            @canany(['owner', 'staff'])
            <a href="#modalCreate" data-toggle="modal" class="btn btn-success">+ New Product Type</a>
            @endcanany
            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Type name</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    {{--                    <th>Action</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($product_type_controller as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->product_type_name}}</td>
                        <td>{{$data->created_at}}</td>
                        <td>{{$data->updated_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>



        @canany(['owner', 'staff'])
        <div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" >
                    <div class="modal-header">
                        <button type="button" class="close"
                                data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add New Type</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route("producttype.store")}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Type Name</label>
                                <input type="text" class="form-control" id="name" name="form_type_name"
                                       aria-describedby="nameHelp" placeholder="Enter your Type Name">
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
        @endcanany

    </div>
@endsection

