@extends('layouts.default')

@section('content')
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card-group d-block d-md-flex row">
                        <div class="card col-md-7 p-4 mb-0">
                            <div class="card-body">
                                <form action="{{ route('login') }}" method="post">
                                    @csrf
                                    <h1>{{ __('Login') }}</h1>
                                    <p class="text-medium-emphasis">{{ __('Sign In to your account') }}</p>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <i class="icon fa fa-user"></i>
                                        </span>
                                        <input class="form-control @error('email') is-invalid @enderror" type="text"
                                            placeholder="Username" value="{{ old('email') }}" name="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-4">
                                        <span class="input-group-text">
                                            <i class="icon fa fa-lock"></i>
                                        </span>
                                        <input class="form-control @error('password') is-invalid @enderror" type="password"
                                            placeholder="Password" name="password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-primary px-4" type="submit">{{ __('Login') }}</button>
                                        </div>

                                        @if (Route::has('password.request'))
                                            <div class="col-6 text-end">
                                                <a class="btn btn-link px-0 text-decoration-none"
                                                    href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card col-md-5 text-white bg-primary py-5">
                            <div class="card-body text-center">
                                <div>
                                    <h2>{{ __('Sign up') }}</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>

                                    <a class="btn btn-lg btn-outline-light mt-3" href="{{ route('register') }}">
                                        {{ __('Register Now!') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
