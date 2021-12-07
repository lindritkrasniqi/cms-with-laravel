@extends('layouts.app')

@section('breadcrumb')
    @include('partials.breadcrumb', ['links' => ['Menage', 'Roles']])
@endsection

@section('content')
    <div class="row row-cols-1 row-cols-md-2 g-4">

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2>Roles</h2>
                    @include('partials.roles.table')
                </div>
            </div>
        </div>

        @can('create', \App\Models\Role::class)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('menage.roles.store') }}" method="POST">
                            @csrf

                            <h2>Create</h2>
                            <p class="text-medium-emphasis">{{ __('Register new role') }}</p>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class="icon fa fa-shield"></i>
                                </span>
                                <input class="form-control @error('role') is-invalid @enderror" type="text"
                                    placeholder="Role name" value="{{ old('role') }}" name="role">

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button class="btn btn-primary px-4" type="submit">{{ __('Create') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        @endcan
    </div>
@endsection
