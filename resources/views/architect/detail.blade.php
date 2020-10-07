@extends('layouts.app')

   @include('../partials.pagehead')
	<link rel="stylesheet" href="{{asset('css/tab.css')}}">
	 <!-- Scripts -->
 <script src="{{ asset('js/tab.js') }}" defer></script>

@section('content')
<div class="container-fluid col-md-11">
  <div class="row">
      <div class="col-lg-8 sidebar-widgets">
			<div class="widget-wrap ">
			<div>
			   <a href="{{route('architect.index')}}" ><span class="lnr lnr-arrow-left font-weight-bold ml-4 text-white "></span></a>
            </div>
			   <div class="single-sidebar-widget search-widget" >
					<h3 class="text-white" style="margin-top:-25px;margin-bottom:-15px">  
					@if(empty($job->title))
					<p></p>
					@else
					{{$job->title}}
					</h3>
					@endif
				</div>
				
				<div class="single-sidebar-widget user-info-widget mt-3" style="margin-top:-1.8rem">
						
					<div class="media contact-info text-white">
						@if(empty($job->description))
						<p></p>
						@else
						{{$job->description}}
					
						@endif	
					</div>
				</div>
				<div class="single-sidebar-widget user-info-widget mt-3" style="margin-top:-1.8rem">
						
				 <div class="rounded  jobs-wrap" style="margin-top:-29px">
				
						<div class="job-details">
							<div class="p-3 align-self-center">
						
								<div class="d-block d-lg-flex">
									@if(empty($job->experience))
									 <div class="mr-3"><span class="lnr lnr-briefcase"></span></div>
							
									@else 
									 <div class="mr-3 text-center"><span class="fas fa-level-up-alt mr-1">Expertise level</span><span class=""> {{$job->experience}}</span></div>
									@endif 
									@if(empty($job->preference))
									 <div class="mr-3 text-center"><span class=""></span> </div>
									@else
									 <div class="mx-3 text-center"><span class="fas fa-user-tie mr-1">Who should apply</span> {{$job->preference}}</div>
									@endif
									<div class="text-center mx-4"><span class="fa fa-clock-o mr-1 "></span>Posted</span>  {{\Carbon\Carbon::parse($job->created_at)->diffForHumans()}}</div>
									@if(empty($job->salary))
									 <div class="mr-3 text-center"><span class=""></span> </div>
									@else
									 <div class="mx-3 text-center"><span class="fas fa-money-check mr-1"></span> {{$job->salary}} Naira</div>
									@endif
									<div class="mx-3 text-center"><span class="">Category</span> -> {{$cat->name}}</div>
									
								</div>
							</div>
						</div>
					
				   </div>
				</div>
            </div>
        
		</div>

       <div class="col-lg-4 sidebar-widgets">
			<div class="widget-wrap">
			@if(Session::has('message'))
              <div class="alert alert-success text-center">
              {{Session::get('message')}}
              <button type="button" class="close" 
              data-dismiss="alert">&times;</button>
              </div>
           @endif
            @if(isset($errors)&&count($errors)>0)
                <div class="alert alert-danger">
                  <ul>
                      @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                      @endforeach
                  </ul>
                </div>
            @endif
				<div class="single-sidebar-widget search-widget">
				@if(empty($job->last_date))
				  <p><p>
                @else 
				<div class="text-center mx-4" style="margin-top:0px;margin-bottom:-15px" ><span class="fa fa-clock-o mr-1 "></span><span class="mr-1">Last date to apply</span>  {{$job->last_date}}</div>
				@endif				
				</div>
				
				<div class="single-sidebar-widget popular-post-widget">
					<h4 class="popular-title">Client Information</h4>  
					<h5 class="text-center my-3"><span class="lnr lnr-user mr-1"></span>{{$client->name}}</h5>
					<h5 class="text-center my-3"><span class="lnr lnr-envelope mr-1"></span>{{$client->email}}</h5>
					<h5 class="text-center my-3"><span class="lnr lnr-phone-handset mr-2"></span>{{$client->client->phone}}</h5>
					<h5 class="text-center my-3"><span class="lnr lnr-map-marker mr-1"></span>{{$client->client->address}} | {{$client->client->state}}</h5>
				
				</div>
				<div class="single-sidebar-widget post-category-widget">
					@if(Auth::check()&&Auth::user()->user_type!='client')
						
						@if(!$job->checkApplication())
				
						<form action="{{route('apply',[$job->id])}}" method="POST">
							@csrf 
								<button type="submit" class="btn btn-success w-100">Apply</button>
							</form>
						@else
						<center><span class="text-warning">You've already applied</span></center>
						@endif
						
						<favorite-component :jobid={{$job->id}} 
						:favorited={{$job->checkSaved()?'true':'false'}}></favorite-component>
					
					@else
					<center><span style="color: #000;"><h3>Please login to apply thanks</h3></span></center>
						
					@endif
					</div>	
					
			</div>		
		</div>
		<!-- End col-4 -->
	</div>
</div>
@endsection

