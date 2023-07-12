@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="list position-relative">
            <table class="table table-hover table-bordered text-center">
                <caption>List of orders</caption>
                <thead>
                    <tr class="table-dark">
                        <th>Order number</th>
                        <th>Data</th>
                        <th class="d-none d-xl-table-cell">Name Client</th>
                        <th class="d-none d-lg-table-cell">Address</th>
                        <th class="d-none d-lg-table-cell">Phone</th>
                        <th class="d-none d-lg-table-cell">Email</th>
                        <th class="d-none d-md-table-cell">Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="align-middle">
                            <td>
                                {{$order->id}}
                            </td>
                            <td class="d-none d-xl-table-cell">
                                {{$order->date}}
                            </td>
                            <td>{{ $order->guest_name }}</td>
                            <td>
                                {{$order->address}}
                            </td>
                            <td class="d-none d-lg-table-cell">{{ $order->phone }}</td>
                            <td class="d-none d-md-table-cell">{{ $order->email }}</td>
                            <td class="d-none d-md-table-cell">{{ $order->total }}&euro;</td>
                            <td>
                                <a href="{{ route('ordersDetails.show', $order) }}" class="btn btn-dark">Show</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @yield('content')
    </div>
@endsection
