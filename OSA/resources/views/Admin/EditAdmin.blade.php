<!-- Content -->
<div class = "row">
	<div class = "col s12">
		<div class="card darken-1 card-flow">
			<div class="card-content card-flow">
				<h5>Admin Settings</h5>
				<div class = "card-action above-pad">
					<div class = "row">
						<div class = "col s10">
							<input placeholder="Add New Admin Email" class="white round-corners" type="text">
						</div>
						<div class ="col s2">
							<a class="waves-effect waves-light blue lighten-1 btn-small"><i class="material-icons">add</i></a>
						</div>
					</div>
					<div class ="row scroll-overflow-x">
						<table class ="highlight col s12">
							<thead>
								<tr>
									<th>Admin Name</th>
									<th>Email Address</th>
									<th></th>
							</thead>
							<tbody>
								@if(count($admins) > 0)
								@foreach($admins as $admin)
									<tr>
										<td>{{$admin->first_name}} {{$admin->last_name}}</td>
										<td>{{$admin->email}}</td>
										<td>
											<a class="tooltipped waves-effect waves-light blue lighten-1 btn-small" data-position="top" data-tooltip="Delete" ><i class="material-icons">delete</i></a>
										</td>
										<input type ="hidden" value ="{{$admin->id}}">
									</tr>
								@endforeach
								@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
