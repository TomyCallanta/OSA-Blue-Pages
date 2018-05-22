<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8">
		<title>OSA Blue Pages</title>
		<meta name="author" content="">
		<meta name="description" content="">

		<!--Import Google Icon Font-->
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	    <!-- Import JQuery -->
	    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>

	    <!--Import CSS-->
	    <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen,projection"/>
	    <link type="text/css" rel="stylesheet" href="{{asset('css/Homepage.css')}}" media="screen, projection"/>
	    <link type="text/css" rel="stylesheet" href="{{asset('css/general.css')}}" media="screen, projection"/>

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
		<!--Cards Instantiator-->
			<div class="row">
			@foreach($suppliers as $supplier)
			  <div id="card" class="col s12 m6 l4">
			    <div class="card hoverable white">
			      <div class="card-content">
			      	<span class="card-title supplier-name"><strong><a class="black-text" href="/supplier/{{$supplier->id}}">{{$supplier->company_name}}</a></strong></span>
					
					<div class="supplier-data overflow-hidden">
						<a class="black-text" href="{{route('search', ['sort' => $supplier->category_id])}}">{{$categories[$supplier->category_id - 1]->name}}</a>
				        <p>{{$supplier->contact_no}}</p> 
				        <p><a class="black-text" href="mailto:{{$supplier->email}}">{{$supplier->email}}</a></p>
					</div>

			        <div class="divider"></div>
			        <div class="full-width supplier-value">
			        	<span><i class="blue-text lighten-1 material-icons tooltipped" data-position="top" data-tooltip="OSA Verified">verified_user</i></span>
				        <span class="right valign-wrapper {{$supplier->rating > 0 ? 'blue-text lighten-1' : 'grey-text'}}">
				        	@if($supplier->rating > 0)
				        	{{$supplier->rating}}
				        	@else
				        	-
				        	@endif
				        	<i class="material-icons">star</i>
				        </span>
			        </div>
			      </div>
			    </div>
		  	  </div>
			@endforeach
			@if($suppliers->count() < 1)
				@if($search)
					<div class="col s12">
						<h4>No results match: <span class="underline">{{$search}}</span></h4>
					</div>
				@else
					<div class="col s12">
						<h4 class="center">No Results</h4>
					</div>
				@endif
			@endif
			</div>

			<div class="row">
				@if($suppliers->count() > 0)
			    	<?php $paginator = $suppliers->appends(['sort' => $current,'search' => $search])  ; ?>
					@include('pagination/limit_links')
				@endif
			</div>
		</div>

		</main>

		<!-- Footer -->
		@include('Footer')
		@if(!empty($should_login))
		<script>
			$(function(){
		   		$('#login-modal').modal('open');
			});
		</script>
		@endif
	</body>

</html>
