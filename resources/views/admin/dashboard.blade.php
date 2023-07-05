@extends('layouts.admin')


@section('content')
    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col">

                @if (session('message'))
                    <div class="card-body alert alert-success" id="message">

                        <div role="alert">
                            {{ session('message') }}

                        </div>
                    </div>
                @endif


            </div>
            <div class="list position-relative">
                <div class="card mb-5">
                    <div class="card-header">
                        <h2>{{ $data->name }}</h2>
                    </div>
                    <table class="table table-bordered text-center">
                        <tbody>
                            <tr>
                                <th class="table-dark">Address</th>
                                <td>{{ $data->address }}</td>
                            </tr>
                            <tr>
                                <th class="table-dark">Email</th>
                                <td>{{ $data->email }}</td>
                            </tr>
                            <tr>
                                <th class="table-dark">Number</th>
                                <td>{{ $data->number }}</td>
                            </tr>
                            <tr>
                                <th class="table-dark">VAT Number</th>
                                <td>{{ $data->PIVA }}</td>
                            </tr>

                            <tr>
                                <th class="table-dark">Id</th>
                                <td>{{ $data->user_id }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-end card-body">
                        <a href="{{ route('restaurants.edit', $data->id) }}" class="btn btn-secondary">Edit</a>
                    </div>
                </div>
                <div class="position d-flex justify-content-end mb-5">
                    <a href="{{ route('products.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i>
                        Products</a>
                </div>
                <table class="table table-hover table-bordered text-center">
                    <caption>List of product</caption>
                    <thead>
                        <tr class="table-dark">
                            <th>Product</th>
                            <th class="d-none d-xl-table-cell">Name</th>
                            <th>Available</th>
                            <th class="d-none d-md-table-cell">Price</th>
                            <th class="d-none d-lg-table-cell">Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="align-middle">
                                <td class="d-none d-xl-table-cell">
                                    <img src="{{ asset('img/images.png') }}" alt="" class="img-fluid rounded"
                                        style="max-width: 100px;">
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    @if ($product->visibility === 1)
                                        Available
                                    @else
                                        Not Available
                                    @endif
                                </td>
                                <td class="d-none d-md-table-cell">{{ $product->price }}&euro;</td>
                                <td class="d-none d-lg-table-cell">{{ $product->description }}</td>
                                <td>
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-primary">Show</a>
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-secondary">Edit</a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button  class="btn btn-danger btn-delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @yield('content')
        </div>

    @endsection
