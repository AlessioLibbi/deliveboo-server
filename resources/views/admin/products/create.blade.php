@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="mb-4">Add Product</h2>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <label for="name" class="input-group-text">Name</label>
                <input type="text" class="form-control min @error('name') is-invalid @enderror" id="name"
                    name="name" required value="{{ old('name') }}">
                <div class="message-min d-none">
                    <span class="text-danger">Required at least 3 characters</span>
                </div>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="card mb-3">
                <div class="card-header">Available</div>
                <div class="form-check-inline my-1">
                    <div class="form-check form-check-inline mx-3">
                        <input class="form-check-input @error('visibility') is-invalid @enderror" type="radio"
                            name="visibility" id="visibility_yes" value="1"
                            {{ old('visibility') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="visibility_yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline mx-3">
                        <input class="form-check-input @error('visibility') is-invalid @enderror" type="radio"
                            name="visibility" id="visibility_no" value="0"
                            {{ old('visibility') == '0' ? 'checked' : '' }}>
                        <label class="form-check-label" for="visibility_no">No</label>
                    </div>
                </div>
                @error('visibility')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <label for="price" class="input-group-text">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" step="0.01" min="0" max="500" required value="{{ old('price') }}">
                <span class="input-group-text">&euro;</span>
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="input-group mb-3">
                <label for="description" class="input-group-text">Description</label>
                <textarea class="form-control min @error('description') is-invalid @enderror" id="description" name="description"
                required>{{ old('description') }}</textarea>
                <div class="message-min d-none">
                    <span class="text-danger">Required at least 3 characters</span>
                </div>
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            
            <div class="mb-3">
                <div class="form-text mx-2">Upload one or more images</div>
                <input type="file" class="form-control" id="img_path" name="image_path[]" accept="image/*" multiple>
            </div>
            
            <button type="submit" class="btn btn-primary" id="submit">Add Product</button>
            <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
        </form>
    </div>
    @endsection
    