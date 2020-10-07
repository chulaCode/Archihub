@extends('layouts.app')

    @include('../partials.pagehead')
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
                        <form id="msform" action="{{route('job.store')}}" method="post">
                              @csrf
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
                                            <input id="title" type="text" placeholder="{{ __('Enter job title') }}"class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                            name="title" value="{{ old('title') }}" required autofocus>

                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('title') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                          <div class="form-group">
                                               <div class="col-md-12"><h5> {{ __('Select Category') }}</h5></div>
                                                <select class="form-control" name="category">
                                                @foreach(App\categories::all() as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                @endforeach
                                                
                                                </select>
                                             </div>
                                        </div>
                                    </div>
                                </div> <input type="button" name="next" class="next action-button btn" value="Next Step"  id="next1" onclick="validate1(0)"  />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <h4>A good description includes:</h4>
                                            <p><i class="fas fa-dot-circle mr-1"></i>What the deliverable is</p>
                                            <p><i class="fas fa-dot-circle mr-1"></i>Anything unique about the project, team, or your company</p>
                                        </div>
                                        <span class="ml-3" id="count"></span>
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
                                </div> <input type="button" name="previous" class="prev action-button-previous" value="Previous" /> 
                                <input type="button" name="next" class="next action-button" value="Next Step"  id="next2" onclick="validate2(0)"/>
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12"><h5>{{ __('Select expertise level') }}</h5></div>
                                            <select class="form-control" name="experience">
                                                
                                                <option selected value="entry">Entry Level</option>
                                                <option value="intermediate">Intermediate Level</option>
                                                <option value="expert">Expert Level</option>
                                            </select>
                                        </div>
                                    </div>
                                      <div class="col-md-12">
                                          <div class="form-group">
                                               <div class="col-md-12"><h5> {{ __('Select who should apply') }}</h5></div>
                                                    <div id="radiobtn">
                                                    <input type="radio" name="preference" id="radio1" class="radio" value="Agency" checked/>
                                                    <label for="radio1">Agency</label>
                                                    </div>

                                                    <div id="radiobtn">
                                                    <input type="radio" name="preference" id="radio2" value="Architect" class="radio"/>
                                                    <label for="radio2">Architect</label>
                                                    </div>
                                             </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-md-12"><h5>{{ __('How long do you expect this project to last?') }}</h5></div>
                                                <select class="form-control" name="duration">
                                                   
                                                    <option  selected value="less than 1 month">less than 1 month</option>
                                                    <option value="1-2 month">1-2 month</option>
                                                    <option value="3-5 month">3 -5 month</option>
                                                    <option value="6-9 month">6-9 month</option>
                                                    <option value="above 10 month">above 10 month</option>
                                                </select>
                                            </div>
                                       </div>     
                                </div> <input type="button" name="previous" class="prev action-button-previous" value="Previous" /> 
                                <input type="button" name="make_payment" class="next action-button" value="Next Step" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                  <div class="form-group row">
                                      <div class="col-md-12"> <h5>{{ __('Enter your budget ') }}</h5></div>

                                        <div class="col-md-12">
                                            <input id="salary" type="number" placeholder="{{ __('Enter your budget') }}"class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
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
                                    </div> <input type="button" name="previous" class="prev action-button-previous" value="Previous" /> 
                                    <input type="button" name="make_payment" class="next action-button" value="confirm" id="next3" onclick="validate3(0)"/>

                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center text-white">Success !</h2> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                                    </div> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-12 text-center">
                                            <h5>You are done with filling the form you can submit now!</h5>
                                        </div>
                                        <button type="submit" name="submit_btn" class="next action-button btn-lg mt-3 ">Submit</button>

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
