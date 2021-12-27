@extends('layouts.app')

@section('breadcrumb')
    @include('partials.breadcrumb', ['links' => ['Menage', 'Users', 'Trashed']])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="mb-4">{{ __('Closed accounts') }}</h3>

                    @if (count($users) > 0)
                        <div class="table-responsive">
                            <table class="table border mb-0">
                                <thead class="table-light fw-semibold">
                                    <tr class="align-middle">
                                        <th class="text-center">
                                            <i class="icon fa fa-user"></i>
                                        </th>
                                        <th>User</th>
                                        <th class="text-center">Country</th>
                                        <th>Email</th>
                                        <th class="text-center">Payment Method</th>
                                        <th>Activity</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="align-middle">
                                            <td class="text-center">
                                                <div class="avatar avatar-md">
                                                    <x-avatar :user="$user"></x-avatar>
                                                    <span class="avatar-status bg-danger"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div>{{ $user->name }}</div>
                                                <div class="small text-medium-emphasis">
                                                    Registered: {{ $user->created_at->diffForHumans() }}
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <span class="fw-lighter" title="Kosovo">XK</span>
                                            </td>
                                            <td>
                                                <span class="fw-lighter" title="Kosovo">{{ $user->email }}</span>
                                            </td>
                                            <td class="text-center">
                                                <i class="icon fa fa-credit-card"></i>
                                                <i class="icon fa fa-credit-card-alt"></i>
                                            </td>
                                            <td>
                                                <div class="small text-medium-emphasis"><span
                                                        class="text-danger">Closed</span></div>
                                                <div class="fw-semibold">{{ $user->deleted_at->diffForHumans() }}</div>
                                            </td>
                                            <td>
                                                @canany(['restore', 'forceDelete'], $user)
                                                    <div class="dropdown">
                                                        <button class="btn btn-transparent p-0" type="button"
                                                            data-coreui-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="icon fa fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                                            @can('restore', $user)
                                                                <a class="dropdown-item" href="#"
                                                                    onclick="event.preventDefault(); return confirm('Are you sure you want to take this action?') ? document.getElementById('restore-user-{{ $user->id }}-form').submit() : false;">Restore</a>
                                                                <form id="restore-user-{{ $user->id }}-form"
                                                                    action="{{ route('menage.users.restore', $user->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('PUT')
                                                                </form>
                                                            @endcan

                                                            @can('forceDelete', $user)
                                                                <a class="dropdown-item text-danger" href="#"
                                                                    onclick="event.preventDefault(); return confirm('Are you sure you want to take this action?') ? document.getElementById('delete-user-{{ $user->id }}-form').submit() : false;">Delete
                                                                    permanently</a>
                                                                <form id="delete-user-{{ $user->id }}-form"
                                                                    action="{{ route('menage.users.delete', $user->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            @endcan
                                                        </div>
                                                    </div>
                                                @endcanany
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="lead text-center"> No closed accounts yet! </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
