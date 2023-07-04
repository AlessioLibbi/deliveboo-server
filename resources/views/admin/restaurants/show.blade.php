@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
           
            <div class="card-body">
                <h5 class="card-title">{{ $restaurantShow->name }}</h5>
                <p class="card-text"><strong>Address:</strong> {{ $restaurantShow->address }}</p>
                <p class="card-text"><strong>Phone:</strong> {{ $restaurantShow->number }}</p>
                <p class="card-text"><strong>VAT Number:</strong> {{ $restaurantShow->PIVA }}</p>
                <strong>Tipology</strong>
                <ul>
                    @foreach ($restaurantShow->cookings as $cookingDefault)
                        <li>{{ $cookingDefault->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
