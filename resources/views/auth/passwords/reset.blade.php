@extends('layouts.default')

@section('content')
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mb-4 mx-4">
                        <div class="card-body p-4">
                            <form action="{{ route('password.update') }}" method="POST">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <h1>{{ __('Reset Passwrod') }}</h1>
                                <p class="text-medium-emphasis">{{ __('Reset your password account!') }}</p>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="icon fa fa-envelope"></i>
                                    </span>
                                    <input class="form-control @error('email') is-invalid @enderror" type="text"
                                        placeholder="Email" name="email" value="{{ $email ?? old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3"><span class="input-group-text">
                                        <i class="icon fa fa-lock"></i></span>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password"
                                        placeholder="Password" name="password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-group mb-4"><span class="input-group-text">
                                        <i class="icon fa fa-lock"></i></span>
                                    <input class="form-control" type="password" placeholder="Repeat password"
                                        name="password_confirmation">
                                </div>

                                <button class="btn btn-block btn-primary" type="submit">
                                    {{ __('Reset Password') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
