<div class = "row" style="padding-top:25px;" >
	<div class = "col s12">
		<div class="card">
			<div class="card-content">
					<div class = "row">
						<div class = "col s12">
							<h5>{{$view}} Entries</h5>
						</div>
					</div>
					<form>
						<div class = "row">
							<div class = "input-field col s12 l6">
		              <select name = "sort">
		                @foreach($categories as $category)
											@if ($category->id == $current)
					              <option value="{{$category->id}}" selected>{{$category->name}}</option>
					            @else
					              <option value="{{$category->id}}">{{$category->name}}</option>
					            @endif
		              	@endforeach
		              </select>
								<label>Category Filter</label>
	            </div>
						</div>
						<div class ="row">
							<div class="col s12 m9 l10">
								<input placeholder="What are you looking for?" class="white round-corners" type="text" name="search" value="{{!empty($search) ? $search : ''}}">
							</div>
							<div class="col s12 m3 l2">
								<button class="col s12 btn blue lighten-1" type="submit">SEARCH</button>
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class = "row">
	<div class = "col s12">
		<div class="card">
			<div class="card-content">
				<div class = "buttons-suggest">
					<div>
						@if($view == 'Rejected')
							<a class="waves-effect waves-light btn-small red accent-3 modal-trigger" data-target="reject-modal">DELETE</a>
						@endif
						@if($view == 'Suggestion' || $view == 'Accepted')
							<a class="waves-effect waves-light btn-small red accent-3 modal-trigger" data-target="reject-modal">REJECT</a>
						@endif
						@if($view == 'Suggestion' || $view == 'Rejected')
							<a class="waves-effect waves-light btn-small blue lighten-1">ACCEPT</a>
						@endif
					</div>
				</div>
				<div class = "divider" style ="margin-top:10px;"> </div>
				<table class = "highlight" id="suppliers">
					<thead>
						<tr>
							<th>
								<label>
									<input type="checkbox" class="" id ="checkAll" {{count($suppliers) > 0 ? '' : 'disabled'}}/>
									<span class = "black-text">Company Name</span>
								</label>
							</th>
							<th>Date Submitted</th>
							<th>Service Type</th>
							<th>Edit</th>
						</tr>
					</thead>

					<tbody>

						@if(count($suppliers) > 0)
						@foreach($suppliers as $supplier)
						<tr id = "{{$supplier->id}}">
							<td>
								<label>
									<input type="checkbox" value ="{{$supplier->id}}"/>
									<span class = "black-text">{{$supplier->company_name}}</span>
								</label>
							</td>
							<td>
								@if(is_null($supplier->created_at))
								{{$supplier->updated_at}}
								@else
								{{$supplier->created_at}}
								@endif
							</td>
							<td>{{$categories[$supplier->category_id - 1]->name}}</td>
							<input type ="hidden" value ="{{$supplier->id}}">
							<td><a class ="edit waves-effect waves-light btn-small blue lighten-1"><i class="material-icons">edit</i></a></td>
						</tr>
						@endforeach
						@else
						<tr><td class="center grey-text" colspan="1000">None</td></tr>
						@endif
					</tbody>
				</table>
				<input type="hidden" value="{{$view}}">
			</div>
		</div>
	</div>
</div>
</div>
<div class = "row">
	<?php $paginator = $suppliers->appends(['sort' => $current,'search' => $search])  ; ?>
	@include('pagination.limit_links')
</div>
<!-- Modal Structure -->
@include('Admin.Edit-Suggestion')
<!-- Reject Modal -->
<div id="reject-modal" class="modal size-modal">
	<div class = "reject-top white">
		<div class ="warningtop">
			<i class="material-icons warning-pic">warning</i>
		</div>
		<h4 class = "center">Warning</h4>
	</div>
	<div class = "row">
		<div class = "col s12">
			<h6> Warning: the contents will moved to rejected</h6>
			<p> Rejected data may deleted </p>
			<div class = "right">
				<a class="modal-action modal-close waves-effect waves-light grey lighten-1 btn">Cancel</a>
				<a class="modal-action modal-close waves-effect waves-light red accent-3 btn">REJECT</a>
			</div>

		</div>
	</div>
</div>
