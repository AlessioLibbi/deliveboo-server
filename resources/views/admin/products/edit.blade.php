@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="card mb-4">
            @csrf
            @method('PUT')
            <h2 class="card-header">{{ $product->name }}</h2>
            <div class="card-body">

                <div class="mb-4 row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name <span
                            class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control min @error('name') is-invalid @enderror" id="name"
                            name="name" required value="{{ old('name', $product->name) }}">
                        <div class="message-min d-none">
                            <span class="text-danger">Required at least 3 characters</span>
                        </div>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="visibility" class="col-md-4 col-form-label text-md-right">Available <span
                            class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('visibility') is-invalid @enderror" type="radio"
                                name="visibility" id="visibility_yes" value="1" checked @checked(old('visibility', $product->visibility) == 1)>
                            <label class="form-check-label" for="visibility_yes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline mx-3">
                            <input class="form-check-input @error('visibility') is-invalid @enderror" type="radio"
                                name="visibility" id="visibility_no" value="0"
                                @checked(old('visibility', $product->visibility) == 0)>
                            <label class="form-check-label" for="visibility_no">No</label>
                            @error('visibility')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="price" class="col-md-4 col-form-label text-md-right">Price <span
                            class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <div class="input-group">

                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                                name="price" step="0.01" min="0" required
                                value="{{ old('price', $product->price) }}">
                            <span class="input-group-text">&euro;</span>
                        </div>
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">Description <span
                            class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <textarea class="form-control min @error('description') is-invalid @enderror" id="description" name="description"
                        required>{{ old('description', $product->description) }}</textarea>
                        <div class="message-min d-none">
                            <span class="text-danger">Required at least 3 characters</span>
                        </div>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                </div>

                <div class="mb-4 row">
                    <div class="col-md-4 col-form-label text-md-right">Upload one or more images</div>
                    <div class="col-md-6">
                        <input type="file" class="form-control" id="img_path" name="image_path[]" accept="image/*" multiple>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success" id="submit">Add</button>
                <a href="{{ url()->previous() }}" class="btn btn-dark">Back</a>
            </div>
        </form>
        @if ($images)
            
        <div>
            <div class="card">
                <div class="card-header card-title">Images previously uploaded</div>

                <div class="card-body d-flex w-100 overflow-auto">
                    @foreach ($images as $image)
                    <div class="productImg position-relative mx-1" style="width: 200px">
                        <img src="{{ asset($pathInit . '/' . $image) }}" alt=""
                        style="width: 100%; height: 100%; object-fit: cover;">
                        <form
                        action="{{ route('delete.img', [$product->restaurant_id . 'chance' . $product->slug . 'chance' . $image]) }}"
                        method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger position-absolute top-0 end-0 m-2 btn-delete" data-product-name="this image">x</button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
@endsection
