@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit {{ $restaurant->name }}:</h1>
        <form action="{{ route('restaurants.update', $restaurant->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', $restaurant->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" class="form-control" id="address" name="address"
                    value="{{ old('address', $restaurant->address) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" class="form-control" id="email" name="email"
                    value="{{ old('email', $restaurant->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="number" class="form-label">Number:</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="number" name="number" step="0.01"
                        value="{{ old('number', $restaurant->number) }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="PIVA" class="form-label">PIVA:</label>
                <textarea class="form-control" id="PIVA" name="PIVA" required>{{ $restaurant->PIVA }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Edit</button>
        </form>
    </div>
@endsection
