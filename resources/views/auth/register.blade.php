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
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }} <span
                                        class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }} <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }} <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="password form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="messagePassword d-none">
                            <span class="text-danger">* The password dont match</span>
                        </div>

{{-- ------------------------------------- NUOVO FORM --}}

                        <div class="mb-4 row">
                            <label for="restaurant_name" class="col-md-4 col-form-label text-md-right">Restaurant Name <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="restaurant_name" type="text" class="form-control @error('restaurant_name') is-invalid @enderror" name="restaurant_name" required>
                                @error('restaurant_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" required>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">Number <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="number" type="text" class="form-control @error('number') is-invalid @enderror" name="number" required>
                                @error('number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="PIVA" class="col-md-4 col-form-label text-md-right">VAT Number <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="PIVA" type="text" class="form-control @error('PIVA') is-invalid @enderror" name="PIVA" required>
                                @error('PIVA')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <span class="col-md-4 col-form-label text-md-right">Cookings</span>
                            <div class="col-md-6">

                                @foreach ($cookings as $cooking)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="{{ $cooking->name }}" name="cooking_id[]" value="{{ $cooking->id }}">
                                    <label for="{{ $cooking->name }}" class="form-check-label">{{ $cooking->name }}</label>
                                </div>
                            </div>
                            <div class="message d-none">
                                <span class="text-danger">* select one tipology plis</span>
                            </div>
                        </div>
                        {{-- -----------FINE NUOVO FORM --}}
                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4 text-end">
                                <button id="submit" class="btn btn-primary" type="submit">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }} <span
                                        class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}
                                    <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }} <span
                                        class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>


                            {{-- ------------------------------------- NUOVO FORM --}}

                            <div class="mb-4 row">
                                <label for="restaurant_name" class="col-md-4 col-form-label text-md-right">Restaurant Name
                                    <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="restaurant_name" type="text"
                                        class="form-control @error('restaurant_name') is-invalid @enderror"
                                        name="restaurant_name" required>
                                    @error('restaurant_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Address <span
                                        class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address" required>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="number" class="col-md-4 col-form-label text-md-right">Number <span
                                        class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="number" type="text"
                                        class="form-control @error('number') is-invalid @enderror" name="number" required>
                                    @error('number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="PIVA" class="col-md-4 col-form-label text-md-right">VAT Number <span
                                        class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="PIVA" type="text"
                                        class="form-control @error('PIVA') is-invalid @enderror" name="PIVA" required>
                                    @error('PIVA')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <span class="col-md-4 col-form-label text-md-right">Cookings</span>
                                <div class="col-md-6">

                                    @foreach ($cookings as $cooking)
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="{{ $cooking->name }}"
                                                name="cooking_id[]" value="{{ $cooking->id }}">
                                            <label for="{{ $cooking->name }}"
                                                class="form-check-label">{{ $cooking->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            {{-- -----------FINE NUOVO FORM --}}
                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4 text-end">
                                    <button type="submit" class="btn btn-primary">
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
