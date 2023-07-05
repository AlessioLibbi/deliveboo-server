@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="mb-4">Edit {{ $product->name }}</h2>
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <label for="name" class="input-group-text">Name</label>
                
                <input type="text" class="form-control   @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name', $product->name) }}" required>
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
                        name="visibility" id="visibility_yes" value="1" @checked(old('visibility', $product->visibility) == 1)>
                        <label class="form-check-label" for="visibility_yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline mx-3">
                        <input class="form-check-input @error('visibility') is-invalid @enderror" type="radio"
                        name="visibility" id="visibility_no" value="0" @checked(old('visibility', $product->visibility) == 0)>
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
                <input type="number" class="form-control  @error('price') is-invalid @enderror" id="price"
                name="price" step="0.01" min="0" max="500"
                value="{{ old('price', $product->price) }}" required>
                <span class="input-group-text">&euro;</span>

                @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="input-group mb-3">
                <label for="description" class="input-group-text">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="input-group mb-3">
                <label for="img_path" class="input-group-text">Upload images</label>
                <input type="file" class="form-control" id="img_path" name="image_path[]" accept="image/*" multiple>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="{{ url()->previous() }}" class="btn btn-warning">Indietro</a>
        </form>
        <div class="d-flex w-100 overflow-auto mt-3">
            @foreach ($images as $image)
                <div class="productImg position-relative mx-1" style="width: 200px">
                    <img src="{{ asset($pathInit . '/' . $image) }}" alt=""
                        style="width: 100%; height: 100%; object-fit: cover;">
                    <form
                        action="{{ route('delete.img', [$product->restaurant_id . 'chance' . $product->slug . 'chance' . $image]) }}"
                        method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger position-absolute top-0 end-0 m-2 btn-delete">x</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
