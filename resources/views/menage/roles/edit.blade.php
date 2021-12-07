@extends('layouts.app')

@section('breadcrumb')
    @include('partials.breadcrumb', ['links' => ['Menage', 'Roles', $role->role]])
@endsection

@section('content')
    <div class="d-flex justify-content-center align-items-center">

        @can('create', \App\Models\Role::class)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('menage.roles.update', $role->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <h2>Update</h2>
                            <p class="text-medium-emphasis">{{ __('Update the role name') }}</p>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class="icon fa fa-shield"></i>
                                </span>
                                <input class="form-control @error('role') is-invalid @enderror" type="text"
                                    placeholder="Role name" value="{{ $role->role ?? old('role') }}" name="role">

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <a class="btn btn-ghost-danger px-4" type="button"
                                href="{{ url()->previous() }}">{{ __('Back') }}</a>
                            <button class="btn btn-primary px-4" type="submit">{{ __('Save') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        @endcan
    </div>
@endsection
