<div class="col s12 center">
	<a style="width:100px" class="btn blue lighten-1 {{$paginator->previousPageUrl() ? '' : 'disabled'}}" href="{{$paginator->previousPageUrl()}}">Previous</a>

	<a style="width:100px" class="btn blue lighten-1 {{$paginator->nextPageUrl() ? '' : 'disabled'}}" href="{{$paginator->nextPageUrl()}}">next</a>
</div>