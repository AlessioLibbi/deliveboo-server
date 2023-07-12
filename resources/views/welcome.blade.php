@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
        <div class="logo_laravel">
            <img src="{{url('/img/db_logo.png')}}" alt="deliveboo_logo">
        </div>
        <h1 class="display-5 fw-bold">
            Welcome to Deliveboo Restaurants
        </h1>

        <p class="col-md-8 fs-4">Your WebApp to create, check and control your restaurant.</p>
    </div>
</div>

<div class="content">
    <div class="container">
        <p>
            <span>Want to eat?</span>
            <a href="http://localhost:5174/" class="btn btn-link" type="button">Order Here!</a>
        </p>
    </div>
</div>
@endsection