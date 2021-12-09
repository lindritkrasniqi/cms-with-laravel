@extends('layouts.app')

@section('breadcrumb')
    @include('partials.breadcrumb', ['links' => ['Account', 'Lock account']])
@endsection

@section('content')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('account.lock') }}" id="lock-account-form" method="POST">
                        @csrf
                        @method('DELETE')

                        <h1>{{ __('Lock your account') }}</h1>

                        <p class="text-medium-emphasis">{{ __('Your personal data') }}</p>

                        <button class="btn btn-block btn-outline-danger" type="button"
                            onclick="event.preventDefault(); return confirm('Are you sure you want to lock your account?') ? document.getElementById('lock-account-form').submit() : false ;">
                            {{ __('Lock account') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
