<div class = "row">
	<div class = "col s12">
		<h5> Related Suppliers </h5>
	</div>
	@if(count($related) > 0)
	@foreach($related as $rel)
	<div class = "col l12 m6 s12">
		<div class="card" >
			<div class="card-content">
				<div class = "row">
					<div class = "col s12">
						<span class="title-Suggestion"><a class="black-text" href="/supplier/{{$rel->id}}">{{$rel->company_name}}</a></span>
						<span class="blue-text lighten-1 right valign-wrapper">
							@if($rel->rating > 0)
							{{$rel->rating}}
							@else
							-
							@endif
							<i class="starSmall2 material-icons">star</i>
						</span>
					</div>
				</div>
				<p>{{$category}}</p>
				<p>Speciality</p>
			</div>
		</div>
	</div>
	@endforeach

	<div class="col s12">
		<a class="grey-text" href="{{route('search', ['sort' => $categories[0]->id])}}">See More</a>
	</div>
	@else
	<div class="col s12">
		<p>No related suppliers</p>
	</div>
	@endif
</div>