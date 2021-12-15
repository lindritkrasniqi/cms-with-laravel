@extends('layouts.app')

@section('breadcrumb')
    @include('partials.breadcrumb', ['links' => ['Menage', 'Users', 'Edit']])
@endsection

@section('content')

    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('menage.users.update', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <h2>{{ __('Update') }}</h2>

                        <p class="text-medium-emphasis">{{ __('Update profile') }}</p>

                        <div class="d-flex justify-content-center align-items-center mb-4">
                            <div class="avatar border" style="width:200px; height:200px;">
                                <x-avatar :user="$user" width="200"></x-avatar>
                            </div>
                        </div>

                        <div class="input-group mb-3"><span class="input-group-text">
                                <i class="icon fa fa-user"></i></span>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Name"
                                name="name" value="{{ $user->name ?? old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3"><span class="input-group-text">
                                <i class="icon fa fa-envelope"></i></span>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" placeholder="Email"
                                name="email" value="{{ $user->email ?? old('email') }}">
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

                            @include('partials.roles.select', ['selected' => $user->role_id])

                            @error('role_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <a class="btn btn-block btn-ghost-danger" type="button" href="{{ route('menage.users') }}">
                            {{ __('Cancel') }}
                        </a>

                        <button class="btn btn-block btn-primary" type="submit">
                            {{ __('Save') }}
                        </button>
                    </form>

                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="lead">Additionals info</div>

                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h3>{{ __('Change password') }}</h3>

                    <form action="{{ route('menage.users.change-password', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <p class="text-medium-emphasis">{{ __('Update password') }}</p>

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
                            {{ __('Change password') }}
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
