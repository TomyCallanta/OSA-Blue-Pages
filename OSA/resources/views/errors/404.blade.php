<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8">
		<title>OSA Blue Pages - Page Not Found</title>
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

		<!-- Header -->
		<header>
		</header>

		<!-- Content -->
		<main class="valign-wrapper">
			<div class="container">				
				<div class="row center">
					<h1>Page Not Found</h1>
					<a href="/">back to home page</a>
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
