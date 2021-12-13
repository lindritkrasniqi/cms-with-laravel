@extends('layouts.app')

@section('breadcrumb')
    @include('partials.breadcrumb', ['links' => ['Settings', 'Profile']])
@endsection

@section('content')

    <div class="d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h1>{{ __('Profile') }}</h1>
                        <p class="text-medium-emphasis">{{ __('Your personal data') }}</p>

                        <div class="d-flex justify-content-center mb-4">
                            <div class="avatar avatar-lg bg-secondary" style="width: 150px; height: 150px; cursor: pointer;"
                                data-coreui-toggle="modal" data-coreui-target="#exampleModal">
                                <x-avatar width="150"></x-avatar>
                            </div>
                        </div>

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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
            <div class="modal-content w-50">
                <div class="modal-body p-0">
                    <div class="list-group text-center">
                        @if (!isset(auth()->user()->avatar))

                            <form id="profile-image-form" enctype="multipart/form-data"
                                action="{{ route('avatar.store') }}" method="post">
                                @csrf

                                <input type="file" id="profile-image-input" name="avatar" accept="image/*" hidden
                                    onchange="event.preventDefault(); document.getElementById('profile-image-form').submit();">
                            </form>
                            <li class="list-group-item list-group-item-action" style="cursor: pointer"
                                onclick="document.getElementById('profile-image-input').click()">
                                Set profile image
                            </li>

                        @else

                            <form id="profile-image-form" enctype="multipart/form-data"
                                action="{{ route('avatar.update') }}" method="post">
                                @csrf
                                @method('PUT')

                                <input type="file" id="profile-image-input" name="avatar" accept="image/*" hidden
                                    onchange="event.preventDefault(); document.getElementById('profile-image-form').submit();">
                            </form>
                            <li class="list-group-item list-group-item-action"
                                onclick="document.getElementById('profile-image-input').click()" style=" cursor: pointer">
                                Update your profile image
                            </li>

                            <form id="remove-avatar-form" action="{{ route('avatar.destroy') }}" method="post">
                                @csrf
                                @method('DELETE')
                            </form>
                            <li class="list-group-item list-group-item-action text-danger"
                                onclick="event.preventDefault(); document.getElementById('remove-avatar-form').submit()"
                                style="cursor: pointer">
                                Remove profile image
                            </li>
                        @endif

                        <li class="list-group-item list-group-item-action border-0 text-danger fw-bolder"
                            data-coreui-dismiss="modal" style="cursor: pointer">
                            Cancel
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
