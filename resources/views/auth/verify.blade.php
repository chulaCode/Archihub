@extends('layouts.main')

@section('content')

<div class="unit-5 overlay mb-5" style="background-image:url('{{asset('img/hero-1.png')}}');">
        <div class="container text-center">
            <h2 class="mb-0">{{__('Registration')}}</h2>
            <h3 class="mb-0 unit-6"><a href="/">{{__('home')}}</a> <span class="ml-4"style="color: #f9cc41;">{{__('verify email')}}</span></h3></div>
      </div>
    </div>

  </div>
</div>
<div class="container mb-5" style="background:#262533">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background:#312f44">
                <div class="card-header text-white">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body text-white">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
