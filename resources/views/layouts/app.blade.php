<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script defer src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
        $( "#datepicker" ).datepicker();
        } );
    </script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  text-dark shadow-sm"style="background:#f9cc41">
            <div class="container">
                <a class="navbar-brand ml-lg-5" href="{{ url('/') }}">
                    <h3>{{ config('app.name', 'Laravel') }}</h3>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->user_type=='client')
                                        <a class="dropdown-item" href="{{route('profile.search')}}">
                                        My hire
                                        </a>

                                        <a class="dropdown-item" href="">
                                          talents
                                        </a>
                                        <a class="dropdown-item" href="{{route('applications')}}">
                                          Applications
                                        </a>
                                    @else
                                       <a class="dropdown-item" href="{{route('architect.jobs')}}">
                                            Saved Jobs
                                        </a>

                                      
                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- personal modal-->
        <div class="modal fade" id="personal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Personal info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('post.personal')}}" method="POST" enctype="multipart/form-data">@csrf
                        <div class="modal-body">

                               <input type="hidden" name="id" value="">
                            
                                <div class="form-group row">
                                    <label for="address" class="col-md-12 font-weight-bold text-md-left">{{ __('Change Address') }}</label>

                                    <div class="col-md-12">
                                        <input id="address" type="text" 
                                        class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" required>

                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jobField" class="col-md-12 font-weight-bold text-md-left">{{ __('Change phone') }}</label>

                                    <div class="col-md-12">
                                        <input id="phone" type="text" 
                                        class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" required>

                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save changes</button>
                        </div>
                    </form>
              </div>
            
            </div>
          </div>
        </div>


        <!-- image modal-->
        <div class="modal fade" id="images_upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content" style="background: #f9cc41">
            <div class="modal-header" style="background: #f9cc41">
                <h5 class="modal-title" id="exampleModalLabel">Add images</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-dark">
              <form id="form" class="form-contact" method="post" action="{{route('post.image')}}"
                enctype="multipart/form-data">@csrf
                
                    <div class="single-sidebar-widget user-info-widget">    
                        <div class=" mb-3 input-group control-group initial-add-more">
                            <input type="file" name="image[]" class="form-control"
                            id="image">
                            <div class=input-group-btn>
                                <button class="btn btn-w btn-add-more" type="button" style="background:#f9cc41">Add</button>
                            </div>
                        </div>
                        <div class="copy " style="display:none">
                            <div id="input-file" class="input-group control-group add-more mb-3">
                                <input type="file" name="image[]" class="form-control"
                                id="image">
                                <div class=input-group-btn>
                                    <button class="btn btn-danger remove" type="button">
                                    Remove</button>
                                </div>

                            </div>
                        </div>
                    </div>
                
                    <div class="modal-footer" style="background: #f9cc41">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </form>
                
                </div>
            </div>
          </div>
        </div>

   

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('../partials.footer2')
   
</body>
</html>
