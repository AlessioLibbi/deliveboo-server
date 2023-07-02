@extends('layouts.admin')


@section('content')
    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col">
                @if (session()->has('message'))
                    <div class="card alert" id="alert">
                        <div class="card-header">Hello {{ Auth::user()->name }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ __('You are logged in!') }}
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
                                <th class="table-dark">Number</th>
                                <td>{{ $data->number }}</td>
                            </tr>
                            <tr>
                                <th class="table-dark">Partita IVA</th>
                                <td>{{ $data->PIVA }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-end card-body">
                        <a href="#" class="btn btn-secondary">edit</a>
                    </div>
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
                            <tr>
                                <td class="d-none d-xl-table-cell">
                                    <img src="{{ asset('img/vinicius-benedit--1GEAA8q3wk-unsplash.jpg') }}" alt=""
                                        class="img-fluid rounded" style="max-width: 200px;">
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    @if ($product->visibility === 1)
                                        true
                                    @else
                                        false
                                    @endif
                                </td>
                                <td class="d-none d-md-table-cell">{{ $product->price }}&euro;</td>
                                <td class="d-none d-lg-table-cell">{{ $product->description }}</td>
                                <td>
                                    <a href="#" class="btn my-1 btn-primary">show</a>
                                    <a href="#" class="btn my-1 btn-secondary">edit</a>
                                    <a href="#" class="btn my-1 btn-danger">delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @yield('content')
    </div>


@endsection
