@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit {{ $product->name }}:</h1>
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="form-check mb-3">
                <h4>Available</h4>
                <div class="div">
                    <input type="radio" class="form-check-input " id="yes" name="visibility" value="1"
                        @checked(old('visibility', $product->visibility) == 1)>
                    <label class="form-check-label" for="yes">yes</label>

                </div>
                <div class="div">

                    <input type="radio" class="form-check-input" id="visibility" name="visibility" value="0"
                        @checked(old('visibility', $product->visibility) == 0)>
                    <label class="form-check-label" for="visibility">no</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" class="form-control" id="price" name="price" step="0.01"
                        value="{{ old('price', $product->price) }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="img_path" class="form-label">Add Images:</label>
                <input type="file" class="form-control" id="img_path" name="image_path[]" accept="image/*" multiple>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Edit</button>
        </form>
        <div class="d-flex w-100 overflow-auto mt-5">
            @foreach ($images as $image)
                <div class="productImg position-relative" style="width: 300px">
                    <img src="{{ asset($image) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                    <form action="{{ route('delete.img', urlencode($image)) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger position-absolute top-0 end-0 m-2">x</button>
                    </form>                    
                </div>
            @endforeach
        </div>
    </div>
@endsection
