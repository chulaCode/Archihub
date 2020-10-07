@extends('layouts.app')

   @include('../partials.pagehead')
  
	 <!-- Scripts -->
   <script src="{{ asset('js/tab.js') }}" defer></script>
   <link rel="stylesheet" href="{{asset('css/search.css')}}">
@section('content')
<div class="container-fluid col-md-11">
  <div class="row">
      <div class="col-lg-3 col-sm-11 sidebar-widgets">
			<div class="widget-wrap">	
	        
                <div class=" company-logo blank-logo text-center text-md-center pl-lg-0 mt-4">
                        @if(empty(Auth::user()->profile->avatar))
                        <img src="{{asset('avatar/avatar3.png')}}" alt="" style="margin-top:0px" width="25%" >  
                        @else
                        <img src="{{asset('uploads/avatar/')}}/{{Auth::user()->profile->avatar}}" 
                        style="margin-top:-25px" alt="" width="25%" class="rounded-circle">    
                        @endif
                    </div>
                    <div class="single-sidebar-widget popular-post-widget">
                    <a href="{{route('agency.profile')}}"> <h4 class="popular-title">My Profile</h4>    </a>
                    </div>	
              
                

                <div class="single-sidebar-widget" style="margin-top:-10px">
                  <a href="{{route('agency.index')}}"><h4 class="popular-title ml-1 mb-3 text*white">My Categories</h4> </a>
                    <form class="" action="{{route('agency.urban')}}" method="get"> @csrf
                        <input type="hidden" name="urban" value="urban">
                        <input type="submit" class="pr-5"value="Urban Architecture">
                    </form>  
                    <form class="" action="{{route('agency.interior')}}" method="get"> @csrf
                        <input type="hidden" name="interior" value="interior">
                        <input type="submit" style="padding-right:40px" value="Interior Architecture">
                    </form>
                    <form class="" action="{{route('agency.industrial')}}" method="get"> @csrf
                        <input type="hidden" name="industrial" value="industrial">
                        <input type="submit"  style="padding-right:25px"value="Industrial Architecture">
                    </form>
                    <form class="" action="{{route('agency.residential')}}" method="get"> @csrf
                        <input type="hidden" name="residential" value="residential">
                        <input type="submit" style="padding-right:15px"value="Residential Architecture">
                    </form>
                    <form class="" action="{{route('agency.landscape')}}" method="get"> @csrf
                        <input type="hidden" name="landscape" value="landscape">
                        <input type="submit" style="padding-right:15px" value="Landscape Architecture">
                    </form>
                   
                    <form class="" action="{{route('agency.commercial')}}" method="get"> @csrf
                        <input type="hidden" name="commercial" value="commercial">
                        <input type="submit" value="Commercial Architecture">
                    </form>
                    
                </div>
					
                <div class="single-sidebar-widget user-info-widget" ></div>      
                
			</div>	

		</div>
	
		<!-- End col-4 -->
		<div class="col-lg-9 col-sm-11 sidebar-widgets">
			  <div class="widget-wrap ">
                   <div class="single-sidebar-widget user-info-widget mt-0" style="margin-top:Opx">
                        <ul class="nav" style="margin-bottom: -22px">
                            <li class="active"><h4 class="text-weight-bold px-2">MY FEED</h4></li>
                        
                        </ul>		
                    </div>
                    <div class="">
                        <div class="tab-pane active" id="firsttab">
                            <div class="single-sidebar-widget search-widget">
                                <form class="search-form" action="{{route('agency.find')}}" method="get"> @csrf
                                    <input placeholder="Search Jobs by title, experience and preference" name="search" type="text" onfocus="this.placeholder = 'Search Jobs'" onblur="this.placeholder = 'Search jobs'">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="single-sidebar-widget user-info-widget mt-0 text-left" style="margin-top:0rem">
                              <div class="rounded  jobs-wrap" style="margin-top:-29px">
                                 @foreach($job as $result)
                                    
                                        <a href="{{route('agency.detail',$result->id)}}" class="job-item d-block d-md-flex align-items-center  border-bottom 
                                        @if($result->categories_id==1 or $result->categories_id==3 ) architect @else agency  @endif;">
                                    
                                        <div class="job-details">
                                            <div class="p-3 align-self-center">
                                            <h3>{{$result->title}}</h3>
                                                <div class="d-block d-lg-flex">
                                                    @if(empty($result->description))
                                                    <div class="mr-3"><span class="lnr lnr-briefcase"></span></div>
                                                    <div class="mr-3"><span class="lnr lnr-map-marker"></span></div>
                                                    <div><span class="lnr lnr-smile"></span></span></div>
                                                    @else 
                                                    <div class="mr-2"><span class=""></span> {{ Str::limit($result->description, 100) }}</div>
                                        
                                                    @endif 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mr-3 text-center"><span class="">Expertise level</span> {{$result->experience}}</div>
                                        <div class="text-center"><span class="fa fa-clock-o mr-1 "></span>Posted</span>  {{\Carbon\Carbon::parse($result->created_at)->diffForHumans()}}</div>
                                        <div class="job-category ">
                                            @if($result->categories_id==1 or $result->categories_id==3)
                                            <div class="p-3">
                                            <span class=" p-2 rounded border border-warning " style="color:#f9cc41">View Detail</span>
                                            </div>
                                            @else 
                                            <div class="p-3">
                                            <span class="text-white p-2 rounded border border-light">View Detail</span>
                                            </div>
                                            @endif
                                            
                                        </div>  
                                    
                                        </a>

                                    @endforeach
                              </div>
                           </div>
                        </div>      
                          
					</div>
					
				</div>
                <div class="row my-4">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $job->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}
                    </div>
                </div>
       
		</div>

    </div>
</div>
@endsection
<STYle>
    a:link {
    color: #a8a7a7;	
	text-decoration: none;
  }
  
  a:hover {
	color:#f9cc41!important;
	text-decoration: none!important;
  }
  a:link.active {
	color: #f9cc41!important;
	
  }
</STYle>
