@extends('layouts.main')

@section('content')

<div class="unit-5 overlay mb-5" style="background-image:url('{{asset('img/hero-1.png')}}');">
        <div class="container text-center">
            <h2 class="mb-0">{{__('Registration')}}</h2>
            <h3 class="mb-0 unit-6"><a href="{{ route('register') }}">{{__('Agency')}}</a>      </div>
      </div>
    </div>

  </div>
</div>

<div class="container">
    <div class="row mb-5">

         <div class="col-lg-8 col-sm-12 mb-2" style="background:#312f44">
              @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
             @endif
         <form method="POST" action="{{route('register')}}" class="my-3">
                        @csrf
                        <input type="hidden" value="agency" name="user_type">

                        <div class="form-group row ">
                          <div class="col-md-12"> {{ __('Agency Name') }} </div>

                            <div class="col-md-12">
                              <input id="name" type="text" placeholder="{{ __('Agency name') }}"class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-12"> {{ __('Username') }}</div>
                         
                            <div class="col-md-12">
                                <input id="name" type="text" placeholder="{{ __('Enter a username') }}"class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <div class="col-md-12"> {{ __('Email') }}</div>

                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="{{ __('Agency email') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                         <div class="col-md-12"> {{ __('Password') }}</div>

                           <div class="col-md-12">

                                <input id="password" type="password" placeholder=" {{ __('Password') }}" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12"> {{ __('Confirm Password') }}</div>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>


              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="{{ __('Register as Agency') }}" class="btn btn-primary  mt-3 py-2 px-5">
                </div>
              </div>

  
            </form>
          </div>
            <div class="col-lg-4  ">
                <div class="p-4 mb-3 " style="background:#312f44">
                    <h3 class="h5 text-black mb-3">{{ __('More Info') }}</h3>
                    <p>{{__('Once you create an account a verification link will be sent to your email.
                    Your password must be minimum of 5 character also ensure you use a strong password we suggest using 
                    character numbers and symbols and it should be what you can remember easily')}}</p>
                    <p><a  class="btn  mt-3 text-dark" style="border-color:#312f44; background: #f9cc41;right: -0.0rem; "> {{ __('Take Note') }}</a></p>
                 </div>
            </div>
    
        </div>
    </div>
</div>
@endsection
