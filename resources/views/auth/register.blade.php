@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }} <span class="text-danger fw-bold">*</span></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control min @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus maxlength="255">
                                <div class="message-min d-none">
                                    <span class="text-danger fw-bold">At least 3 characters required</span>
                                </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }} <span class="text-danger fw-bold">*</span></label>

                            <div class="col-md-6">
                                <input id="inputEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <div id="messageEmail" class=" d-none">
                                    <span class="text-danger fw-bold">Valid email required</span>
                                </div>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="mypsw" class="col-md-4 col-form-label text-md-right">{{ __('Password') }} <span class="text-danger fw-bold">*</span></label>

                            <div class="col-md-6">
                                <input id="mypsw" type="password" class="password form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                <div id="validatePassword" class="d-none row text-decoration-none p-1">
                                        <p id="myletter" class="text-danger">A lowercase letter is required</p>
                                        <p id="mycapital" class="text-danger">A capital (uppercase) letter is required</p>
                                        <p id="mynumber" class="text-danger">A number is required</p>
                                        <p id="mylength" class="text-danger">Minimum 8 characters required</p>
                                  </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }} <span class="text-danger fw-bold">*</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control password" name="password_confirmation" required autocomplete="new-password">
                                <div class="messagePassword d-none">
                                    <span class="text-danger fw-bold">Password doesn't match</span>
                                </div>
                            </div>
                        </div>

{{-- ------------------------------------- NUOVO FORM --}}

                        <div class="mb-4 row">
                            <label for="restaurant_name" class="col-md-4 col-form-label text-md-right">Restaurant Name <span class="text-danger fw-bold">*</span></label>

                            <div class="col-md-6">
                                <input id="restaurant_name" type="text" class="form-control min @error('restaurant_name') is-invalid @enderror" name="restaurant_name" required maxlength="255">
                                <div class="message-min d-none">
                                    <span class="text-danger fw-bold">At least 3 characters required</span>
                                </div>
                                @error('restaurant_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address <span class="text-danger fw-bold">*</span></label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control min @error('address') is-invalid @enderror" name="address" required>
                                <div class="message-min d-none">
                                    <span class="text-danger fw-bold">At least 3 characters required</span>
                                </div>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="inputNumber" class="col-md-4 col-form-label text-md-right">Number <span class="text-danger fw-bold">*</span></label>

                            <div class="col-md-6">
                                <input id="inputNumber" type="text" class="form-control @error('number') is-invalid @enderror" name="number" required maxlength="15">
                                <div id="messageNumber" class="d-none">
                                    <span class="text-danger fw-bold">Valid number required</span>
                                </div>
                                @error('number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="PIVA" class="col-md-4 col-form-label text-md-right">VAT Number <span class="text-danger fw-bold">*</span></label>

                            <div class="col-md-6">
                                <input id="PIVA" type="text" class="form-control PIVA @error('PIVA') is-invalid @enderror" name="PIVA" required maxlength="11">
                                <div class="message-PIVA d-none">
                                    <span class="text-danger fw-bold">Required 11 characters</span>
                                </div>
                                @error('PIVA')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <span class="col-md-4 col-form-label text-md-right">Cookings <span class="text-danger fw-bold">*</span></span>
                            <div class="col-md-6 row">

                                @foreach ($cookings as $cooking)
                                <div class="form-check col-md-6 col-lg-4">
                                    <input type="checkbox" class="form-check-input" id="{{ $cooking->name }}" name="cooking_id[]" value="{{ $cooking->id }}">
                                    <label for="{{ $cooking->name }}" class="form-check-label">{{ $cooking->name }}</label>
                                </div>
                                @endforeach
                                <div class="message d-none">
                                    <span class="text-danger fw-bold">Select at least one option</span>
                                </div>
                            </div>
                        </div>
                        {{-- -----------FINE NUOVO FORM --}}
                        <div class="mb-4 row mb-0">
                            <div class="d-flex my-5 justify-content-between">
                                <span class="text-danger fw-bold">Field required <span class="text-danger fw-bold">*</span></span>
                                <button id="submit" class="btn btn-primary" type="submit">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
