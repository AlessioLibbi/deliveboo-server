@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="mb-4">Edit {{ $restaurant->name }}</h2>
        <form action="{{ route('restaurants.update', $restaurant->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4 row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Restaurant Name
                    <span class="text-danger">*</span>
                </label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control min @error('name') is-invalid @enderror"
                        name="name" required value="{{ old('name', $restaurant->name) }}">
                    <div class="message-min d-none">
                        <span class="text-danger">Required at least 3 characters</span>
                    </div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-4 row">
                <label for="address" class="col-md-4 col-form-label text-md-right">Address <span class="text-danger">*</span></label>

                <div class="col-md-6">
                    <input id="address" type="text" class="form-control min @error('address') is-invalid @enderror" name="address" required value="{{ old('address', $restaurant->address) }}">
                    <div class="message-min d-none">
                        <span class="text-danger">Required at least 3 characters</span>
                    </div>
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="mb-4 row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }} <span class="text-danger">*</span></label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" value="{{ old('email', $restaurant->email) }}">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="mb-4 row">
                <label for="number" class="col-md-4 col-form-label text-md-right">Number <span class="text-danger">*</span></label>

                <div class="col-md-6">
                    <input id="number" type="text" class="form-control @error('number') is-invalid @enderror" name="number" required value="{{ old('number', $restaurant->number) }}">
                    @error('number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="mb-4 row">
                <label for="PIVA" class="col-md-4 col-form-label text-md-right">VAT Number <span class="text-danger">*</span></label>

                <div class="col-md-6">
                    <input id="PIVA" type="text" class="form-control min @error('PIVA') is-invalid @enderror" name="PIVA" required value="{{ old('PIVA', $restaurant->PIVA) }}">
                    <div class="message-min d-none">
                        <span class="text-danger">Required 11 characters</span>
                    </div>
                    @error('PIVA')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="mb-4 row">
                <span class="col-md-4 col-form-label text-md-right">Cookings <span class="text-danger">*</span></span>
                <div class="col-md-6">

                    @foreach ($cookings as $cooking)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="{{ $cooking->name }}" name="cooking_id[]" value="{{ $cooking->id }}"                             @foreach ($restaurant->cookings as $cookingDefault)
                        @if ($cookingDefault->name == $cooking->name)
                        checked
                        @endif @endforeach>
                        <label for="{{ $cooking->name }}" class="form-check-label">{{ $cooking->name }}</label>
                    </div>
                    @endforeach
                    <div class="message d-none">
                        <span class="text-danger">Select at least one option</span>
                    </div>
                </div>
            </div>

            <button type="submit" id="submit" class="btn btn-primary mt-3">Edit</button>
        </form>
    </div>
@endsection
