<div class="search valign-wrapper">
	<div class="container">
		<form class="row" action="{{url('/')}}">
			<div class="col s12 l3">
				<div class="row">
					<div class="col s12">
						<input type="hidden" name="sort">		
						<button id="sort_button" class="col s12 dropdown-trigger round-corners black-text white" data-target="categories" href="#">
							@if(empty($current))
							All Categories 
							@else
							{{$categories[$current-1]->name}}
							@endif
						<i class="right material-icons">arrow_drop_down</i></button>
						<ul id="categories" class="dropdown-content">
							<li ><a class="blue-text lighten-1 sort_choice" id="filter_0">All Categories</a></li>
							@foreach($categories as $c)
							<li ><a class="blue-text lighten-1 sort_choice" id="filter_{{$c->id}}">{{$c->name}}</a></li>
							@endforeach	
						</ul>
					</div>
				</div>
			</div>
			
			<div class="col s12 l9">
				<div class="row">
					<div class="col s12 m9 l10">
						<input class="white round-corners" type="text" name="search" value="{{!empty($search) ? $search : ''}}">
					</div>
					<div class="col s12 m3 l2  hide-on-small-only">
						<button class="col s12 round-corners white-text blue lighten-1" type="submit">SEARCH</button>
					</div>
				</div>
			</div>
			<div class="col s12 hide-on-med-and-up">
				<div class="row">
					<div class="col s12">
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
