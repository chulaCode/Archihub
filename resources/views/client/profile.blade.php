@extends('layouts.app')

    @include('../partials.pagehead')
    <link rel="stylesheet" href="{{asset('css/radio.css')}}">
@section('content')
<!-- Start post-content Area -->
<section class="post-content-area" style="margin-top:-10px">
		<div class="container">
			<div class="row">

				<div class="col-lg-11 posts-list">
					<div class="single-post row">
                      
					   <div class="col-md-3 meta-details" style="margin-top:-15px">
                           <div class="wrapper">
                                <div class="pulse"> <i class="fa fa-plus"></i> </div>
                            </div>
			
							<div class="user-details row">
								<p class="user-name col-lg-12 col-md-12 col-6"><a href="{{route('architect.index')}}">Your profile</a> <span class="lnr lnr-user"></span></p>
                                <p class="user-name col-lg-12 col-md-12 col-6"><a href="{{route('client.index')}}">My drafts</a> <span class="lnr lnr-enter"></span></p>
                                <p class="date col-lg-12 col-md-12 col-6"><a href="{{route('profile.show')}}">View profile as client</a> <span class="lnr lnr-eye"></span></p>
  
								
                            </div>
                        </div>
                        <!--row 9-->
                        <div class="col-md-9 sidebar-widgets">
                            <div class="show"></div>
                            <div id="errMsg"></div>
                            @if(Session::has('message'))
                                <div class="alert alert-success text-center">
                                {{Session::get('message')}}
                                <button type="button" class="close" 
                                data-dismiss="alert">&times;</button>
                                </div>
                            @endif
                            @if(isset($errors)&&count($errors)>0)
                                    <div class="alert alert-danger text-center">
                                    <button type="button" class="close" 
                                data-dismiss="alert">&times;</button>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                    
                                    </div>
                                @endif
                            @if(Session::has('status'))
                                <div class="alert alert-danger text-center">
                                {{Session::get('status')}}
                                <button type="button" class="close" 
                                data-dismiss="alert">&times;</button>
                                </div>
                            @endif
                            <div class="widget-wrap">
                                <div class="single-sidebar-widget search-widget" >
                                    <!--<form class="search-form" action="#">
                                        <input placeholder="Search Posts" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>-->

                                  
                                    <h3 class="text-white" style="margin-top:-25px;margin-bottom:-15px">My profile</h3>
                                </div>
    
                                <div class="single-sidebar-widget user-info-widget">
                
                                  <div class="row">
                                        <div class="col-md-7">
                                            @if(empty(Auth::user()->profile->avatar))
                                            <img src="{{asset('avatar/avatar3.png')}}" alt="" style="margin-top:-25px" width="50%">  
                                            @else
                                            <img src="{{asset('uploads/avatar/')}}/{{Auth::user()->profile->avatar}}" 
                                            style="margin-top:-25px" alt="" width="50%" class="rounded-circle">    
                                            @endif
                                    
                                            <a href="#"><h4 style="margin-top:-3px">{{Auth::user()->username}}</h4></a>
                                            <p>
                                            @if(empty(Auth::user()->profile->job_field))
                                                Please add your specific field 
                                            @else
                                            {{Auth::user()->profile->job_field}}
                                            @endif
                                            </p>
                                        
                                        </div>
                                        <form action="{{route('post.avatar')}}" method="post" class="form-contact"  enctype="multipart/form-data">
                                        @csrf
                                        <div classs="col-md-5 mx-auto">
                                            <div class="form-group">
                                                <input class="form-control" name="avatar" type="file" placeholder="Enter your name" required>
                                                @if($errors->has('avatar'))
                                                    <div class="error" style="color:red">
                                                    {{$errors->first('avatar')}}</div>
                                                @endif
                                            </div>   
                                            <div class="form-group text-center text-md-right">
                                                <button type="submit" class="btn active btn--leftBorder">Change image</button>
                                            </div> 
                                        </div>
                                        
                                        </form>
                                   </div>
                                  
                                </div>
                                 
                                <div class="single-sidebar-widget popular-post-widget">
                                    <button type="button" class="profile-btn btn btn-5 btn-lg btn-block" 
                                    data-toggle="modal" data-target="#profile">Edit profile</button>

                                </div>
                          </div>
                          <!--personal detail-->
                          <div class="widget-wrap mt-5">
                                <div class="single-sidebar-widget search-widget" >
                                    <h3 class="text-white" style="margin-top:-25px;margin-bottom:-15px">Personal details</h3>
                                </div>
                                 <div class="single-sidebar-widget user-info-widget">
                                   
                                    <div class="row">
                                        <div class="media contact-info">
                                            <span class="contact-info__icon"><i class="lnr lnr-home"></i></span>
                                            <div class="media-body">
                                           
                                            @if(empty(Auth::user()->client->address))
                                               <h3>
                                               Please add your address
                                               </h3>
                                               <p>Please update address</p>
                                            @else
                                            <h3>
                                              {{Auth::user()->client->address}}
                                            </h3>
                                            <p>{{Auth::user()->client->state}}</p>
                                             
                                            @endif
                                           
                                            </div>
                                        </div>
                                        <div class="media contact-info">
                                            <span class="contact-info__icon"><i class="lnr lnr-phone-handset"></i></span>
                                            <div class="media-body">
                                              @if(empty(Auth::user()->client->phone))
                                               <h3>
                                               Please add your phone number
                                               </h3>
                                               <p>Please update number</p>
                                                @else
                                                <h3>
                                                {{Auth::user()->client->phone}}
                                                </h3> 
                                                <p>You can change your number</p>
                                                @endif
                                            </div>
                                           
                                        </div>
                                        <div class="media contact-info">
                                            <span class="contact-info__icon"><i class="lnr lnr-envelope ml-2"></i></span>
                                            <div class="media-body">
                                            <h3><a href="mailto:support@colorlib.com">{{Auth::user()->email}}</a></h3>
                                            <p>Your email can't be changed!</p>
                                            </div>
                                        </div>

                                       
                                    </div>

                                    <form action="{{route('post.personal')}}" class="form-contact"  method="post">
                                      @csrf
                                      <div class="form-group">
                                        @if(empty(Auth::user()->client->phone))
                                         <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                            name="phone" value="{{ old('phone') }}" placeholder="Enter your phone number" required>
                                            @if($errors->has('phone'))
                                                <div class="error" style="color:red">
                                                {{$errors->first('phone')}}</div>
                                            @endif
                                        @else
                                        <input type="number" class="form-control" 
                                            name="phone"   value="{{Auth::user()->client->phone}}" required>
                                            @if($errors->has('phone'))
                                                <div class="error" style="color:red">
                                                {{$errors->first('phone')}}</div>
                                            @endif

                                        @endif
                                        </div>
                                        <div class="form-group">
                                        @if(empty(Auth::user()->client->address))
                                         <input type="text" class="form-control" 
                                            name="address" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror"
                                            placeholder="Enter your address" required>
                                            @if($errors->has('address'))
                                                <div class="error" style="color:red">
                                                {{$errors->first('address')}}</div>
                                            @endif
                                        @else
                                        <input type="text" class="form-control" 
                                            name="address"   value="{{Auth::user()->client->address}}" required>
                                            @if($errors->has('address'))
                                                <div class="error" style="color:red">
                                                {{$errors->first('address')}}</div>
                                            @endif

                            
                                        @endif
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="state">
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

                                        
                                        <div class="form-group text-center text-md-right">
                                            <button type="submit" class="btn active btn--leftBorder">Update</button>
                                        </div> 
                                    </form>
                                </div>
                                <div class="single-sidebar-widget popular-post-widget">
                                </div>   
                          </div>
                          <!--password detail-->
                          <div class="widget-wrap mt-5">
                                <div class="single-sidebar-widget search-widget" >
                                    <h3 class="text-white" style="margin-top:-25px;margin-bottom:-15px">Change password</h3>
                                </div>
                                <form action="{{route('post.change')}}" class="form-contact" method="post">
                                @csrf
                                   <div class="single-sidebar-widget user-info-widget">
                                        <div class="form-group">
                                        <input class="form-control" name="email" type="email" placeholder="Enter your email" required>
                                        </div>
                                        <div class="form-group">
                                        <input class="form-control" name="password" type="password" placeholder="Enter new password" required>
                                        </div>
                                        <div class="form-group text-center text-md-right">
                                            <button type="submit" class="btn active btn--leftBorder">Update password</button>
                                        </div> 
                                    </div>
                                    <div class="single-sidebar-widget popular-post-widget">
                                       
                                    </div>
                                </form>
                          </div>

                        
                     </div>	
               </div>
            </div>

        </div>
	</div>
    <!-- End post-content Area -->
    
