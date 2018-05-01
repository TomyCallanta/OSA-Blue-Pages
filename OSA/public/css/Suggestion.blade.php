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

	    <!--Import Javascript-->
      	<script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
      	<script type="text/javascript" src="{{asset('js/NavBar.js')}}"></script>
      	<script type="text/javascript" src="{{asset('js/Select.js')}}"></script>

	    <!--Let browser know website is optimized for mobile-->
	    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	</head>
	<body class="amber lighten-5">
		<!-- Navigation Bar -->
		@include('NavBar')  

		<!-- Content -->
		<main>
			<div class='container'>
				<div class='card z-depth-4' id='bgcard'>
					<div class='row'>
						<div class='col s6'>
							<h1>Suggestion Form</h1>
						</div>
					</div>
					<form>
						<div class='row'>
							<div class="input-field col s12 m6">
								<label class="black-text" for="companyname">Company Name</label>
								<input type="text" name="companyname">
							</div>
							<div class="input-field col s12 m6">
								<label class="black-text" for="businessname">Business Name</label>
								<input type="text" name="businessname" required>
							</div>
						</div>
						<div class='row'>
							<div class='input-field col s12'>
								<label class="black-text" for="companyname">Address</label>
								<input type='text' name='address' required>
							</div>
						</div>
						<div class='row'>
							<div class="input-field col s12 m6">
								<label class="black-text" for="email">Email</label>
								<input type="text" name="email" required>
							</div>
							<div class="input-field col s12 m6">
								<label class="black-text" for="contactnum">Contact Number</label>
								<input type="text" name="contactnum" required>
							</div>
						</div>
						<div class='row'>
							<div class="input-field col s12 m6">
								    <select>
									    <option value="" disabled selected>Category</option>
									    <option value="food">Food</option>
										<option value="lightsandsounds">Lights and Sounds</option>
										<option value="venue">Venue</option>
										<option value="stage">Stage</option>
										<option value="others">Others</option>
								    </select>
							    <label class="black-text">Type of Business</label>
									
							</div>
							<div class="input-field col s12 m6">
								<label class="black-text" for="contactperson">Contact Person</label>
								<input type="text" name="contactperson">
							</div>
						</div>
						<div class='row'>
							<div class="input-field col s12 m6">
								<label class="black-text" for="website">Website</label>
								<input type="text" name="website">
							</div>
							<div class="input-field col s12 m6">
								<label class="black-text" for="fbpage">Facebook Page</label>
								<input type="text" name="fbpage" required>
							</div>
						</div>
						<div class='row'>
							<div class='input-field col s12'>
								<textarea id="textarea1" class="materialize-textarea"></textarea>
	          					<label class="black-text" for="textarea1">Notes for Administartor</label>
							</div>
						</div>
						<div class='row'>
							<div class='col s2'>
								<a class="waves-effect waves-light btn">Clear</a>
							</div>
							<div class='col s2 offset-s6 offset-m8 offset-l8 right-align'>
								<button class="btn waves-effect waves-light" type="submit" name="action">Submit
							    <i class="material-icons right">send</i>
							  	</button>
							</div>
						</div>
						<div class='row'></div>
					</form>
				</div>
			</div>
		</main>

		<!-- Footer -->
		@include('Footer')
	</body>
</html>