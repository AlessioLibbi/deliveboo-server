@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit {{ $product->name }}:</h1>
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control   @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $product->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <div>Available:</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('visibility') is-invalid @enderror" type="radio"
                        name="visibility" id="visibility_yes" value="1" @checked(old('visibility', $product->visibility) == 1)>
                    <label class="form-check-label" for="visibility_yes">
                        yes
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('visibility') is-invalid @enderror" type="radio"
                        name="visibility" id="visibility_no" value="0" @checked(old('visibility', $product->visibility) == 0)>
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
                    <input type="number" class="form-control  @error('price') is-invalid @enderror" id="price"
                        name="price" step="0.01" value="{{ old('price', $product->price) }}" required>
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
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
                    <img src="{{ asset($pathInit . '/' . $image) }}" alt=""
                        style="width: 100%; height: 100%; object-fit: cover;">
                    <form
                        action="{{ route('delete.img', [$product->restaurant_id . '%%' . $product->slug . '%%' . $image]) }}"
                        method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger position-absolute top-0 end-0 m-2">x</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
