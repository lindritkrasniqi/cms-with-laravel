@extends('layouts.app')

@section('breadcrumb')
    @include('partials.breadcrumb', ['title' => 'Account', 'subtitle' => 'Lock account'])
@endsection

@section('content')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('account.lock') }}" method="POST">
                        @csrf
                        <h1>{{ __('Account Lock') }}</h1>
                        <p class="text-medium-emphasis">{{ __('Your personal data') }}</p>

                        @if (session('message'))
                            <div class="alert alert-success">{{ session('message') }}</div>
                        @endif

                        <button class="btn btn-block btn-outline-danger" type="submit">
                            {{ __('Lock your account') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