</section>

<!-- profile modal-->
<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: #f9cc41">
        <div class="modal-header" style="background: #f9cc41">
            <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('post.profile')}}" method="POST" enctype="multipart/form-data">@csrf
           
            <div class="modal-body bg-dark">
                    <div class="modal-body">

                        <div class="form-group row">
                            <label for="username" class="col-md-4 font-weight-bold text-md-left">{{ __('Change Username') }}</label>

                            <div class="col-md-12">
                                <input id="username" type="text" 
                                class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" 
                                value="{{Auth::user()->username}}" name="username" required>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jobField" class="col-md-12 font-weight-bold text-md-left">{{ __('Change Your specific field') }}</label>

                            <div class="col-md-12">   
                                @if(!empty(Auth::user()->profile->job_field))
                                    <input id="jobField" type="text" 
                                    class="form-control{{ $errors->has('jobField') ? ' is-invalid' : '' }}"  
                                    value="{{Auth::user()->profile->job_field}}" name="job_field" required>
                                @else
                                    <input id="jobField" type="text" 
                                    class="form-control{{ $errors->has('jobField') ? ' is-invalid' : '' }}"  name="job_field" required>
                            
                                @endif
                                @if ($errors->has('jobField'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jobField') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                            <label class="font-weight-bold" for="message">Change bio</label>

                            @if(!empty(Auth::user()->profile->bio))
                            <textarea name="bio" id="bio" cols="30" rows="5" class="form-control" placeholder="Enter your bio">{{Auth::user()->profile->bio}}"</textarea>
                            @else
                            <textarea name="bio" id="bio" cols="30" rows="5" class="form-control" placeholder="Enter your bio"></textarea>
                        @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="background: #f9cc41">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
           </form>
        </div>
     </div>
</div>
</div>

@endsection
