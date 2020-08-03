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
@section('content')
<section class="post-content-area" style="margin-top:-10px">
		<div class="container">
			<div class="row">
				<div class="col-lg-11 posts-list">
					<div class="single-post row">
                   
						<div class="col-md-3 meta-details">
			
							<div class="user-details row">
								<p class="col-lg-12 col-md-12 col-6"><button class="btn btn btn_post " style="background:#f9cc41; c">
                                <a href="{{route('post.job')}} " class="text-dark">POST A JOB</a> </button> </p>
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
                                              
                                    <h3 class="text-white" style="margin-top:-25px;margin-bottom:-15px">My DRAFTS</h3>
                                </div>
    
                                <div class="single-sidebar-widget user-info-widget">
                
                                  <div class="row">
                                       
                                   </div>
                                
                                </div>
                                 
                               
                          </div>
                     </div>
                </div>
            </div>
        </div>
    </section>
@endsection