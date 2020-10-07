@extends('layouts.app')

   @include('../partials.pagehead')
  
	 <!-- Scripts -->
   <script src="{{ asset('js/tab.js') }}" defer></script>
   <link rel="stylesheet" href="{{asset('css/search.css')}}">
@section('content')
<div class="container-fluid col-md-11">
  <div class="row">
      <div class="col-lg-3 sidebar-widgets">
			<div class="widget-wrap">	
            <div class="ml-4 ">
               <a href="{{route('client.index')}}"> <h3></h3><span class="lnr lnr-arrow-left font-weight-bold"></span></a>
            </div>
				<div class="single-sidebar-widget popular-post-widget">
					<h4 class="popular-title">Filter By</h4>    
				</div>	

                <div class="single-sidebar-widget" style="margin-top:-10px">
                  <h4 class="popular-title ml-1 mb-3 "><a href="{{route('profile.search')}}" class="text-white">All Category</a></h4>
					<h4 class="popular-title ml-1 mb-3 text-white">Category</h4>  
                    <form class="" action="{{route('urban')}}" method="get"> @csrf
                        <input type="hidden" name="urban" value="urban">
                        <input type="submit" class="pr-5"value="Urban Architecture">
                    </form>  
                    <form class="" action="{{route('interior')}}" method="get"> @csrf
                        <input type="hidden" name="interior" value="interior">
                        <input type="submit" style="padding-right:40px" value="Interior Architecture">
                    </form>
                    <form class="" action="{{route('industrial')}}" method="get"> @csrf
                        <input type="hidden" name="industrial" value="industrial">
                        <input type="submit"  style="padding-right:25px"value="Industrial Architecture">
                    </form>
                    <form class="" action="{{route('residential')}}" method="get"> @csrf
                        <input type="hidden" name="residential" value="residential">
                        <input type="submit" style="padding-right:15px"value="Residential Architecture">
                    </form>
                    <form class="" action="{{route('landscape')}}" method="get"> @csrf
                        <input type="hidden" name="landscape" value="landscape">
                        <input type="submit" style="padding-right:15px" value="Landscape Architecture">
                    </form>
                   
                    <form class="" action="{{route('commercial')}}" method="get"> @csrf
                        <input type="hidden" name="commercial" value="commercial">
                        <input type="submit" value="Commercial Architecture">
                    </form>
                    
                </div>
					<h4 class="popular-title ml-4 pl-2 mb-3 text-white">Talent Type</h4> 
                    <form class="" action="{{route('client.agency')}}" method="get"> @csrf
                       
                        <input type="submit" class="px-5 py-2" style="margin-left:30px"value="Agency">
                    </form>
                    <form class="" action="{{route('client.architect')}}" method="get"> @csrf
                       
                       <input type="submit" class=" py-2" style="margin-left:30px; padding-right:43px; padding-left:43px"
                       value="Architect">
                   </form>
                    
                <div class="single-sidebar-widget user-info-widget" ></div>      
                
			</div>	

		</div>
	
		<!-- End col-4 -->
		<div class="col-lg-9 sidebar-widgets">
			<div class="widget-wrap ">
                   <div class="single-sidebar-widget user-info-widget mt-3" style="margin-top:-1.8rem">
                        <ul class="nav" style="margin-bottom: -22px">
                            <li class="active"><a href="#firsttab" data-toggle="tab" class="first"><h5 class="mx-4">SEARCH</h5></a></li>
                            <li><a href="#secondtab" data-toggle="tab" class="second"><h5 class="ml-3">MY HIRE</h5></a></li>
                            <li><a href="#thirdtab" data-toggle="tab" class="second"><h5 class="ml-3">SAVED</h5></a></li>
                        
                        </ul>		
					</div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="firsttab">
                            <div class="single-sidebar-widget search-widget">
                                <form class="search-form" action="{{route('post.find')}}" method="get"> @csrf
                                    <input placeholder="Search by name and username" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search by name and username'">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="single-sidebar-widget user-info-widget mt-3 text-left" style="margin-top:-1.8rem">
                              <div class="rounded  jobs-wrap" style="margin-top:-29px">
                                @foreach($architect as $result)
  
                                    <a href="{{route('jobs.show',[$result->id,$result->username])}}" class="job-item d-block d-md-flex align-items-center  border-bottom 
                                    @if($result->user_type=='architect') architect @else($result->user_type=='agency')agency  @endif;">
                                    <div class="company-logo blank-logo text-center text-md-left pl-3">
                                       @if(empty($result->profile->avatar))
                                       <img src="{{asset('avatar/avatar3.png')}}" alt="" style="margin-top:-15px" width="50%" >  
                                        @else
                                        <img src="{{asset('uploads/avatar/')}}/{{$result->profile->avatar}}" 
                                        style="margin-top:-25px" alt="" width="50%" class="rounded-circle">    
                                        @endif
                                    </div>
                                    <div class="job-details h-100">
                                        <div class="p-3 align-self-center">
                                        <h3>{{$result->name}}</h3>
                                        <div class="d-block d-lg-flex">
                                          @if((empty($result->profile->job_field)) AND (empty($result->profile->state)))
                                            <div class="mr-3"><span class="lnr lnr-briefcase"></span></div>
                                            <div class="mr-3"><span class="lnr lnr-map-marker"></span></div>
                                            <div><span class="lnr lnr-smile"></span></span></div>
                                          @else 
                                            <div class="mr-3"><span class="lnr lnr-briefcase"></span> {{$result->profile->job_field}}</div>
                                            <div class="mr-3"><span class="lnr lnr-map-marker"></span> {{$result->profile->state}}</div>
                                            <div><span class="lnr lnr-smile"></span></span> #100</div>
                                          @endif 
                                        </div>
                                        </div>
                                    </div>
                                    <div class="job-category align-self-center">
                                      @if($result->user_type=='architect')
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
                        </div>      
                        <div class="tab-pane" id="secondtab">
                            <div class="row">
                               
                            </div>
                            
                        </div>
                        <div class="tab-pane" id="thirdtab">
                            <div class="row">
                               3rd
                            </div>
                            
                        </div>
                        
					</div>
					
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