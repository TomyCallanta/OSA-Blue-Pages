<div class = "row">
	<div class = "col s12">
		<h5> Related Suppliers </h5>
	</div>
	@if(count($related) > 0)
	@foreach($related as $rel)
	<div class = "col l12 m6 s12">
		<div class="card hoverable white">
	      <div class="card-content">
	      	<span class="card-title supplier-name"><strong><a class="black-text" href="/supplier/{{$rel->id}}">{{$rel->company_name}}</a></strong></span>
			
			<div class="supplier-data overflow-hidden">
				<a class="black-text" href="{{route('search', ['sort' => $rel->category_id])}}">{{$categories[$rel->category_id - 1]->name}}</a>
		        <p>{{$rel->contact_no}}</p> 
		        <p><a class="black-text" href="mailto:{{$rel->email}}">{{$rel->email}}</a></p>
			</div>

	        <div class="divider"></div>
	        <div class="full-width supplier-value">
	        	<span><i class="blue-text lighten-1 material-icons tooltipped" data-position="top" data-tooltip="OSA Verified">verified_user</i></span>
		        <span class="right valign-wrapper {{$rel->rating > 0 ? 'blue-text lighten-1' : 'grey-text'}}">
		        	@if($rel->rating > 0)
		        	{{$rel->rating}}
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

	<div class="col s12">
		<a class="grey-text" href="{{route('search', ['sort' => $categories[0]->id])}}">See More</a>
	</div>
	@else
	<div class="col s12">
		<p>No related suppliers</p>
	</div>
	@endif
</div>