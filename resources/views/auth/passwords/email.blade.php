@extends('layouts.default')

@section('content')
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mb-4 mx-4">
                        <div class="card-body p-4">

                            <form action="{{ route('password.email') }}" method="POST">
                                @csrf
                                <h1>{{ __('Reset Password') }}</h1>

                                <p class="text-medium-emphasis">{{ __('Get a reset password link!') }}</p>

                                <div class="input-group mb-3"><span class="input-group-text">
                                        <i class="icon fa fa-envelope"></i></span>
                                    <input class="form-control @error('email') is-invalid @enderror" type="text"
                                        placeholder="Email" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button class="btn btn-block btn-primary" type="submit">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
