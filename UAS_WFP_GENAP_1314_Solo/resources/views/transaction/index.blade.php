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
            Transaction
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>Transaction</span>
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
            <h2>Product owned by {{$products_by_hotel_id[0]->hotel_name}}</h2>
            <p>Ini adalah tabel Transaksi</p>
            <form action="{{route('transaction.checkout')}}" method="POST">
                @csrf
            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>product image</th>
                    <th>product name</th>
                    <th>product type</th>
                    <th>price ($)</th>
                    <th>Reserve</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products_by_hotel_id as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>
                            <img height='100px' width='100px' alt="image of {{$data->product_name}}" src="{{ asset('/logo/product/'.$data->product_image)}}"/><br>
                        </td>
                        <td>{{$data->product_name}}</td>
                        <td>{{$data->product_type_name}}</td>
                        <td>{{$data->price}}</td>
                        <td><input value="0" type="number" min="0" step="1" class="form-control" id="Quantity" name='form_quantity{{$data->id}}'
                                   aria-describedby="nameHelp" placeholder="Enter your quantity"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

