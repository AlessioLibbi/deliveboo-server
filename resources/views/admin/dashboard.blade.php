@extends('layouts.admin')


@section('content')
    <div class="container ">
        <div class="row justify-content-center my-4">
            <div class="col">
                @if (session()->has('message'))
                    <div class="card alert" id="alert">
                        <div class="card-header">Hello {{ Auth::user()->name }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ __('You are logged in!') }}
                        </div>
                    </div>
                @endif
            </div>
            <div class="list position-relative overflow-auto" style="height: calc(100vh - 80px)">

                <h2 class="fs-4 text-secondary my-4">
                    Ristorante {{ $data->name }}
                </h2>
                <div class="position d-flex justify-content-end mb-5">
                    <a href="{{ route('products.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i>
                        Products</a>
                </div>
                @foreach ($products as $product)
                    <div class="product d-flex justify-content-between align-items-center border border-2 rounded p-0">
                        <div class="img">
                            <img src="{{ asset('img/vinicius-benedit--1GEAA8q3wk-unsplash.jpg') }}" alt=""
                                class="img-fluid rounded" style="max-width: 200px;">
                        </div>
                        <div class="content">
                            <h4 class="mb-1">title</h4>
                            <p class="text-muted">prezzo</p>
                        </div>
                        <div class="actions pe-2">
                            <a href="#" class="btn btn-primary">show</a>
                            <a href="#" class="btn btn-secondary">edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @yield('content')
    </div>


@endsection
