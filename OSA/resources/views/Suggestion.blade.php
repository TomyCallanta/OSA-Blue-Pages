<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8">
		<title>Suggestions</title>
		<meta name="author" content="">
		<meta name="description" content="">

		<!--Import Google Icon Font-->
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	    <!-- Import JQuery -->
	    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>

	    <!--Import CSS-->
	    <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen,projection"/>
	    <link type="text/css" rel="stylesheet" href="{{asset('css/Suggestion.css')}}">
	    <link type="text/css" rel="stylesheet" href="{{asset('css/general.css')}}" media="screen, projection"/>

	    <!--Import Javascript-->
      	<script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
      	<script type="text/javascript" src="{{asset('js/general.js')}}"></script>
      	<script type="text/javascript" src="{{asset('js/Select.js')}}"></script>

	    <!--Let browser know website is optimized for mobile-->
	    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	</head>
	<body class="grey lighten-4">
		<!-- Navigation Bar -->
		@include('NavBar')  

		<!-- Content -->
		<main>
			<div class='suggestion container'>
				<div class='card z-depth-3' id='bgcard'>
					<div class="card-content">
						<div class='row'>
							<div class='col s12'>
								<h3>Suggestion Form</h3>
							</div>
						</div>
						<form method="post">
   							{{ csrf_field()}}
							<div class='row'>
								<div class="input-field col s12 m6">
									<label class="black-text" for="CompanyName">Company Name</label>
									<input type="text" name="CompanyName" required>
								</div>
								<div class="input-field col s12 m6">
									<label class="black-text" for="BusinessName">Business Name</label>
									<input type="text" name="BusinessName">
								</div>
							</div>
							<div class='row'>
								<div class='input-field col s12'>
									<label class="black-text" for="Address">Address</label>
									<input type='text' name='Address' required>
								</div>
							</div>
							<div class='row'>
								<div class="input-field col s12 m6">
									<label class="black-text" for="email">Email</label>
									<input type="text" name="email">
								</div>
								<div class="input-field col s12 m6">
									<label class="black-text" for="Celno">Contact Number</label>
									<input type="text" name="Celno" required>
								</div>
							</div>
							<div class='row'>
								<div class="input-field col s12 m6">
									    <select name="BusinessType" required
									    	<option value="">Category</option>
									    	@foreach($categories as $category)
									            <option value="{{$category->id}}">{{$category->name}}</option>
									        @endforeach
									    </select>
								    <label class="black-text">Type of Business</label>
										
								</div>
								<div class="input-field col s12 m6">
									<label class="black-text" for="ContactPerson">Contact Person</label>
									<input type="text" name="ContactPerson">
								</div>
							</div>
							<div class='row'>
								<div class="input-field col s12 m6">
									<label class="black-text" for="website">Website</label>
									<input type="text" name="website">
								</div>
								<div class="input-field col s12 m6">
									<label class="black-text" for="Facebook">Facebook Page</label>
									<input type="text" name="Facebook">
								</div>
							</div>
							<div class='row'>
								<div class='input-field col s12'>
									<textarea class="materialize-textarea" name="Notes"></textarea>
		          					<label class="black-text" for="Notes">Notes for Administrator</label>
								</div>
							</div>
							<div class='row'>
								<div class='col s2'>
									<button class="waves-effect waves-light btn blue lighten-1" type="reset">clear</button>
								</div>
								<div class='col s2 offset-s6 offset-m8 offset-l8 right-align'>
									<button class="btn waves-effect waves-light blue lighten-1" type="submit" name="action">Submit
								    <i class="material-icons right">send</i>
								  	</button>
								</div>
							</div>
							<div class='row'></div>
						</form>	
					</div>
				</div>
			</div>
		</main>

		<!-- Footer -->
		@include('Footer')
	</body>
</html>