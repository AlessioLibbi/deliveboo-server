@extends('layouts.admin')


@section('content')
<div class="container">    
    <div class="row justify-content-center my-4">
        <div class="col">
            <div class="card">
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
        </div>
        <h2 class="fs-4 text-secondary my-4">
            Ristorante {{ $data->name}}
        </h2>
<ul>
    @foreach ($products as $product)
        {{$product->name}}
    @endforeach
</ul>
    </div>
    @yield('content')
</div>
@endsection