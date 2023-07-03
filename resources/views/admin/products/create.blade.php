@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Add Product</h1>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name"
                    required>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="img_path" class="form-label">Image Path:</label>
                <input type="file" class="form-control" id="img_path" name="image_path[]" accept="image/*" multiple>
            </div>


            <div class="mb-3">
                <div>Available:</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('visibility') is-invalid @enderror" type="radio"
                        name="visibility" id="visibility_yes" value="1" checked>
                    <label class="form-check-label" for="visibility_yes">
                        yes
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('visibility') is-invalid @enderror" type="radio"
                        name="visibility" id="visibility_no" value="0">
                    <label class="form-check-label" for="visibility_no">
                        no
                    </label>
                </div>
                @error('visibility')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                        name="price" step="0.01" required>
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control  @error('description') is-invalid @enderror" id="description" name="description" required></textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
@endsection
