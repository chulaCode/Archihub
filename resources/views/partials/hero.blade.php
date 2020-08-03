<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Archihub</title>
        <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300i,400,500" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('vendor/themify-icons/themify-icons.css') }}">
        <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="stylesheet" href="{{asset('vendor/owl-carousel/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('vendor/owl-carousel/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('vendor/bootstrap/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </head>
    <body>
       
        <div class="side_menu">
			<ul class="list menu_right">

            @if (Route::has('login'))
                
                    @auth
                    <li> 
                       <a href="{{ url('/home') }}">Home</a>
                    </li>
                       
                    @else
                    <li>
                      <a data-toggle="modal" data-target="#login2" style="cursor:pointer"><span >Login</span></a>
                    </li>

                        @if (Route::has('register'))
                           <li>
                             <a href="{{ route('register') }}">Architech  Sign Up</a>
                           </li> 
						   <li>
                             <a href="{{ route('client') }}">Client Sign Up</a>
                           </li> 
                        @endif
                    @endauth
                    <li>
					<a href="contact.html">Contact</a>
				</li>
                </div>
            @endif

			
			</ul>
	</div>
	<!--================End Offcanvus Menu Area =================-->

<!-- login Modal -->
<div class="modal fade" id="login2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width: 520px;margin: 0px 5px 5px 5px auto; padding-left:20px">
    <div class="modal-content" style=" background:#312f44;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> {{__('Login')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('login') }}">
                        @csrf
             <div class="modal-body">
      
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label>

                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>

                   </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
        <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
        </button>
      </form>

      </div>
    </div>
  </div>
</div>
	<!--================Canvus Menu Area =================-->
	<div class="canvus_menu">
		<div class="container">
			<div class="float-right">
				<div class="toggle_icon" title="Menu Bar">
					<span></span>
				</div>
			</div>
		</div>
	</div>
	<!--================End Canvus Menu Area =================-->
  <header>
    <div class="hero">
      <a class="navbar-brand" href="/">
        <img src="../img/white.png" alt="">
      </a>
      <div class="owl-carousel owl-theme heroCarousel">  
        <div class="item">
          <div class="hero__slide">
          <div style="height: 30px;"></div>
