@extends('layouts.app')

@section('breadcrumb')
    @include('partials.breadcrumb', ['links' => ['Menage', 'Users']])
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h3>{{ __('Users menagment') }}</h3>
                    {{-- <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-6">
                                    <div class="border-start border-start-4 border-start-info px-3 mb-3"><small
                                            class="text-medium-emphasis">New Clients</small>
                                        <div class="fs-5 fw-semibold">9,123</div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="border-start border-start-4 border-start-danger px-3 mb-3"><small
                                            class="text-medium-emphasis">Recuring Clients</small>
                                        <div class="fs-5 fw-semibold">22,643</div>
                                    </div>
                                </div>

                            </div>

                            <hr class="mt-0">
                            <div class="progress-group mb-4">
                                <div class="progress-group-prepend"><span class="text-medium-emphasis small">Monday</span>
                                </div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 34%"
                                            aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 78%"
                                            aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-group mb-4">
                                <div class="progress-group-prepend"><span class="text-medium-emphasis small">Tuesday</span>
                                </div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 56%"
                                            aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 94%"
                                            aria-valuenow="94" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-group mb-4">
                                <div class="progress-group-prepend"><span
                                        class="text-medium-emphasis small">Wednesday</span></div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 12%"
                                            aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 67%"
                                            aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-group mb-4">
                                <div class="progress-group-prepend"><span class="text-medium-emphasis small">Thursday</span>
                                </div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 43%"
                                            aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 91%"
                                            aria-valuenow="91" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-group mb-4">
                                <div class="progress-group-prepend"><span class="text-medium-emphasis small">Friday</span>
                                </div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 22%"
                                            aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 73%"
                                            aria-valuenow="73" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-group mb-4">
                                <div class="progress-group-prepend"><span class="text-medium-emphasis small">Saturday</span>
                                </div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 53%"
                                            aria-valuenow="53" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 82%"
                                            aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-group mb-4">
                                <div class="progress-group-prepend"><span class="text-medium-emphasis small">Sunday</span>
                                </div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 9%"
                                            aria-valuenow="9" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 69%"
                                            aria-valuenow="69" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-6">
                                    <div class="border-start border-start-4 border-start-warning px-3 mb-3"><small
                                            class="text-medium-emphasis">Pageviews</small>
                                        <div class="fs-5 fw-semibold">78,623</div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="border-start border-start-4 border-start-success px-3 mb-3"><small
                                            class="text-medium-emphasis">Organic</small>
                                        <div class="fs-5 fw-semibold">49,123</div>
                                    </div>
                                </div>

                            </div>

                            <hr class="mt-0">
                            <div class="progress-group">
                                <div class="progress-group-header">
                                    <svg class="icon icon-lg me-2">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                    </svg>
                                    <div>Male</div>
                                    <div class="ms-auto fw-semibold">43%</div>
                                </div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 43%"
                                            aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-group mb-5">
                                <div class="progress-group-header">
                                    <svg class="icon icon-lg me-2">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user-female"></use>
                                    </svg>
                                    <div>Female</div>
                                    <div class="ms-auto fw-semibold">37%</div>
                                </div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 43%"
                                            aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-group">
                                <div class="progress-group-header">
                                    <svg class="icon icon-lg me-2">
                                        <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-google"></use>
                                    </svg>
                                    <div>Organic Search</div>
                                    <div class="ms-auto fw-semibold me-2">191.235</div>
                                    <div class="text-medium-emphasis small">(56%)</div>
                                </div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 56%"
                                            aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-group">
                                <div class="progress-group-header">
                                    <svg class="icon icon-lg me-2">
                                        <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-facebook-f"></use>
                                    </svg>
                                    <div>Facebook</div>
                                    <div class="ms-auto fw-semibold me-2">51.223</div>
                                    <div class="text-medium-emphasis small">(15%)</div>
                                </div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 15%"
                                            aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-group">
                                <div class="progress-group-header">
                                    <svg class="icon icon-lg me-2">
                                        <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-twitter"></use>
                                    </svg>
                                    <div>Twitter</div>
                                    <div class="ms-auto fw-semibold me-2">37.564</div>
                                    <div class="text-medium-emphasis small">(11%)</div>
                                </div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 11%"
                                            aria-valuenow="11" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-group">
                                <div class="progress-group-header">
                                    <svg class="icon icon-lg me-2">
                                        <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-linkedin"></use>
                                    </svg>
                                    <div>LinkedIn</div>
                                    <div class="ms-auto fw-semibold me-2">27.319</div>
                                    <div class="text-medium-emphasis small">(8%)</div>
                                </div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 8%"
                                            aria-valuenow="8" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> --}}
                    <br>
                    @if (count($users) == 0)
                        <div class="lead text-center"> No users yet! </div>
                    @else
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
                                                    <span class="avatar-status bg-success"></span>
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
                                                <span class="fw-lighter"
                                                    title="{{ $user->email }}">{{ $user->email }}</span>
                                            </td>
                                            <td class="text-center">
                                                <i class="icon fa fa-credit-card"></i>
                                                <i class="icon fa fa-credit-card-alt"></i>
                                            </td>
                                            <td>
                                                <div class="small text-medium-emphasis">Last update</div>
                                                <div class="fw-semibold">{{ $user->updated_at->diffForHumans() }}</div>
                                            </td>
                                            <td>
                                                @canany(['view', 'update', 'delete'], $user)
                                                    <div class="dropdown">
                                                        <button class="btn btn-transparent p-0" type="button"
                                                            data-coreui-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="icon fa fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                                            @can('view', $user)
                                                                <a class="dropdown-item"
                                                                    href="{{ route('menage.users.show', [$user->id]) }}">Info</a>
                                                            @endcan

                                                            @can('update', $user)
                                                                <a class="dropdown-item"
                                                                    href="{{ route('menage.users.edit', [$user->id]) }}">Edit</a>
                                                            @endcan

                                                            @can('delete', $user)
                                                                <a class="dropdown-item text-danger" href="#"
                                                                    onclick="event.preventDefault(); return confirm('Are you sure you want to take this action?') ? document.getElementById('delete-user-{{ $user->id }}-form').submit() : false;">Delete</a>
                                                                <form id="delete-user-{{ $user->id }}-form"
                                                                    action="{{ route('menage.users.destroy', $user->id) }}"
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
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
