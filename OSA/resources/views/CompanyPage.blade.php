<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>OSA Blue Pages - {{$supplier->company_name}}</title>
	<meta name="author" content="">
	<meta name="description" content="">
    <meta name="_token" content="{{csrf_token()}}" />

	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!--Import Additional Icons-->
	<link href="css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css"/>

	<!-- Import JQuery -->
	<script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>

	<!--Import CSS-->
	<link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="{{asset('css/general.css')}}" media="screen, projection"/>
	<link type="text/css" rel="stylesheet" href="{{asset('css/Homepage.css')}}" media="screen, projection"/>
	<link type="text/css" rel="stylesheet" href="{{asset('css/CompanyPage.css')}}" media="screen, projection"/>
	<link type="text/css" rel="stylesheet" href="{{asset('css/Comments.css')}}" media="screen, projection"/>
	<link type="text/css" rel="stylesheet" href="{{asset('css/Search.css')}}" media="screen, projection"/>
	<link type="text/css" rel="stylesheet" href="{{asset('css/icon.css')}}" media="screen, projection"/>
	<link type="text/css" rel="stylesheet" href="{{asset('css/input.css')}}" media="screen, projection"/>
	<!--Import Javascript-->
	<script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/general.js')}}"></script>
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body class="grey lighten-4">
	<!-- Navigation Bar -->
	@include('NavBar')

	<!-- Hompeage Header -->
	<header>
		@include('search')
	</header>

	<!-- Content -->
	<main>
		<div class="container">
			<div class="row">
				<div class="col s12 l8">
					<div class="card">
						<div class="card-content">
							<div class = "row">
								<div class = "col s12 m11" >
									<span class="title-Company"><strong></strong>{{$supplier->company_name}}</span>

									@if($supplier->verified)
									<i class="tooltipped blue-text lighten-1 material-icons" data-position="top" data-tooltip="OSA Verified">verified_user</i>
									@endif

									<h6 class="no-margin"><strong>{{$supplier->business_name}}</strong></h6>
									<input id="supplier_id" type="hidden" name="" value="{{$supplier->id}}">

									<p><a class="black-text" href="{{route('search', ['sort' => $supplier->category_id])}}"> {{ $category }} </a> </p>
								</div>

								<div class="col s12 m1">
									<span id="dropdown-rate-trigger" class="valign-wrapper supplier-rate round-corners blue lighten-1 white-text dropdown-trigger" data-target ="dropdown-rate">
										<strong id="supplier_rate">
										@if($supplier->rating > 0)
										{{$supplier->rating}}
										@else
										-
										@endif
										</strong>
										<i class="material-icons ">star</i>
									</span>
									<!-- DropDown -->
								</div>
							</div>

							<div class="divider"></div>
							<!-- Info -->
							<div class="row">
								<div class = "col s12 m6">
									@if(!empty($supplier->contact_person))
									<h6><strong>Contact Person</strong></h6>
									<p class ="info-space">{{$supplier->contact_person}}</p>
									@endif
									
									@if(!empty($supplier->contact_no))
									<h6><strong>Contact Number(s)</strong></h6>
									<p class ="info-space">{{$supplier->contact_no}}</p>
									@endif

									@if(!empty($supplier->address))
									<h6><strong>Address</strong></h6>
									<p class ="info-space">{{$supplier->address}}</p>
									@endif
								</div>
								<div class = "col s12 m6">
									@if(!empty($supplier->email))
									<h6><strong>Email</strong></h6>
									<p class ="info-space"><a href="mailto:{{$supplier->email}}">{{$supplier->email}}</a></p>
									@endif

									@if(!empty($supplier->fbpage))
									<h6><strong>Facebook Account</strong></h6>
									<p class ="info-space"><a href="{{$supplier->fbpage}}">{{$supplier->company_name}}</a></p>
									@endif

									@if(!empty($supplier->website))
									<h6><strong>Website</strong></h6>
									<p class ="info-space"><a href="{{$supplier->website}}">{{$supplier->website}}</a></p>
									@endif
								</div>
							</div>

							@if($supplier->tags)
								<?php $tags = explode("|", $supplier->tags) ?>
							<div class="row">
								<div class="col s12">

									@foreach($tags as $tag)
										<div class="blue lighten-1 white-text chip">{{$tag}}</div>
									@endforeach
								</div>
							</div>
							@endif
						</div>
					</div>

					<!-- Comments -->
					<div class="card">
						<div  class="card-content">
							<div id="review_section" class="row">
							<!-- Abt to comment -->
								<div id="comment-container" class="ui comments" style="margin-bottom:50px">
									<div class="comment">
										<a class="avatar">
											@if(Auth::check())
											<img src="{{Auth::user()->avatar}}">
											@else
											<span class="grey"></span>
											@endif
										</a>
										<div class="content">
											<form id="user_comment">
												<div class="input-field">
													@if(!Auth::check())
													<a class="cover modal-trigger" href="#login-modal"></a>
													@endif

													<input type="hidden" name="supplier_id" value="{{$supplier->id}}">

													<div>
														<input type = "hidden" id = "rating-Comment" name="rating" value= "0">
														@for($i = 1; $i <= 5; $i++)
														<i id="{{$i}}" class="blue-text lighten-1  starSmall material-icons">star_border</i>
														@endfor
													</div>
													<div>
														<textarea class="materialize-textarea" id="comment-field" placeholder="Tell us about {{$supplier->company_name}}" type="text" name="review_content"></textarea>
														<div id="comment-buttons" class = "comment-button">
															@if(Auth::check())
															<a id="cancel-comment" style= "padding-right:20px;" class="black-text">CANCEL</a>
															<a id="submit-comment" class="blue lighten-1 btn" type="submit" name="action">Comment</a >
															@endif
														</div>

													</div>
												</div>
											</form>
										</div>
									</div>
								</div>

								@if(count($reviews)>0)
								@for($i = 0; $i < sizeOf($reviews); $i++)
								<div class="ui comments">
									<div class="comment">
										<a class="avatar">
											<img src="{{$users[$i]->avatar}}">
										</a>
										<div class="content">
											<a class="author">{{$users[$i]->first_name}} {{ $users[$i]->last_name}}</a>
											<div class="metadata">
												<div class="date">{{Carbon\Carbon::parse($reviews[$i]->created_at)->format('d-m-Y')}}</div>
												<div class="blue-text lighten-1 rating">
													{{$reviews[$i]->rating}}
													<i class="blue-text lighten-1  commentStar material-icons">star</i>
												</div>
											</div>
											<div class="comment-text text">
												{{$reviews[$i]->review_content}}
											</div>
										</div>
									</div>
								</div>
								@endfor
								@else
								<h6 id="no_comments" class="center grey-text">No Comments</h6>
								@endif
							</div>
							<div id="page_end"></div>

							@if($reviews->hasMorePages())
							<div id="load_more_holder" class="row center">
								<a id="load_more" class="btn transparent z-depth-0 grey-text" href="#page_end">See More <i class="right material-icons">arrow_drop_down</i></a>

								<span id="next_page" class="hide">{{$reviews->currentPage() + 1}}</span>
							</div>
							@endif
						</div>
					</div>
				</div>
				<!--Suggestions-->
				<div class="col l4 s12">
					@include('recommendations')
				</div>
			</div>
		</div>
		<ul class="transparent dropdown-content user-dropdown" id="dropdown-rate">
			<li class="transparent dropdown-triangle"><span></span></li>
			<li class="blue">
			    <div class="user-view">
			      	<img class="logged_avatar" src="{{\Auth::user()->avatar}}">
			        <a class="blue" href="#"><span class="white-text">{{\Auth::user()->first_name}} {{\Auth::user()->last_name}}</span></a>
			        <a class="blue email" href="#"><span class="white-text">{{\Auth::user()->email}}</span></a>
			    </div>
			</li>
			<li class="white"><a class="blue-text lighten-1" href="/logout">Log Out</a></li>
		</ul>


	</main>

	<!-- Footer -->
	@include('Footer')
</body>
</html>
