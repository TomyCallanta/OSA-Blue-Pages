var url = "/getSupplier";

$('table').on('click','tr',function(evt){
	var cell = $(evt.target).closest('td');
	if (cell.index() > 0) {
		var id = cell.siblings('input[type="hidden"]').val();
		viewSupplier(id);
	}
});

function viewSupplier(id){
	$.get(url + "/" + id, function(data){
		$("input[name='CompanyName']").val(data.company_name);
		$("input[name='BusinessName']").val(data.business_name);
		$("input[name='Address']").val(data.address);
		$("input[name='Email']").val(data.email);
		$("input[name='CelNo']").val(data.contact_no);
		$("input[name='BusinessType']").val(data.service_type);
		$("input[name='ContactPerson']").val(data.contact_person);
		$("input[name='Website']").val(data.website);
		$("input[name='Facebook']").val(data.fbpage);
		$("input[name='Notes']").val(data.note_to_admin);
	});
}

function editSupplier(id){
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	var formData = {
		company_name: $("input[name='CompanyName']").val(),
		business_name: $("input[name='BusinessName']").val(),
		address: $("input[name='Address']").val(),
		email: $("input[name='Email']").val(),
		contact_no: $("input[name='CelNo']").val(),
		service_type: $("input[name='BusinessType']").val(),
		contact_person: $("input[name='ContactPerson']").val(),
		website: $("input[name='Website']").val(),
		fbpage: $("input[name='Facebook']").val(),
		note_to_admin: $("input[name='Notes']").val(),
	}

	$.ajax({
		type: "PUT",
		url: url + "/" + id,
		data: formData,
		datatype: 'json',
		success: function(data){
			var supplier = '<tr id="supplier' + data.id + '">';
            supplier += '<td><input type="checkbox" name=""></td>';
            supplier += '<td onclick="editSupplier(' + data.id ')">' + data.company_name + '</td>';
            supplier += '<td onclick="editSupplier(' + data.id + ')">' + data.service_type + '</td>';
            supplier += '<td onclick="editToggle(' + data.id + ')">' + data.contact_no + '</td></tr>';
		}
	});
}