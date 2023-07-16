@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="list position-relative">
            <table class="table table-hover table-bordered text-center">
                <caption>List of orders</caption>
                <thead>
                    <tr class="table-dark">
                        <th class="table-cell">Data</th>
                        <th class="d-none d-md-table-cell">Client</th>
                        <th class="d-none d-md-table-cell">Address</th>
                        <th class="d-none d-lg-table-cell">Phone</th>
                        <th class="d-none d-lg-table-cell">Email</th>
                        <th  class="table-cell">Total</th>
                        <th class="table-cell">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td class="table-cell">
                                {{ $order->created_at }}
                            </td>
                            <td class="d-none d-md-table-cell">{{ $order->guest_name }}</td>
                            <td class="d-none d-md-table-cell">
                                {{ $order->address }}
                            </td>
                            <td class="d-none d-lg-table-cell">{{ $order->phone }}</td>
                            <td class="d-none d-lg-table-cell">{{ $order->email }}</td>
                            <td class="table-cell">{{ $order->total }}&euro;</td>
                            <td class="table-cell">
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
