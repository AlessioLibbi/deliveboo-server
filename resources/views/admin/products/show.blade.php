@extends('layouts.admin')

@section('content')
    <div class="container my-5 d-flex justify-content-center">

        <div class="card w-50">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach ($images as $index => $image)
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}"
                            class="active" aria-current="true" aria-label="Slide {{ $index }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner" style="height: 300px">
                    @foreach ($images as $index => $image)
                        <div class="carousel-item @if ($index === 0) active @endif">
                            <img src="{{ asset($image) }}" alt="Imagen {{ $index }}" class="card-img-top" style="width: 100%; height: 100%; object-fit: cover;">
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
            <div class="card-body">
                <h5 class="card-title text-uppercase">{{$product->name}}</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">&euro; {{$product->price}}</h6>
                <p class="card-text">{{$product->description}}</p>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('dashboard') }}" class="btn btn-dark">Back</a>
            </div>
        </div>
    </div>
@endsection
