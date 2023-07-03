@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Add Product</h1>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="img_path" class="form-label">Image Path:</label>
                <input type="file" class="form-control" id="img_path" name="image_path[]" accept="image/*" multiple>
            </div>

            <div class="form-check mb-3">
                <h4>Available</h4>
                <div class="div">
                    <input type="radio" class="form-check-input " id="yes" name="visibility" value="1" >
                    <label class="form-check-label" for="yes">yes</label>

                </div>
                <div class="div">

                    <input type="radio" class="form-check-input" id="visibility" name="visibility" value="0" >
                    <label class="form-check-label" for="visibility">no</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>


            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
@endsection
