@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-uppercase">{{$order->guest_name}}</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">&euro; {{$order->total}}</h6>
                <p class="card-text">{{$order->address}}</p>
                <p class="card-text">{{$order->phone}}</p>
                <p class="card-text">{{$order->email}}</p>
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <table class="table table-hover table-bordered text-center">
                            <caption>List of orders</caption>
                            <thead>
                                <tr class="table-dark">
                                    <th>Product</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->products as $product)
                                    <tr class="align-middle">
                                        <td>
                                            {{$product->name}}
                                        </td>
                                        <td>{{ $product->pivot->quantity }}</td>
                                    </tr>                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
            <a href="{{ route('ordersDetails.index') }}" class="btn btn-dark">Back</a>
            </div>
        </div>
    </div>
@endsection