@extends('layouts.default')

@section('content')
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mb-4 mx-4">
                        <div class="card-body p-4">

                            <form action="{{ route('verification.resend') }}" method="POST">
                                @csrf
                                <h3>{{ __('Verify your email address') }}</h3>

                                <p class="text-medium-emphasis">
                                    {{ __('Before proceeding, please check your email for a verification link.') }}
                                    {{ __('If you did not receive the email') }},

                                    <button class="btn btn-link p-0 m-0 align-baseline" type="submit">
                                        {{ __('click here to request another') }}
                                    </button>.
                                </p>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
