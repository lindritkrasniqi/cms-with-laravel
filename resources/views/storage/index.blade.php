@extends('layouts.app')

@section('breadcrumb')
    @include('partials.breadcrumb', ['links' => ["Storage", "View all"]])
@endsection


@section('content')
    <div class="col mb-4">
        <div class="card rounded-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="d-flex">
                            <select class="form-multi-select form-select w-auto me-3">
                                <option value="0">Angular</option>
                                <option value="1">Bootstrap</option>
                                <option value="2">React.js</option>
                                <option value="3" selected>Vue.js</option>
                                <optgroup label="backend">
                                    <option value="4">Django</option>
                                    <option value="5">Laravel</option>
                                    <option value="6">Node.js</option>
                                </optgroup>
                            </select>

                            <select class="form-multi-select form-select w-auto">
                                <option value="0">Angular</option>
                                <option value="1">Bootstrap</option>
                                <option value="2">React.js</option>
                                <option value="3">Vue.js</option>
                                <optgroup label="backend">
                                    <option value="4">Django</option>
                                    <option value="5">Laravel</option>
                                    <option value="6">Node.js</option>
                                </optgroup>
                            </select>

                            <button class="btn btn-primary rounded-0 w-auto mx-3">Bulk select</button>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3 mt-md-0">
                        <input type="text" class="form-control rounded-0" id="search" name="search" placeholder="Search...">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-cols-3 row-cols-md-6 g-4">
        @for ($i = 0; $i < 10; $i++)
            <div class="col">
                <div class="card bg-dark text-white pointer">
                    <img src="https://i.pravatar.cc/150?img={{ $i }}" class="card-img" alt="">
                    <div class="card-img-overlay">
                        <div class="card-title">
                            dome
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
@endsection
