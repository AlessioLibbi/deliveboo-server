@extends('layouts.admin')

@section('content')
<div class="center d-flex justify-content-center overflow-hidden my-5">
    <div id="carouselExampleIndicators" class="carousel slide w-50" data-bs-ride="carousel" style="height: 300px;">
        <div class="carousel-indicators">
            @foreach ($images as $index => $image)
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class="active"
                aria-current="true" aria-label="Slide {{ $index }}"></button>
        @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($images as $index => $image)
                <div class="carousel-item @if ($index === 0) active @endif">
                    <img src="{{ asset($image) }}" alt="Imagen {{ $index }}"
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

<a href="{{url()->previous()}}" class="btn btn-warning">Indietro</a>

@endsection
