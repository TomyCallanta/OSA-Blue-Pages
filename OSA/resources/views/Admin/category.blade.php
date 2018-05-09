<div class="row">
	<div class="col s12 m6">
		<form class="card col s12">
			<div class="card-content">
				<input type="hidden" name="category_id">
				<div class="input-field">
					<input id="toBeEditted" class="category-auto autocomplete" type="text">
				</div>

				<div class="input-field">
					<input id="" class="" type="text" name="name">
				</div>
				<button class="btn" type="clear">cancel</button>
				<button id="submit" class="btn"><i class="material-icons">add</i></button>
			</div>
		</form>
	</div>

	<div class="col s12 m6">
		<div class="card col s12">
			<div class="card-content">
				<table id="categories">
					<tr>
						<th>Category</th>
					</tr>

					@foreach($categories as $category)
					<tr class="category-instance">
						<td id="cat_{{$category->name}}">{{$category->name}}</td>
					</tr>
					@endforeach
				</table>	
			</div>
		</div>
	</div>
</div> 

<script type="text/javascript">
	data = <?php echo $autofill ?>;
	$(document).ready(function(){
		$('.category-auto').autocomplete({
			data: data
		});
	});
</script>