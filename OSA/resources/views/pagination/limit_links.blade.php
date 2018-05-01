
<div class="pagination pageMargin">
    <a class="{{ empty($paginator->previousPageUrl()) ? ' disabled' : ''}}" href="{{$paginator->previousPageUrl()}}">Previous</a>
    <a class="{{ empty($paginator->nextPageUrl()) ? ' disabled' : ''}}" href="{{$paginator->nextPageUrl()}}">Next</a>
</div>