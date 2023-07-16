@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card p-0 text-decoration-none shadow-lg border border-success border-2">
            <h2 class="card-header fs-3 fw-bolder bg-success text-white">{{ $restaurantShow->name }}</h2>
            <ul class="row card-body" style="list-style-type: none">
                <li class="col-sm-12 col-md-6 p-1"><span class="fw-bold">Address: </span>{{ $restaurantShow->address }}</li>
                <li class="col-sm-12 col-md-6 p-1"><span class="fw-bold">Email: </span>{{ $restaurantShow->email }}</li>
                <li class="col-sm-12 col-md-6 p-1"><span class="fw-bold">Telephone: </span>{{ $restaurantShow->number }}</li>
                <li class="col-sm-12 col-md-6 p-1"><span class="fw-bold">VAT Number: </span>{{ $restaurantShow->PIVA }}</li>
                <li class="col-12 p-1">
                    @foreach ($restaurantShow->cookings as $cookingDefault)
                    <span class="badge rounded-pils text-bg-danger m-1">{{ $cookingDefault->name }}</span>
                    @endforeach
                </li>
            </ul>

            <div class="text-end card-body">
                <a href="{{ route('restaurants.edit', $restaurantShow->id) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
@endsection
