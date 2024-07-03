@extends("layouts.conquer2")
@section('content')
    <div class="page-content">
        <h3 class="page-title">
            Purchase History
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="{{route('transaction.history')}}">Transaction History</a>
                </li>
                <li>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="#" onclick="showInfo()">
                        <i class="icon-bulb"></i></a>
                </li>
            </ul>
        </div>
        @if (session('status'))
            <div class="alert alert-info">
                {!! session('status') !!}
            </div>
        @endif
        <div class="container">
            <h2>Purchases History</h2>
            <p>This is your purchase history</p>
            <p style="color: green"><strong> (your point right now {{$points}} points) </strong></p>
            <table class="table">
                <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Products</th>
                    <th>Total Price</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($purchaseHistory as $history)
                    <tr>
                        <td>{{ $history['transaction']->id }}</td>
                        <td>
                            <ol>
                                @foreach($history['products'] as $product)
                                    <li>{{ $product->product_name }} ({{ $product->quantity }} x Rp{{ number_format($product->price,2) }})</li>
                                @endforeach
                            </ol>
                        </td>
                        <td>Rp {{ number_format($history['transaction']->total_price, 2) }}</td>
                        <td>{{ $history['transaction']->created_at }}</td>
                        <td>{{ $history['transaction']->updated_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
