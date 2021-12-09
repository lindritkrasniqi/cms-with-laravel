@extends('layouts.app')

@section('breadcrumb')
    @include('partials.breadcrumb', ['links' => ['Menage', 'Roles', $role->role]])
@endsection

@section('content')

    @can('create', \App\Models\Role::class)
        <div class="row">
            <div class="card col">
                <div class="card-body ">

                    <h2>{{ __('Menage policies') }}</h2>

                    <hr class="">

                    <div class="row">
                        <form id="premission-from" class="col-md-6"
                            action="{{ route('menage.roles.update', $role->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <p class="text-medium-emphasis">{{ __('Update the role name') }}</p>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class="icon fa fa-shield"></i>
                                </span>
                                <input class="form-control @error('role') is-invalid @enderror" type="text"
                                    placeholder="Role name" value="{{ $role->role ?? old('role') }}" name="role">

                                <button class="btn btn-primary px-4" type="submit">{{ __('Save') }}</button>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </form>

                        <form class="col-md-6" action="{{ route('menage.premissions.store', $role->id) }}"
                            method="POST">
                            @csrf
                            <p class="text-medium-emphasis">{{ __('Register new policy upon ' . $role->role . ' role.') }}</p>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class="icon fa fa-shield"></i>
                                </span>

                                @include('partials.policies')

                                <button class="btn btn-primary px-4" type="submit">{{ __('Add policy') }}</button>

                                @error('policy')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endcan

    <div class="row row-cols-1 row-cols-md-2 mt-2 g-4">
        @foreach ($role->premissions as $item)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">
                            <h3>{{ Str::ucfirst(Str::snake($item->policy, ' ')) }}</h3>

                            <form id="delete-{{ $item->policy }}-form"
                                action="{{ route('menage.premissions.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="button"
                                    onclick="event.preventDefault(); return confirm('Are you sure you want to take this action?') ? document.getElementById('delete-{{ $item->policy }}-form').submit() : false;"
                                    class="btn btn-outline-danger">{{ __('Revoke Policy') }}</button>
                            </form>
                        </div>

                        <p class="text-medium-emphasis fw-bold">{{ __('Define premissions') }}:</p>

                        <form id="{{ $item->policy }}-form"
                            action="{{ route('menage.premissions.update', $item->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="policy" value="{{ $item->policy }}">

                            <label class="form-label">{{ __('Can view any:') }}</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class="icon fa fa-shield"></i>
                                </span>

                                @include('partials.access', ['name' => 'view_any', 'value' => old('view_any') ??
                                $item->view_any, 'id' => $item->policy])
                            </div>

                            <label class="form-label">{{ __('Can view trashed:') }}</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class="icon fa fa-shield"></i>
                                </span>

                                @include('partials.access', ['name' => 'view_trashed', 'value' => old('view_trashed') ??
                                $item->view_trashed , 'id' => $item->policy])
                            </div>

                            <label class="form-label">{{ __('Can view unique:') }}</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class="icon fa fa-shield"></i>
                                </span>

                                @include('partials.access', ['name' => 'view', 'value' => old('view') ??
                                $item->view , 'id' => $item->policy])
                            </div>

                            <label class="form-label">{{ __('Can create:') }}</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class="icon fa fa-shield"></i>
                                </span>

                                @include('partials.access', ['name' => 'create', 'value' => old('create') ??
                                $item->create , 'id' => $item->policy])

                            </div>

                            <label class="form-label">{{ __('Can update:') }}</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class="icon fa fa-shield"></i>
                                </span>

                                @include('partials.access', ['name' => 'update', 'value' => old('update') ??
                                $item->update , 'id' => $item->policy])

                            </div>

                            <label class="form-label">{{ __('Can delete:') }}</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class="icon fa fa-shield"></i>
                                </span>

                                @include('partials.access', ['name' => 'delete', 'value' => old('delete') ??
                                $item->delete , 'id' => $item->policy])

                            </div>

                            <label class="form-label">{{ __('Can restore:') }}</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class="icon fa fa-shield"></i>
                                </span>

                                @include('partials.access', ['name' => 'restore', 'value' => old('restore') ??
                                $item->restore , 'id' => $item->policy])

                            </div>

                            <label class="form-label">{{ __('Can delete permanently:') }}</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class="icon fa fa-shield"></i>
                                </span>

                                @include('partials.access', ['name' => 'force_delete', 'value' => old('force_delete') ??
                                $item->force_delete , 'id' => $item->policy])
                            </div>
                        </form>

                    </div>

                    <div class="card-footer text-end">
                        <div class="text-muted small">{{ __('Last update ' . $item->updated_at->diffForHumans()) }}.
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
