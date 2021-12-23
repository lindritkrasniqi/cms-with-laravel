@extends('layouts.app')

@section('breadcrumb')
    @include('partials.breadcrumb', ['links' => ['Menage', 'Roles', $role->role]])
@endsection

@section('content')
    <div class="d-flex justify-content-center align-items-center">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h2>Details about {{ $role->role }} role</h2>

                    <p class="fw-lighter"> Total users with the given role: <span
                            class="fw-bolder">{{ count($role->users) }}</span>
                    </p>

                    @if (count($role->users) < 1)
                        <div class="lead text-center">No users yet on this role!</div>
                    @else
                        <div class="table-responsive">
                            <table class="table border mb-0">
                                <thead class="table-light fw-semibold">
                                    <tr class="align-middle">
                                        <th> </th>
                                        <th>User</th>
                                        <th class="text-center">Email</th>
                                        <th>Activity</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($role->users as $user)
                                        <tr class="align-middle">
                                            <td class="text-center">
                                                <div class="avatar avatar-md">
                                                    <x-avatar :user="$user"></x-avatar>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-capitalize">{{ $user->name }}</div>
                                                <div class="small text-medium-emphasis">Registered:
                                                    {{ $user->created_at->diffForHumans() }}
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a class="text-decoration-none" href="mailto:{{ $user->email }}">
                                                    <span class="fw-lighter" title="Contact">
                                                        {{ $user->email }}
                                                    </span>
                                                </a>
                                            </td>

                                            <td>
                                                <div class="small text-medium-emphasis">Last update</div>
                                                <div class="fw-semibold small">{{ $user->updated_at->diffForHumans() }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-transparent p-0" type="button"
                                                        data-coreui-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="icon fa fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                                        @can('view', $user)
                                                            <a class="dropdown-item"
                                                                href="{{ route('menage.users.show', $user->id) }}">Info</a>
                                                        @endcan

                                                        @can('update', $user)
                                                            <a class="dropdown-item"
                                                                href="{{ route('menage.users.edit', $user->id) }}">
                                                                Change permission
                                                            </a>
                                                        @endcan
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <div class="col mt-4">
                        <a href="{{ route('menage.roles') }}" class="btn btn-ghost-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
