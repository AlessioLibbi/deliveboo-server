@extends('layouts.admin')
@section('content')
    <div class="container overflow-y-auto">
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
            <div class="card p-0 my-5 text-decoration-none border border-success border-2">
                <h2 class="card-header fs-3 fw-bolder bg-success text-white">{{ $restaurant->name }}</h2>
                <ul class="row card-body" style="list-style-type: none">
                    <li class="col-sm-12 col-md-6 p-1"><span class="fw-bold">Address: </span>{{ $restaurant->address }}</li>
                    <li class="col-sm-12 col-md-6 p-1"><span class="fw-bold">Email: </span>{{ $restaurant->email }}</li>
                    <li class="col-sm-12 col-md-6 p-1"><span class="fw-bold">Telephone: </span>{{ $restaurant->number }}
                    </li>
                    <li class="col-sm-12 col-md-6 p-1"><span class="fw-bold">VAT Number: </span>{{ $restaurant->PIVA }}</li>
                </ul>
                {{-- <div class="text-end card-body">
                    <a href="{{ route('restaurants.edit', $restaurant->id) }}" class="btn btn-primary">Edit</a>
                </div> --}}
            </div>
            {{-- STATISTICS --}}
            <div style="width: 600px; margin: auto;">
                <canvas id="myChart" data-stats="{{$stats}}"></canvas>
            </div>
            {{-- END STATISTICS --}}
            <div class="d-flex justify-content-end mb-1 p-0">
                <a href="{{ route('products.create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i>
                    Product</a>
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
                                @php
                                    $directory = public_path($product->image_path);
                                    $files = glob($directory . '/*');
                                    
                                    $paths = null;
                                    
                                    if (!empty($files)) {
                                        $randomFile = $files[array_rand($files)];
                                        $paths = str_replace(public_path(), '', $randomFile);
                                    }
                                @endphp
                                @if ($product->image_path)
                                    <img src="{{ $paths }}" alt="" class="img-fluid rounded"
                                        style="max-width: 100px; max-heigth:100px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('img/images.png') }}" alt="" class="img-fluid rounded"
                                        style="max-width: 100px; max-heigth:100px; object-fit: cover;">
                                @endif

                            </td>
                            <td>{{ $product->name }}</td>
                            <td>
                                @if ($product->visibility === 1)
                                    <span class="border border-success p-1 text-success rounded-3">Available</span>
                                @else
                                    <span class="border border-danger p-1 text-danger rounded-3">Unavailable</span>
                                @endif
                            </td>
                            <td class="d-none d-md-table-cell">{{ $product->price }}&euro;</td>
                            <td class="d-none d-lg-table-cell">{{ $product->description }}</td>
                            <td>
                                <div class="w-75 m-auto">

                                    <a href="{{ route('products.show', $product) }}"
                                        class="btn btn-dark my-1 w-100">Show</a>
                                    <a href="{{ route('products.edit', $product) }}"
                                        class="btn btn-primary my-1 w-100">Edit</a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-delete my-1 w-100"
                                            data-product-name="{{ $product->name }}">Delete</button>
                                </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @yield('content')
        </div>
@endsection
