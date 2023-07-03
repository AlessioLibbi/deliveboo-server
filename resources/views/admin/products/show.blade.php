@extends('layouts.admin')

@section('content')
<div class="center d-flex justify-content-center overflow-hidden my-5">
    <div id="carouselExampleIndicators" class="carousel slide w-50" data-bs-ride="carousel" style="height: 300px;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @foreach ($images as $index => $image)
                <div class="carousel-item @if ($index === 0) active @endif">
                    <img src="{{ asset($image) }}" alt="Imagen {{ $index + 1 }}"
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="container mt-4">
    <h2 class="text-center">{{ $product->name }}</h2>
    <p class="text-center">Price: {{ $product->price }}</p>
    <p>{{ $product->description }}</p>
</div>

@endsection
