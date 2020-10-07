@extends('layouts.app')

   @include('../partials.pagehead')
  
	 <!-- Scripts -->
   <script src="{{ asset('js/tab.js') }}" defer></script>
   <link rel="stylesheet" href="{{asset('css/search.css')}}">
@section('content')
<div class="container-fluid col-md-10 ">
  <div class="row justify-content-center">
		<div class="col-lg-10 col-sm-11 sidebar-widgets">
			  <div class="widget-wrap ">
                   <div class="single-sidebar-widget user-info-widget mt-0" style="margin-top:Opx">
                        <ul class="nav" style="margin-bottom: -22px">
                            <li class="active"><h4 class="text-weight-bold px-2">Saved Jobs</h4></li>
                        
                        </ul>		
                    </div>
                    <div class="">
                        <div class="tab-pane active" id="firsttab">
                           
                            <div class="single-sidebar-widget user-info-widget mt-0 text-left" style="margin-top:0rem">
                              <div class="rounded  jobs-wrap" style="margin-top:-29px">
                                 @foreach($job as $result)
                                        <a href="{{route('architect.detail',$result->id)}}" class="job-item d-block d-md-flex align-items-center  border-bottom 
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