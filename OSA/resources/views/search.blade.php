<?php if(empty($search)) $search = null; ?>

<div class="search valign-wrapper">
	<div class="container">
		<form class="row" action="{{url('/')}}">
			<div class="col s12 l3">
				<div class="input-field col s12">
					<input type="hidden" name="sort">
					<a id="sort_button" class="col s12 dropdown-trigger btn blue lighten-2" data-target="categories" href="#">
						@if(empty($current))
						All Categories 
						@else
						{{$categories[$current-1]->name}}
						@endif
					<i class="right material-icons">arrow_drop_down</i></a>
					<ul id="categories" class="dropdown-content">
						<li ><a class="blue-text lighten-2 sort_choice" href="">All Categories</a></li>
						@foreach($categories as $c)
						<li ><a class="blue-text lighten-2 sort_choice" id="filter_{{$c->id}}" href="#">{{$c->name}}</a></li>
						@endforeach	
					</ul>
				</div>
			</div>
			
			<div class="input-field col s12 l9">
				<div class="">
					<div class="col s11">
						<input class="white round-corners" type="text" name="search">
					</div>
					<button type="submit"><i class="white-text material-icons">search</i></button>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="parallax-container">
	<div class="parallax"><img src="{{asset('img/search_img.jpg')}}"></div>
</div>
