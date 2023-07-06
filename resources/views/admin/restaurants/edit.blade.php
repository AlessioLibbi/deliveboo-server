@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="mb-4">Edit {{ $restaurant->name }}</h2>
        <form action="{{ route('restaurants.update', $restaurant->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="input-group mb-3">
                <label for="name" class="input-group-text">Name</label>
                <input type="text" class="form-control min" id="name" name="name"
                    value="{{ old('name', $restaurant->name) }}" required>
            </div>
            <div class="message-min d-none">
                <span class="text-danger">* Min 3 caracters</span>
            </div>
            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <div class="input-group mb-3">
                <label for="address" class="input-group-text">Address</label>
                <input type="text" class="min form-control @error('address') is-invalid @enderror" id="address" name="address"
                    value="{{ old('address', $restaurant->address) }}" required>
            </div>
            <div class="message-min d-none">
                <span class="text-danger">* Min 3 caracters</span>
            </div>
            @error('address')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <div class="input-group mb-3">
                <label for="email" class="input-group-text">Email</label>
                <input type="text" class="form-control" id="email" name="email"
                    value="{{ old('email', $restaurant->email) }}" required>
            </div>
            @error('email')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <div class="input-group mb-3">
                <label for="number" class="input-group-text">Number</label>
                <input type="number" class="form-control" id="number" name="number" step="0.01"
                    value="{{ old('number', $restaurant->number) }}" required>
            </div>
            @error('number')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <div class="input-group mb-3">
                <label for="PIVA" class="input-group-text ">VAT Number</label>
                <input type="PIVA" class="form-control min" id="PIVA" name="PIVA" step="0.01"
                    value="{{ old('PIVA', $restaurant->PIVA) }}" required>
            </div>
            <div class="message-min d-none">
                <span class="text-danger">* Min 3 caracters</span>
            </div>
            @error('PIVA')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <div class="card">

                <span class="input-group-text mb-3">Tipology</span>
                @foreach ($cookings as $cooking)
                    <div class="form-check mx-3">
                        <input type="checkbox" class="form-check-input" id="{{ $cooking->name }}" name="cooking_id[]"
                            value="{{ $cooking->id }}"
                            @foreach ($restaurant->cookings as $cookingDefault)
                    @if ($cookingDefault->name == $cooking->name)
                    checked
                    @endif @endforeach>
                        <label for="{{ $cooking->name }}" class="form-check-label">{{ $cooking->name }}</label>
                    </div>
                @endforeach
                <div class="message d-none">
                    <span class="text-danger">* select one tipology plis</span>
                </div>
                @error('cooking_id')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            </div>

            <button type="submit" id="submit" class="btn btn-primary mt-3">Edit</button>
        </form>
    </div>
@endsection
