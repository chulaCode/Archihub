@extends('layouts.app')

   @include('../partials.pagehead')
	<link rel="stylesheet" href="{{asset('css/tab.css')}}">
	 <!-- Scripts -->
 <script src="{{ asset('js/tab.js') }}" defer></script>

@section('content')
<div class="container-fluid col-md-11">
  <div class="row">
      <div class="col-lg-4 sidebar-widgets">
			<div class="widget-wrap">
				<div class="single-sidebar-widget search-widget">
					<!--<form class="search-form" action="#">
						<input placeholder="Search Posts" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
						<button type="submit"><i class="fa fa-search"></i></button>
					</form>-->
				</div>
				<div class="single-sidebar-widget user-info-widget">
					@if(empty(Auth::user()->profile->avatar))
						<img src="{{asset('avatar/avatar3.png')}}" alt="" style="margin-top:-25px" width="50%">  
						@else
						<img src="{{asset('uploads/avatar/')}}/{{Auth::user()->profile->avatar}}" 
						style="margin-top:-25px" alt="" width="50%" class="rounded-circle">    
					@endif
							
					<h4 class="text-white">{{Auth::user()->username}}</h4>
					<p>
					@if(!empty(Auth::user()->profile->address))
					<span class="contact-info__icon"><i class="lnr lnr-home"></i></span> {{Auth::user()->profile->address}} {{Auth::user()->profile->state}}
					@else
					<span class="contact-info__icon"><i class="lnr lnr-home"></i></span>
					@endif
					</p>
					<p>
					@if(!empty(Auth::user()->profile->phone))
					<span class="contact-info__icon"><i class="lnr lnr-phone-handset"></i></span>{{Auth::user()->profile->phone}}
					@else
					<span class="contact-info__icon"><i class="lnr lnr-phone-handset"></i></span>
					@endif
					</p>
					<p></p>
					<p>
					@if(!empty(Auth::user()->profile->experience))
					  <span class="text-white mr-2">Experience Level:</span> {{Auth::user()->profile->experience}}
					@else
					<span class="contact-info__icon"><i class="lnr lnr-construction"></i></span>
					@endif
					</p>
					<p>
					<h5><span class="lnr lnr-envelope mr-lg-2"></span><a href="http://gmail.com/" target="_blank">{{Auth::user()->email}}</a></h5>
					</p>
				
				</div>
				<div class="single-sidebar-widget popular-post-widget">
					<h4 class="popular-title">Availability</h4>
				    <div class="text-center">
						<p class="text-white">
						  Open for offers
						</p>
						<div class="form-group text-center ">
							<button type="submit" class="btn active btn--leftBorder mr-3">Hire</button>
							<button type="submit" class="btn active btn--rightBorder">Invite</button>
						</div>
					</div>
					
					
				</div>
				<div class="single-sidebar-widget popular-post-widget">
					<h4 class="popular-title">Documents</h4>
				    <div class="text-center">
					<span class="contact-info__icon text-white" style="font-size:1.3rem"><i class="lnr lnr-briefcase mr-4">
					  </i> Cover letter</span>
						@if(empty(Auth::user()->profile->cover_letter))
						<p>No cover letter</p>
						@else
						<p><a href="{{Storage::url(
								Auth::user()->profile->cover_letter)}}"><i class="lnr lnr-download mr-2 text-white"></i>
								<span class="text-white">Cover letter</span></a></p>
						@endif

						<span class="contact-info__icon text-white" style="font-size:1.3rem"><i class="lnr lnr-briefcase mr-4">
					  </i> Resume</span>
						@if(empty(Auth::user()->profile->resume))
						<p>No Resume</p>
						@else
						<p><a href="{{Storage::url(
								Auth::user()->profile->resume)}}"><i class="lnr lnr-download mr-2 text-white"></i>
								<span class="text-white">Resume</span></a></p>
						@endif
					
						<span class="contact-info__icon text-white" style="font-size:1.3rem"><i class="lnr lnr-briefcase mr-4">
					  </i> NIA Certificate</span>
						@if(empty(Auth::user()->profile->certificate))
						<p>No NIA certificate</p>
						@else
						<p><a href="{{Storage::url(
								Auth::user()->profile->certificate)}}"><i class="lnr lnr-download mr-2 text-white"></i>
								<span class="text-white">NIA Certificate</span></a></p>
						@endif
					</div>	
				</div>
				<div class="single-sidebar-widget ads-widget">
					<a href="#"><img class="img-fluid" src="img/blog/ads-banner.jpg" alt=""></a>
				</div>
				<div class="single-sidebar-widget post-category-widget">
					<h4 class="category-title">Completed Jobs</h4>
					<h4 class="my-3 text-center">Total 10</h4>
				</div>
				
				
			</div>
				
		</div>
	
		<!-- End col-4 -->
		<div class="col-lg-8 sidebar-widgets">
			<div class="widget-wrap ">
					<div class="single-sidebar-widget search-widget" >
						
						<h3 class="text-white" style="margin-top:-25px;margin-bottom:-15px">  
						@if(!empty(Auth::user()->profile->job_field))
						{{Auth::user()->profile->job_field}}
						@else
						
						@endif</h3>
					</div>
				
					<div class="single-sidebar-widget user-info-widget mt-3" style="margin-top:-1.8rem">
						
						<div class="media contact-info text-white">
						 {{Auth::user()->profile->bio}}
							
						</div>
					</div>
					  <h3 class="text-white ml-4 mb-3" >Work History</h3>
					
					<div class="col-md-12 mx-auto ml-3">
						<ul class="nav nav-tabs">
								<li class="active"><a href="#firsttab" data-toggle="tab" class="first"><h5 class="mx-4">Completed Projects</h5></a></li>
								<li><a href="#secondtab" data-toggle="tab" class="second"><h5 class="ml-3">Images of completed projects</h5></a></li>
							
							</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="firsttab">
								<h1>I'm in first tab</h1>
							</div>
							<div class="tab-pane" id="secondtab">
								<div class="row">
									@if(!empty(Auth::user()->image->image))
										@foreach($image as $images)
											<div class="col-md-5 col-sm-10 mx-2 my-2" id="md-image">
												<a href="photo/{{$images->id}}" data-toggle="modal" data-target="#images{{$images->id}}">
													@if(empty($images->image))
												<h3>No image.</h3>
													@else
													<img src="{{asset('uploads/'.$images->image)}}" class="img-thubnail" style="">

													@endif
										   </div>
										      <!-- image show-->
											  <div class="modal fade" id="images{{$images->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document" style="max-width:700; max-height:700;margin:40px auto">
                                                   
                                                        <div class="modal-content">
                                                            
                                                            <div class="modal-body" style="position:relative;padding:0px;">
                                                            
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:absolute;
                                                                right:-30px;top:0;z-index:999;font-size:2rem;font-weight: normal;color:#fff;opacity:1;">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>  
                                                                    <div>
                                                                    @if(!empty($images->image))
                                                                    <img src="{{asset('uploads/'.$images->image)}}" class="img-thubnail" style="width:700;height:700;">
                                                                    @else
                                                                    <p>no image</p>
                                                                    @endif
                                                                    </div>
                                                               
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
										@endforeach
									@else
									<p>No mage</p>
									@endif
							   </div>
							   	
							</div>
							
						</div>
					</div>
					<div class="single-sidebar-widget user-info-widget mt-3 text-left" style="margin-top:-1.8rem">
					 
					</div>
					
					
				</div>
		    </div>
		</div>
   </div>
</div>
@endsection

