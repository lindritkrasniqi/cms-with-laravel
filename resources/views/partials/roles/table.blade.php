<div class="table-responsive">
    <table class="table border mb-0">
        <thead class="table-light fw-semibold">
            <tr class="align-middle">
                <th> </th>
                <th>Role</th>
                <th class="text-center">Users under role</th>
                <th>Activity</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr class="align-middle">
                    <td class="text-center">
                        <div class="avatar avatar-md">
                            <i class="icon fa fa-shield"></i>
                            <span class="avatar-status bg-success"></span>
                        </div>
                    </td>
                    <td>
                        <div class="text-capitalize">{{ $role->role }}</div>
                        <div class="small text-medium-emphasis">Registered: {{ $role->created_at->diffForHumans() }}
                        </div>
                    </td>
                    <td class="text-center">
                        <span class="fw-lighter"
                            title="{{ __($role->users_count . ' user under ' . $role->role . ' role.') }}">{{ $role->users_count }}</span>
                    </td>

                    <td>
                        <div class="small text-medium-emphasis">Last update</div>
                        <div class="fw-semibold small">{{ $role->updated_at->diffForHumans() }}</div>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="icon fa fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" style="">
                                @can('view', $role)
                                    <a class="dropdown-item"
                                        href="{{ route('menage.roles.show', [$role->id]) }}">Info</a>
                                @endcan

                                @can('update', $role)
                                    <a class="dropdown-item"
                                        href="{{ route('menage.roles.edit', [$role->id]) }}">Edit</a>
                                @endcan

                                @can('delete', $role)
                                    <a class="dropdown-item text-danger" href="#"
                                        onclick="event.preventDefault(); return confirm(`Are you sure you want to take this action?`) ? document.getElementById('delete-role-{{$role->id}}-form').submit(): false;">Delete</a>
                                    <form id="delete-role-{{$role->id}}-form" action="{{ route('menage.roles.destroy', $role->id) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endcan
                            </div>
                        </div>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
</div>
