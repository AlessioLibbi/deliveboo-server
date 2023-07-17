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
            <div class="card p-0 text-decoration-none border border-success border-2 my-3">
                <h2 class="card-header fs-3 fw-bolder bg-success text-white">{{ $restaurant->name }}</h2>
                <ul class="row card-body" style="list-style-type: none">
                    <li class="col-sm-12 col-md-6 p-1"><span class="fw-bold">Address: </span>{{ $restaurant->address }}</li>
                    <li class="col-sm-12 col-md-6 p-1"><span class="fw-bold">Email: </span>{{ $restaurant->email }}</li>
                    <li class="col-sm-12 col-md-6 p-1"><span class="fw-bold">Telephone: </span>{{ $restaurant->number }}
                    </li>
                    <li class="col-sm-12 col-md-6 p-1"><span class="fw-bold">VAT Number: </span>{{ $restaurant->PIVA }}</li>
                </ul>
            </div>
            {{-- STATISTICS --}}
            @if (empty($stats))
                {
                <div class="card p-0 text-decoration-none border border-success border-2 my-3">
                    <h2 class="card-header fs-3 fw-bolder bg-success text-white">Analytics</h2>
                    <div class="card-body">

                        <div class="row my-5">

                            <div class="col-lg-4 align-items-start">
                                <form action="{{ route('dashboard') }}" method="GET" class="h-100">
                                    <div class="d-flex flex-column justify-content-between h-100">
                                        <div class="fs-5">
                                            <p>Here are you statistics for {{ $year }}.</p>
                                            <p>Change the input below to analyse a selected year.</p>
                                        </div>
                                        <div class="input-group">
                                            <select name="year" class="form-select">
                                                @foreach ($yearArray as $year)
                                                    <option value="{{ $year }}"
                                                        @if ($year == $request->input('year')) selected @endif>
                                                        {{ $year }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-danger">Select</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-8">
                                <canvas id="myChart" data-stats="{{ $stats }}"></canvas>
                            </div>
                        </div>
                        <div class="row my-5">
                            <div class="col-md-6 col-lg-8 text-center d-flex flex-column justify-content-end">
                                <div class="col-lg-12 m-0 p-0">
                                    <table class="table table-bordered">
                                        <thead class="table-success">
                                            <tr>
                                                <th>Total orders</th>
                                                <th>Average orders</th>
                                                <th>Top order</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $totalOrder }}</td>
                                                <td>{{ $avgOrder }}</td>
                                                <td>{{ $topOrder }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-12 m-0 p-0">
                                    <table class="table table-bordered">
                                        <thead class="table-success">
                                            <tr>
                                                <th>Total sales</th>
                                                <th>Average sales</th>
                                                <th>Top sale</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>&euro; {{ $totalSale }}</td>
                                                <td>&euro; {{ $avgSale }}</td>
                                                <td>&euro; {{ $topSale }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <canvas id="myPie" data-stats="{{ $stats }}"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                }
            @endif
            {{-- END STATISTICS --}}
        </div>
    </div>
@endsection
