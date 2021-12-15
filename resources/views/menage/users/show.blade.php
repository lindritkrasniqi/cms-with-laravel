@extends('layouts.app')

@section('breadcrumb')
    @include('partials.breadcrumb', ['links' => ['Menage', 'Users', 'Informations']])
@endsection

@section('content')

    <div class="d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center mb-4">{{ __('Personal informations') }}</h3>

                    <div class="d-flex justify-content-center align-items-center mb-4">
                        <div class="avatar border" style="width:200px; height:200px;">
                            <x-avatar :user="$user" width="200"></x-avatar>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-5 fw-lighter text-end">{{ __('Name') }}:</div>
                        <div class="col-md-7 fw-medium">{{ $user->name }}</div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-5 fw-lighter text-end">{{ __('Email') }}:</div>
                        <div class="col-md-7 fw-medium">{{ $user->email }}</div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-5 fw-lighter text-end">Role:</div>
                        <div class="col-md-7 fw-medium text-capitalize">{{ $user->role->role }}</div>
                    </div>

                    <div class="text-center my-4">
                        <a href="{{ route('menage.users') }}" class="btn btn-ghost-danger">Cancel</a>
                        @can('update', $user)
                            <a href="{{ route('menage.users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                        @endcan

                        @can('delete', $user)
                            <a href="#"
                                onclick="event.preventDefault(); return confirm('Are you sure you want to take this action?') ? document.getElementById('delete-user-form').submit() : false;"
                                class="btn btn-outline-danger">Delete</a>
                            <form id="delete-user-form" action="{{ route('menage.users.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
