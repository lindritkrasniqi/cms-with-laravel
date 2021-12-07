@extends('layouts.app')

@section('breadcrumb')
    @include('partials.breadcrumb', ['links' => [ 'Menage', 'Users']])
@endsection

@section('content')

    <div class="d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2>{{ __('Create') }}</h2>

                    <form action="{{ route('menage.users.store') }}" method="post">
                        @csrf
                        <p class="text-medium-emphasis">{{ __('Create new account') }}</p>

                        <div class="input-group mb-3"><span class="input-group-text">
                                <i class="icon fa fa-user"></i></span>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Name"
                                name="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3"><span class="input-group-text">
                                <i class="icon fa fa-envelope"></i></span>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" placeholder="Email"
                                name="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="icon fa fa-shield"></i>
                            </span>

                            @include('partials.roles.select')

                            @error('role_id')
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
                            {{ __('Create Account') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
