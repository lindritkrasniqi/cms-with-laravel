@extends('layouts.app')

@section('breadcrumb')
    @include('partials.breadcrumb', ['links' => ['Settings', 'Profile']])
@endsection

@section('content')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h1>{{ __('Profile') }}</h1>
                        <p class="text-medium-emphasis">{{ __('Your personal data') }}</p>

                        <div class="input-group mb-3"><span class="input-group-text">
                                <i class="icon fa fa-user"></i></span>
                            <input class="form-control @error('name') is-invalid @enderror" type="text"
                                placeholder="Your name" name="name" value="{{ old('name') ?? auth()->user()->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3"><span class="input-group-text">
                                <i class="icon fa fa-envelope"></i></span>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" placeholder="Email"
                                name="email" value="{{ old('email') ?? auth()->user()->email }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button class="btn btn-block btn-primary" type="submit">
                            {{ __('Update your profile') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
