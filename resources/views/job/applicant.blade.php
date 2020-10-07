@extends('layouts.app')

   @include('../partials.pagehead')
  
	 <!-- Scripts -->
   <script src="{{ asset('js/tab.js') }}" defer></script>
   <link rel="stylesheet" href="{{asset('css/search.css')}}">
@section('content')
<div class="container-fluid col-md-11 ">
  <div class="row justify-content-center">
		<div class="col-lg-10 col-sm-11 sidebar-widgets">
			  <div class="widget-wrap ">
              @foreach($applicants as $applicant)
                   <div class="single-sidebar-widget user-info-widget mt-0" style="margin-top:Opx">
                        <ul class="nav" style="margin-bottom: -22px">
                            <li class="active"><h4 class="text-weight-bold px-2 "><a href="" class="text-white">{{$applicant->title}}</a></h4></li>
                        
                        </ul>		
                    </div>
                           
                    <div class="single-sidebar-widget user-info-widget mt-0 text-left" style="margin-top:0rem">
                        <div class="rounded  jobs-wrap" style="margin-top:-29px">
                            @foreach($applicant->users as $user)
                            <a href="{{route('jobs.show',[$user->id,$user->username])}}" class="job-item d-block d-md-flex align-items-center  border-bottom 
                                    @if($user->user_type=='architect') architect @else($user->user_type=='agency')agency  @endif;">
                                    <div class="company-logo blank-logo text-center text-md-left pl-3">
                                       @if(empty($user->profile->avatar))
                                       <img src="{{asset('avatar/avatar3.png')}}" alt="" style="margin-top:-15px" width="50%" >  
                                        @else
                                        <img src="{{asset('uploads/avatar/')}}/{{$user->profile->avatar}}" 
                                        style="margin-top:-25px" alt="" width="50%" class="rounded-circle">    
                                        @endif
                                    </div>
                                    <div class="job-details h-100">
                                        <div class="p-3 align-self-center">
                                        <h3>{{$user->name}}</h3>
                                            <div class="d-block d-lg-flex">
                                            @if((empty($user->profile->job_field)) AND (empty($user->profile->state)))
                                                <div class="mr-3"><span class="lnr lnr-briefcase"></span></div>
                                                <div class="mr-3"><span class="lnr lnr-map-marker"></span></div>
                                                <div><span class="lnr lnr-smile"></span></span></div>
                                            @else 
                                            
                                                <div class="mr-3"><span class="lnr lnr-briefcase"></span> {{$user->profile->job_field}}</div>
                                                <div class="mr-3"><span class="lnr lnr-map-marker"></span> {{$user->profile->address}} | {{$user->profile->state}}</div>
                                                <div><span class="lnr lnr-smile"></span></span>#100</div>
                                                
                                            @endif 
                                            </div>
                                          
                                        </div>
                                    </div>
                                    <div class="job-category align-self-center">
                                      @if($user->user_type=='architect')
                                        <div class="p-3">
                                        <span class=" p-2 rounded border border-warning " style="color:#f9cc41">architect</span>
                                        </div>
                                      @else 
                                      <div class="p-3">
                                        <span class="text-white p-2 rounded border border-light">agency</span>
                                        </div>
                                      @endif
                                       
                                    </div>  
                                    </a>
                            @endforeach
                        </div>
                    </div>
                   @endforeach
                          
                </div>
            </div>
        </div>
    </div>
       <div class="row my-4">
            <div class="col-12 d-flex justify-content-center">
                {{ $applicants->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}
            </div>
        </div>
</div>
@endsection