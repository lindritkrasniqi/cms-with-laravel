@extends('layouts.app')

@section('breadcrumb')
    @include('partials.breadcrumb', ['links' => ["Storage", 'Add new file']])
@endsection


@section('content')
    <div class="row mb-4">
        <div class="card rounded-0">
            <div class="card-body">
                <div class="row">
                    Add new files form
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table border mb-0">
                        <thead class="table-light fw-semibold">
                            <tr class="align-middle">
                                <th> </th>
                                <th>File name</th>
                                <th class="text-center">Extension</th>
                                <th>Size</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="align-middle">
                                <td class="text-center">
                                    <div class="avatar avatar-md">
                                        <i class="icon fa fa-shield"></i>
                                        <span class="avatar-status bg-success"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-capitalize">Name</div>
                                    <div class="small text-medium-emphasis">Registered: today
                                    </div>
                                </td>
                                <td class="text-center">
                                    <span class="fw-lighter text-uppercase" title="">image/jpeg</span>
                                </td>
                                <td>
                                    <div class="small text-medium-emphasis">Last update</div>
                                    <div class="fw-semibold small">2 minutes ago</div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="icon fa fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                            <a class="dropdown-item" href="#">Info</a>

                                            <a class="dropdown-item" href="#">Edit</a>

                                            <a class="dropdown-item text-danger" href="#"
                                                onclick="event.preventDefault(); return confirm(`Are you sure you want to take this action?`)">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
