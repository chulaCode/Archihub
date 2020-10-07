@extends('layouts.app')

@include('../partials.pagehead')

@section('content')
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
                            <p class="user-name col-lg-12 col-md-12 col-6"><a href="{{route('profile')}}">Your profile</a> <span class="lnr lnr-user"></span></p>
                            	<p class="col-lg-12 col-md-12 col-6"><button class="btn btn btn_post " style="background:#f9cc41; ">
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
                                  @if(empty(Auth::user()->jobs->title))
                                     @foreach($draft as $drafts)
                                        <div class="row single-sidebar-widget ml-0">
                                            <div class="col-md-8 pull-left">
                                                <h4>{{$drafts->title}}</h4>   
                                            </div>
                                            <div class="col-md-4">
                                                <button class="btn btn-danger mr-lg-3"data-toggle="modal" 
                                                data-target="#deleteModal{{$drafts->id}}"><i class="far fa-trash-alt"></i></button>
                                                <button class="btn btn-success" data-toggle="modal" 
                                                data-target="#edith{{$drafts->id}}"><i class="far fa-edit"></i></button>
                                            </div>
                                        </div>
                                        <!-- Modal delete -->
                                            <div class="modal fade" id="deleteModal{{$drafts->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content" style="background: #f9cc41">
                                                        <div class="modal-header" style="background: #f9cc41">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body bg-dark">
                                                            Are you sure you want to Delete?
                                                        </div>
                                                        <div class="modal-footer" style="background: #f9cc41">
                                                                <form action="{{route('post.delete')}}" method="POST">@csrf
                                                                    <input type="hidden" name="id" value="{{$drafts->id}}">
                                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </form>
                                                        </div>
                                                   </div>
                                                </div>
                                            </div>
                                            <!--modal ends-->
                                            <!-- profile edit-->
                                            <div class="modal fade" id="edith{{$drafts->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog " role="document">
                                                    <div class="modal-content" style="background: #f9cc41">
                                                        <div class="modal-header" style="background: #f9cc41">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Job</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form  action="{{route('post.edit')}}" method="POST">@csrf
                                                         <input type="hidden" name="id" value="{{$drafts->id}}">
                                                            <div class="modal-body bg-dark">
                                                                  <div class="modal-body">

                                                                        <div class="form-group row">
                                                                            <label for="title" class="col-md-4 font-weight-bold text-md-left">{{ __('Change job title') }}</label>

                                                                            <div class="col-md-12">
                                                                                <input id="username" type="text" 
                                                                                class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" 
                                                                                value="{{$drafts->title}}" name="title" required>

                                                                                @if ($errors->has('title'))
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $errors->first('title')}}</strong>
                                                                                    </span>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="form-group row">
                                                                            <label for="description" class="col-md-12 font-weight-bold text-md-left">{{ __('Change job Description') }}</label>

                                                                            <div class="col-md-12">
                                                                                <textarea type="text" name="desc" class="form-control @error('description') 
                                                                                is-invalid @enderror" rows="5" cols="50" min="50">{{$drafts->description}}</textarea>
                                                                                @error('description')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            </div>
                                                                           
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="salary" class="col-md-4 font-weight-bold text-md-left">{{ __('Change budget') }}</label>

                                                                            <div class="col-md-12">
                                                                                <input id="salary" type="number" 
                                                                                class="form-control{{ $errors->has('salary') ? ' is-invalid' : '' }}" 
                                                                                value="{{$drafts->salary}}" name="salary" required>

                                                                                @if ($errors->has('salary'))
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $errors->first('salary')}}</strong>
                                                                                    </span>
                                                                                @endif
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                          <label for="salary" class="col-md-4 font-weight-bold text-md-left">{{ __('Change Category') }}</label>
                                                                            <div class="col-md-12">
                                                                                <select name="categories_id" class="form-control"id="">
                                                                                    @foreach(App\categories::all() as $cat)
                                                                                        <option value="{{$cat->id}}"{{$cat->id==
                                                                                        $drafts->categories_id?'selected':''}}>{{$cat->name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>  
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="date" class="col-md-4 font-weight-bold text-md-left">{{ __('Last date to apply') }}</label>

                                                                            <div class="col-md-12">
                                                                                <input type="date" id="" name="last_date" class="form-control @error('last_date') 
                                                                                is-invalid @enderror"  value="{{$drafts->last_date}}">
                                                                                @error('last_date')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                          <label for="preference" class="col-md-4 font-weight-bold text-md-left">{{ __('Who should apply') }}</label>
                                                                            <div class="col-md-12">
                                                                                
                                                                                <select name="preference" class="form-control" >
                                                                                    <option value="entry"{{$drafts->preference=='agency'?'selected':''}}>
                                                                                    Agency</option>
                                                                                    <option value="intermediate"{{$drafts->preference=='architect'?'selected':''}}>
                                                                                    Architect</option>
                                                                                
                                                                               </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                          <label for="experience" class="col-md-4 font-weight-bold text-md-left">{{ __('Experience') }}</label>
                                                                            <div class="col-md-12">
                                   
                                                                                <select name="experience" class="form-control" >
                                                                                    <option value="entry"{{$drafts->experience=='entry'?'selected':''}}>
                                                                                    Entry Level</option>
                                                                                    <option value="intermediate"{{$drafts->experience=='intermediate'?'selected':''}}>
                                                                                    Intermediate Level</option>
                                                                                    <option value="expert"{{$drafts->experience=='expert'?'selected':''}}>
                                                                                    Expert Level</option>
                                                                            </select>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer " style="background: #f9cc41">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-success">Save changes</button>
                                                                </div>
                                                        </form>
            
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                    @endif
                                </div>
                                 
                            </div>
                     </div>
                </div>
            </div>
        </div>
    </section>
@endsection