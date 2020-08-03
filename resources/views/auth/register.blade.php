@extends('layouts.main')

@section('content')

<div class="unit-5 overlay mb-5" style="background-image:url('{{asset('img/hero-1.png')}}');">
        <div class="container text-center">
            <h2 class="mb-0">{{__('Registration')}}</h2>
            <h3 class="mb-0 unit-6"><a href="{{ route('register') }}">{{__('Architect')}}</a> <button class="btn  ml-3 text-dark font-weight-bold" 
            data-toggle="modal" data-target="#agency" style=" font-size:16px;border-color:#312f44; background: #f9cc41; "> {{ __('Agency') }}</button></h3>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="container">
    <div class="row mb-5">
         <div class="col-lg-8 col-sm-12 mb-2" style="background:#312f44">
            
         <form method="POST" action="{{route('register')}}" class="my-3">
                        @csrf

                        <input type="hidden" value="architect" name="user_type">

                        <div class="form-group row">
                          <div class="col-md-12"> {{ __('Name') }}</div>

                            <div class="col-md-12">
                                <input id="name" type="text" placeholder="{{ __('Name') }}"class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

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
                                <input id="username" type="text" placeholder="{{ __('Username') }}"class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" 
                                name="username" value="{{ old('username') }}" required autofocus>

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
                                <input id="email" type="email" placeholder="{{ __('Email') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
                  <input type="submit" value="{{ __('Register as Architect') }}" class="btn btn-primary  mt-3 py-2 px-5">
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
<!-- register modal for agencies-->
<div class="modal" id="agency" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content " style="background:#312f44">
    <form method="POST" action="{{route('post.agencyNames')}}" class="">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class=" mb-2" >
            
            <form method="POST" action="{{route('post.agencyNames')}}" class="my-3">
                           @csrf
   
                           <input type="hidden" value="architect" name="user_type">
   
                           <div class="form-group row ">
                             <div class="col-md-12"> {{ __('Name') }} </div>
   
                               <div class="col-md-12">
                                <table class="w-100" id="dynamic_field">
                                   <tr><td>
                                      <input id="name" type="text" placeholder="{{ __('Staff Name') }}"
                                      class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name[]" 
                                      value="{{ old('name[]') }}" required autofocus>
                                      @if ($errors->has('name'))
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $errors->first('name') }}</strong>
                                       </span>
                                      @endif
                                    </td></tr>
                                   <tr><td>
                                   <div class="form-group row">
                                        <div class="col-md-12"> {{ __('Email') }}</div>

                                            <div class="col-md-12">
                                                <input id="email" type="email" placeholder="{{ __('Agency Email') }}" 
                                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email[]" value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                     </td>
                                   <td>
                                      <button type="button" name="add" class="btn btn float-right" id="add">
                                          <span><i class="fas fa-user-plus fa-2x"></i></span></button>
                                   </td>
                                   </tr>
                               </table>
                               </div>
                         </div>
               </form>
             </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
          </div>
     </form>
    </div>
  </div>
</div>
@endsection
