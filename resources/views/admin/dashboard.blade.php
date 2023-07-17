@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">

                @if (session('message'))
                    <div class="card-body alert alert-success" id="message">

                        <div role="alert">
                            {{ session('message') }}

                        </div>
                    </div>
                @endif


            </div>
            <div class="card p-0 text-decoration-none border border-success border-2">
                <h2 class="card-header fs-3 fw-bolder bg-success text-white">{{ $restaurant->name }}</h2>
                <ul class="row card-body" style="list-style-type: none">
                    <li class="col-sm-12 col-md-6 p-1"><span class="fw-bold">Address: </span>{{ $restaurant->address }}</li>
                    <li class="col-sm-12 col-md-6 p-1"><span class="fw-bold">Email: </span>{{ $restaurant->email }}</li>
                    <li class="col-sm-12 col-md-6 p-1"><span class="fw-bold">Telephone: </span>{{ $restaurant->number }}</li>
                    <li class="col-sm-12 col-md-6 p-1"><span class="fw-bold">VAT Number: </span>{{ $restaurant->PIVA }}</li>
                </ul>
            </div>
            {{-- STATISTICS --}}
            <form action="{{ route('dashboard') }}" method="GET">
                <select name="year">
                    @foreach($yearArray as $year)
                        <option value="{{ $year }}" @if($year == $request->input('year')) selected @endif>{{ $year }}</option>
                    @endforeach
                </select>
            
                {{-- <select name="mese">
                    <option value="">Seleziona un mese</option>
                    @foreach($months as $month)
                        <option value="{{ $month }}" @if($month == $request->input('mese')) selected @endif>{{ $month }}</option>
                    @endforeach
                </select> --}}
            
                <button type="submit">Filtra</button>
            </form>
            <div class="row my-5">

                <div class="col-lg-4">
                    <canvas id="myPie" data-stats="{{ $stats }}"></canvas>
                </div>
                <div class="col-lg-8">
                    <canvas id="myChart" data-stats="{{ $stats }}"></canvas>
                </div>
            </div>
            {{-- END STATISTICS --}}
        </div>

    </div>
@endsection
