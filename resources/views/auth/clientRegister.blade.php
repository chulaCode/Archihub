@extends('layouts.main')

@section('content')

<div class="unit-5 overlay mb-5" style="background-image:url('{{asset('img/hero-1.png')}}');">
        <div class="container text-center">
            <h2 class="mb-0">{{__(' Client Registration')}}</h2>
            <h4 class="mb-0 unit-6"><a href="/">{{__('Home')}}</a>&nbsp;&nbsp;><span class="ml-2" style="color:#f9cc41">{{__('Registration')}}</span></h4>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="container">
    <div class="row mb-5">
         <div class="col-lg-8 col-sm-12 mb-2" style="background:#312f44">
             @if (session('status'))
                <div class="alert alert-info">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
             @endif
         <form method="POST" action="{{ route('post.client') }}" class="my-3">
                        @csrf

                        <input type="hidden" value="client" name="user_type">

                        <div class="form-group row">
                          <div class="col-md-12"> {{ __('Full Name') }}</div>

                            <div class="col-md-12">
                                <input id="name" type="text" placeholder="{{ __('Full Name') }}"class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-12"> {{ __('User Name') }}</div>

                            <div class="col-md-12">
                                <input id="username" type="text" placeholder="{{ __('User Name') }}"class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
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
                          <div class="col-md-12"> {{ __('Phone') }}</div>

                            <div class="col-md-12">
                                <input id="phone" type="text" placeholder="{{ __('Enter phone number') }}"class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" 
                                name="phone" value="{{ old('phone') }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-12"> {{ __('Address') }}</div>

                            <div class="col-md-12">
                                <input id="address" type="text" placeholder="{{ __('Enter Adddress') }}"class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-md-12"> {{ __('State') }}</div>
                             <div class="col-md-12">
                                <select class="form-control" id="" name="state">
                                   <option selected style="font-size:1.3rem">Select state</option>
                                    <option value="Abuja">Abuja</option>
                                    <option value="Abia">Abia</option>
                                    <option value="Anambra">Anambra</option>
                                    <option value="Akwa ibom">Akwa ibom</option>
                                    <option value="Adamawa">Adamawa</option>
                                    <option value="Bayelsa">Bayelsa</option>
                                    <option value="Bauchi">Bauchi</option>
                                    <option value="Benue">Benue</option>
                                    <option value="Borno">Borno</option>
                                    <option value="Cross Rivers">Cross Rivers</option>
                                    <option value="Delta">Delta</option>
                                    <option value="Ebonyi">Ebonyi</option>
                                    <option value="Edo">Edo</option>
                                    <option value="Ekiti">Ekiti</option>
                                    <option value="Enugu">Enugu</option>
                                    <option value="Gombe">Gombe</option>
                                    <option value="Imo">Imo</option>
                                    <option value="Jigawa">Jigawa</option>
                                    <option value="Kaduna">Kaduna</option>
                                    <option value="Kano">Kano</option>
                                    <option value="Katsina">Katsina</option>
                                    <option value="Kebbi">Kebbi</option>
                                    <option value="Kogi">Kogi</option>
                                    <option value="Kwara">Kwara</option>
                                    <option value="Lagos">Lagos</option>
                                    <option value="Nasarawa">Nasarawa</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Ogun">Ogun</option>
                                    <option value="Osun">Osun</option>
                                    <option value="Ondo">Ondo</option>
                                    <option value="Oyo">Oyo</option>
                                    <option value="Plateau">Plateau</option>
                                    <option value="Rivers">Rivers</option>
                                    <option value="Sokoto">Sokoto</option>
                                    <option value="Taraba">Taraba</option>
                                    <option value="Yobe">Yobe</option>
                                    <option value="Zamfara">Zamfara</option>
                                  
                                </select>
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
@endsection
