<?php if(empty($search)) $search = null; ?>

<div class="search valign-wrapper">
	<div class="container">
		<form class="row" action="{{url('/')}}">
			<div class="col s12 l3">
				<div class="row">
					<div class="col s12">
						<input type="hidden" name="sort">
						<a id="sort_button" class="col s12 dropdown-trigger btn blue lighten-1" data-target="categories" href="#">
							@if(empty($current))
							All Categories 
							@else
							{{$categories[$current-1]->name}}
							@endif
						<i class="right material-icons">arrow_drop_down</i></a>
						<ul id="categories" class="dropdown-content">
							<li ><a class="blue-text lighten-1 sort_choice" href="">All Categories</a></li>
							@foreach($categories as $c)
							<li ><a class="blue-text lighten-1 sort_choice" id="filter_{{$c->id}}" href="#">{{$c->name}}</a></li>
							@endforeach	
						</ul>
					</div>
				</div>
			</div>
			
			<div class="col s12 l9">
				<div class="row">
					<div class="col s12 l10">
						<input class="white round-corners" type="text" name="search">
					</div>
					<div class="col s2 hide-on-med-and-down">
						<button class="col s12 round-corners white-text blue lighten-1" type="submit">SEARCH</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="parallax-container">
	<div class="parallax"><img src="{{asset('img/search_img.jpg')}}"></div>
</div>
