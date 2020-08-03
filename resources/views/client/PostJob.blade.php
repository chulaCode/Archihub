@extends('layouts.app')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300i,400,500" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('vendor/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="{{asset('vendor/owl-carousel/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/job.css')}}">
    <script src="{{asset('js/job.js') }}" defer></script>
@section('content')
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-8 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3" style="background:#3c3b48">
            <div class="single-sidebar-widget search-widget" >
                                              
                <h3 class="text-white my-2" style="margin-bottom:-15px">POST YOUR JOB</h3>
            </div>
               
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform" action="" method="post">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Get started</strong></li>
                                <li id="personal"><strong>Description</strong></li>
                                <li id="payment"><strong>Detail</strong></li>
                                <li id="budget"><strong>Budget</strong></li>
                                <li id="confirm"><strong>Confirm</strong></li>
                            </ul> <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card">
                                  <div class="form-group row">
                                     <div class="col-md-12"> <h5>{{ __('Enter the name of your job post') }}</h5></div>

                                        <div class="col-md-12">
                                            <input id="name" type="text" placeholder="{{ __('Enter job title') }}"class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                            name="name" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('username'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                          <div class="form-group">
                                               <div class="col-md-12"><h5> {{ __('Select Category') }}</h5></div>
                                                <select class="form-control" name="category">
                                                    <option selected style="font-size:1.3rem">Select Category</option>
                                                    <option value="urban">Urban Architecture</option>
                                                    <option value="Residential">Residential Architecture</option>
                                                    <option value="industrial">Industrial Architecture</option>
                                                    <option value="landscape">Landscape Architecture</option>
                                                    <option value="interior">Interior Architecture</option>
                                                    <option value="commercial ">Commercial Architecture</option>
                                                
                                                </select>
                                             </div>
                                        </div>
                                    </div>
                                </div> <input type="button" name="next" class="next action-button btn" value="Next Step" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <h4>A good description includes:</h4>
                                            <p><i class="fas fa-dot-circle mr-1"></i>What the deliverable is</p>
                                            <p><i class="fas fa-dot-circle mr-1"></i>Anything unique about the project, team, or your company</p>
                                        </div>

                                            <div class="col-md-12">
                                                <textarea id="desc" placeholder="{{ __('Enter description (minimum 50 character)') }}"class="form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}" 
                                                name="desc" value="{{ old('desc') }}" rows="5" cols="60" required autofocus></textarea>

                                                @if ($errors->has('desc'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('desc') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                       </div>
                                </div> <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> <input type="button" name="next" class="next action-button" value="Next Step" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12"><h5>{{ __('Select expertise level') }}</h5></div>
                                            <select class="form-control" name="expertise">
                                                <option selected style="font-size:1.3rem">Select expertise level</option>
                                                <option value="entry">Entry Level</option>
                                                <option value="intermediate">Intermediate Level</option>
                                                <option value="expert">Expert Level</option>
                                            </select>
                                        </div>
                                    </div>
                                      <div class="col-md-12">
                                          <div class="form-group">
                                               <div class="col-md-12"><h5> {{ __('Select who should apply') }}</h5></div>
                                                    <div id="radiobtn">
                                                    <input type="radio" name="radio" id="radio1" class="radio" checked/>
                                                    <label for="radio1">Agency</label>
                                                    </div>

                                                    <div id="radiobtn">
                                                    <input type="radio" name="radio" id="radio2" class="radio"/>
                                                    <label for="radio2">Architect</label>
                                                    </div>
                                             </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-md-12"><h5>{{ __('Expected duration') }}</h5></div>
                                                <select class="form-control" name="expedrience">
                                                    <option selected style="font-size:1.3rem">Select expected duration</option>
                                                    <option value="entry">1 month</option>
                                                    <option value="intermediate">2 month</option>
                                                    <option value="expert">3 month</option>
                                                    <option value="expert">4 month</option>
                                                </select>
                                            </div>
                                       </div>
                                       
                                </div> <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> <input type="button" name="make_payment" class="next action-button" value="Next Step" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                  <div class="form-group row">
                                      <div class="col-md-12"> <h5>{{ __('Enter your budget ') }}</h5></div>

                                        <div class="col-md-12">
                                            <input id="salary" type="text" placeholder="{{ __('Enter your budget') }}"class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                            name="salary" value="{{ old('salary') }}" required autofocus>

                                            @if ($errors->has('salary'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('salary') }}</strong>
                                                </span>
                                            @endif
                                        </div>   
                                        <div class="col-md-12"> <h5>{{ __('Choose last date for application ') }}</h5></div>

                                            <div class="col-md-12">
                                                <input id="last_date" type="date" class="form-control{{ $errors->has('last_date') ? ' is-invalid' : '' }}" 
                                                name="last_date" required autofocus>

                                                @if ($errors->has('last_date'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('last_date') }}</strong>
                                                    </span>
                                                @endif
                                            </div>       
                                       </div>
                                    </div> <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> 
                                    <input type="button" name="make_payment" class="next action-button" value="Submit"/>

                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center text-white">Success !</h2> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                                    </div> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5>You Have Successfully Submited</h5>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection