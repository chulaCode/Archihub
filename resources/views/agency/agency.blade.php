@extends('layouts.app')
<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300i,400,500" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('vendor/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="{{asset('vendor/owl-carousel/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/radio.css')}}">
@section('content')
<!-- Start post-content Area -->
<section class="post-content-area" style="margin-top:-10px">
		<div class="container">
			<div class="row">

				<div class="col-lg-11 posts-list">
					<div class="single-post row">
                   
						<div class="col-md-3 meta-details">
			
							<div class="user-details row">
								<p class="user-name col-lg-12 col-md-12 col-6"><a href="{{route('agency.index')}}">Your profile</a> <span class="lnr lnr-user"></span></p>
								<p class="date col-lg-12 col-md-12 col-6"><a href="{{route('view.show')}}">View profile as client</a> <span class="lnr lnr-eye"></span></p>
                               
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
                                            <img src="{{asset('avatar/avatar3.png')}}" alt="" style="margin-top:-15px" width="50%" >  
                                            @else
                                            <img src="{{asset('uploads/avatar/')}}/{{Auth::user()->profile->avatar}}" 
                                            style="margin-top:-25px" alt="" width="50%" class="rounded-circle">    
                                            @endif
                                    
                                            <a href="#"><h4 style="margin-top:-1px">{{Auth::user()->username}}</h4></a>
                                            <p>
                                            @if(empty(Auth::user()->profile->job_field))
                                                Please add agency's specialization 
                                            @else
                                            {{Auth::user()->profile->job_field}}
                                            @endif
                                            </p>
                                        
                                        </div>
                                        <form action="{{route('Apost.avatar')}}" method="post" class="form-contact"  enctype="multipart/form-data">
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
                                   <p class="text-white">
                                    @if(empty(Auth::user()->profile->bio))
                                        Please add agency's bio by clicking the edit profile button
                                    @else
                                    {{Auth::user()->profile->bio}}
                                    @endif
                                    </p>
                                </div>
                                 
                                <div class="single-sidebar-widget popular-post-widget">
                                    <button type="button" class="profile-btn btn btn-5 btn-lg btn-block" 
                                    data-toggle="modal" data-target="#Aprofile">Edit profile</button>

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
                                           
                                            @if(empty(Auth::user()->profile->address))
                                               <h3>
                                               Please add agency's address
                                               </h3>
                                               <p>Please update address</p>
                                            @else
                                            <h3>
                                              {{Auth::user()->profile->address}}
                                            </h3>
                                            <p>{{Auth::user()->profile->state}}</p>
                                             
                                            @endif
                                           
                                            </div>
                                        </div>
                                        <div class="media contact-info">
                                            <span class="contact-info__icon"><i class="lnr lnr-phone-handset"></i></span>
                                            <div class="media-body">
                                              @if(empty(Auth::user()->profile->phone))
                                               <h3>
                                               Please add agency's phone number
                                               </h3>
                                               <p>Please update number</p>
                                                @else
                                                <h3>
                                                {{Auth::user()->profile->phone}}
                                                </h3> 
                                                <p>You can change your number</p>
                                                @endif
                                            </div>
                                           
                                        </div>
                                        <div class="media contact-info">
                                            <span class="contact-info__icon"><i class="lnr lnr-envelope ml-2"></i></span>
                                            <div class="media-body">
                                            <h3><a href="mailto:support@colorlib.com">{{Auth::user()->email}}</a></h3>
                                            <p>Email can't be changed!</p>
                                            </div>
                                        </div>

                                        <div class="media contact-info">
                                            <span class="contact-info__icon"><i class="lnr lnr-construction"></i></span>
                                            <div class="media-body">
                                              @if(empty(Auth::user()->profile->experience))
                                               <h3>
                                               Please add experience level
                                               </h3>
                                               <p>Work experience</p>
                                                @else
                                                <h3>
                                                {{Auth::user()->profile->experience}}
                                                </h3> 
                                                <p>Work experience</p>
                                                @endif
                                            </div>
                                           
                                        </div>
                                    
                                    </div>

                                    <form action="{{route('Apost.personal')}}" class="form-contact"  method="post">
                                      @csrf
                                      <div class="form-group">
                                        @if(empty(Auth::user()->profile->phone))
                                         <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                            name="phone" value="{{ old('phone') }}" placeholder="Enter your phone number" required>
                                            @if($errors->has('phone'))
                                                <div class="error" style="color:red">
                                                {{$errors->first('phone')}}</div>
                                            @endif
                                        @else
                                        <input type="number" class="form-control" 
                                            name="phone"   value="{{Auth::user()->profile->phone}}" required>
                                            @if($errors->has('phone'))
                                                <div class="error" style="color:red">
                                                {{$errors->first('phone')}}</div>
                                            @endif

                                        @endif
                                        </div>
                                        <div class="form-group">
                                        @if(empty(Auth::user()->profile->address))
                                         <input type="text" class="form-control" 
                                            name="address" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror"
                                            placeholder="Enter your address" required>
                                            @if($errors->has('address'))
                                                <div class="error" style="color:red">
                                                {{$errors->first('address')}}</div>
                                            @endif
                                        @else
                                        <input type="text" class="form-control" 
                                            name="address"   value="{{Auth::user()->profile->address}}" required>
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

                                        <div class="form-group">
                                            <select class="form-control" name="experience">
                                                <option selected style="font-size:1.3rem">Select work experience level</option>
                                                <option value="Entry Level">Entry Level</option>
                                                <option value="Intermediate Level">Intermediate Level</option>
                                                <option value="Expertise Level">Expertise Level</option>
                                            
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
                                <form action="{{route('Apost.change')}}" class="form-contact" method="post">
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

                           <!--My documents-->
                           <div class="widget-wrap mt-5">
                                <div class="single-sidebar-widget search-widget" >
                                    
                                    <h3 class="text-white" style="margin-top:-25px;margin-bottom:-15px">Agency documents</h3>
                                </div>
                                <ul>
                                    <li>
                                        <div class="single-sidebar-widget user-info-widget" style="margin-top:-1.8rem">
                                            
                                            <div class="media contact-info">
                                                    <div class="media-body">
                                                    <span class="contact-info__icon text-white" style="font-size:1.3rem">
                                                    <i class="lnr lnr-briefcase mr-4"></i> Agency NIA certificate</span>
                                                    @if(empty(Auth::user()->profile->certificate))
                                                      <p>Please upload your Agency's NIA certificate</p>
                                                    @else
                                                    
                                                    <p><a href="{{Storage::url(
                                                         Auth::user()->profile->certificate)}}"><i class="lnr lnr-download mr-2 text-white"></i>
                                                         <span class="text-white">NIA certificate</span></a></p>
                                                    @endif
                                                    <!--file section-->
                                                        <form action="{{route('Apost.certificate')}}" method="post" class="form-contact"  enctype="multipart/form-data">
                                                          @csrf
                                                                <div class="form-group">
                                                                <input class="form-control" name="certificate" type="file" placeholder="Enter your name" required>
                                                                </div>
                                                            
                                                            <div class="form-group text-center text-md-right">
                                                            <button type="submit" class="btn active btn--leftBorder">Update</button>
                                                            </div>
                                                        </form>
                                
                                                    <!-- end of file -->
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-sidebar-widget user-info-widget" style="margin-top:-3rem">
                                    
                                            <div class="media contact-info">
                                                    <div class="media-body">
                                                    <span class="contact-info__icon text-white" style="font-size:1.3rem">
                                                    <i class="lnr lnr-briefcase mr-4"></i> Company standard</span>
                                                    @if(empty(Auth::user()->profile->resume))
                                                      <p>Please upload company standard</p>
                                                    @else
                                                    <p><a href="{{Storage::url(
                                                         Auth::user()->profile->resume)}}"><i class="lnr lnr-download mr-2 text-white"></i>
                                                         <span class="text-white">Company standard</span></a></p>
                                                   @endif
                                                    <!--file section-->
                                                        <form action="{{route('Apost.resume')}}" method="post" class="form-contact"  enctype="multipart/form-data">
                                                            @csrf
                                                                <div class="form-group">
                                                                <input class="form-control" name="resume" type="file" placeholder="Enter your name" required>
                                                                </div>
                                                            
                                                            <div class="form-group text-center text-md-right">
                                                            <button type="submit" class="btn active btn--leftBorder">Update</button>
                                                            </div>
                                                        </form>
                                
                                                    <!-- end of file -->
                                            </div>
                                        </div>
                                    </li>
                                   
                                </ul>
                          </div>
                          <!--end of div for document--> 

                           <!--Images-->
                           <div class="widget-wrap mt-5">
                          
                                <div class="show"></div>
                                <div id="errMsg"></div>

                                <div class="single-sidebar-widget search-widget" >
                                    <h3 class="text-white" style="margin-top:-25px;margin-bottom:-15px">Images of your projects</h3>
                                </div>
                                <div class="row">
                                @if(empty($image))
                                   <h4 class="ml-5">No image uploaded yet</h4>
                                @else
                                    @foreach($image as $images)
                                       <div class="col-md-5 col-sm-10 mx-3 my-2" id="md-image">
                                            <a href="photo/{{$images->id}}" data-toggle="modal" data-target="#images{{$images->id}}">
                                                @if(empty($images->image))
                                            <h3>Please upload photos of your completed work.</h3>
                                                @else
                                                <img src="{{asset('uploads/'.$images->image)}}" class="img-thubnail" style="width:350px;height: 350px;">

                                                @endif
                                                <!--<a href="images/{{$images->id}}" class="centered"></a>-->
                                            </a>
                                        </div>
                                        <!-- image show-->
                                            <div class="modal fade" id="images{{$images->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document" style="max-width:600; max-height:600;margin:20px auto">
                                                    <form action="{{route('image.delete')}}" method="POST">
                                                        <div class="modal-content">
                                                            
                                                            <div class="modal-body" style="position:relative;padding:0px;">
                                                            
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:absolute;
                                                                right:-30px;top:0;z-index:999;font-size:2rem;font-weight: normal;color:#fff;opacity:1;">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>  
                                                                    <div>
                                                                    @if(!empty($images->image))
                                                                    <img src="{{asset('uploads/'.$images->image)}}" class="img-thubnail" style="width:600;height:600;">
                                                                    @else
                                                                    <p>no image</p>
                                                                    @endif
                                                                    </div>
                                                                <div class="" style="position:absolute;
                                                                right:-80px;top:560;z-index:999;font-size:2rem;font-weight: normal;color:#fff;opacity:1;">
                                                                <button type="button" class="btn btn-danger">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                </div>
                                    @endforeach
                                 @endif
                                 </div>
                                <div class="single-sidebar-widget popular-post-widget">
                                    <button type="submit" class="profile-btn btn btn-5 btn-lg btn-block" style=""
                                    data-toggle="modal" data-target="#Aimages_upload">
                                    Upload images</button>
                                </div>
                                   
                            </div>

                            <!--names-->
                           <div class="widget-wrap mt-5">
                          
                          <div class="show"></div>
                          <div id="errMsg"></div>

                          <div class="single-sidebar-widget search-widget" >
                              <h3 class="text-white" style="margin-top:-25px;margin-bottom:-15px">Staff Names</h3>
                          </div>
                          <div class="row">
                          @if(empty($names))
                             <h4 class="ml-5">Add staff names</h4>
                          @else
                              @foreach($names as $name)
                              <div class="item col-md-10 ml-md-5 ml-sm-3">
                              <table class="table table-striped">
                               
                                <tbody>
                                   <tr>
                                     <th scope="row" class="text-white">{{$name->id}}</th>
                                     <td class="text-white text-left">{{$name->name}}</td>
                                     <td>
                                        <button class="btn btn-success float-right" data-toggle="modal" data-target="#edit{{$name->id}}">Edit</button>
                                        <button class="btn btn-danger float-right mx-4" data-toggle="modal" data-target="#remove{{$name->id}}">Delete</button>
                                     </td>
                                    <tr>
                                   
                                </tbody>
                                </table>
                              </div> 
                                
                                  <!-- Modal -->
                                  <div class="modal fade" id="remove{{$name->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('Aimage.delete')}}" method="POST">@csrf
                                            <div class="modal-body">
                                              <input type="hidden" name="id" value="{{$name->id}}">
                                              Are you sure you want to delete?
                                            </div>
                                            <div class="modal-footer">
                                                  
                                                       
                                                        <button class="btn btn-danger" type="submit">Delete</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                     
                                            </div>
                                            </form>
                                    </div>
                                    </div>
                                </div>
                             <!--modal ends-->
                              <!--  edit Modal -->
                              <div class="modal fade" id="edit{{$name->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                              <form action="{{route('Aname.edit')}}" method="POST">@csrf
                                            
                                                  <div class="form-group row">
                                                       <label for="username" class="col-md-4 font-weight-bold text-md-left">{{ __('Change Staff name') }}</label>
                                                        <input type="hidden" name="id" value="{{$name->id}}">
                                                        <div class="col-md-12">
                                                            <input id="name" type="text" 
                                                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                                            value="{{$name->name}}" name="name" required>

                                                            @if ($errors->has('name'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('name') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                            
                                                    </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-success" type="submit">Save changes</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                             <!--modal ends-->
                              @endforeach
                           @endif
                           </div>
                          <div class="single-sidebar-widget popular-post-widget">
                              <button type="submit" class="profile-btn btn btn-5 btn-lg btn-block" style=""
                              data-toggle="modal" data-target="#names">
                              Add staff name</button>
                          </div>
                             
                      </div>
                        
                     </div>	
               </div>
            </div>

        </div>
	</div>
    <!-- End post-content Area -->
    
</section>


@endsection
 <!-- Add names modal-->
 <div class="modal fade" id="names" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Name</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form id="" class="form-contact" method="post" action="{{route('Apost.name')}}">@csrf
                
                    <div class="single-sidebar-widget user-info-widget">    
                        <div class="form-group row">
                                <label for="name_add" class="col-md-4 font-weight-bold text-md-left">{{ __('Add staff name') }}</label>

                                <div class="col-md-12">
                                    <input id="name" type="text" 
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                    name="name" required>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
                
                </div>
            </div>
          </div>
        </div>

        <!-- image modal-->
        <div class="modal fade" id="Aimages_upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add images</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form id="form" class="form-contact" method="post" action="{{route('Apost.image')}}"
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
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </form>
                
                </div>
            </div>
          </div>
        </div>

       
<!-- profile modal-->
<div class="modal fade" id="Aprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('Apost.profile')}}" method="POST" enctype="multipart/form-data">@csrf
           
            <div class="modal-body">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
        </form>
    </div>
  </div>
</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/
jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready((e)=>{
        $(".btn-add-more").click(()=>{
            let html=$(".copy").html();
            //display the button before copy div
            $(".initial-add-more").after(html);
        })
        $("body").on("click",".remove",()=>{
            $("#input-file").remove();
        })

    });
        
</script>

<style>
.text-danger{
	color: red;
}
</style>

