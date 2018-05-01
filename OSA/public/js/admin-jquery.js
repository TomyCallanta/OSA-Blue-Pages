$(document).ready(function(){
	var field = [ 
		$("input[name='company_name']"),
	    $("input[name='business_name']"),
	    $("input[name='address']"),
	    $("input[name='email']"),
	    $("input[name='contact_no']"),
	    $("select[name='category_id']"),
	    $("input[name='contact_person']"),
	    $("input[name='website']"),
	    $("input[name='fbpage']"),
	    $("textarea[name='note_to_admin']"),
	    $("#suggestor")
	];
	
	var url = "/Admin"; 

	$('#suppliers').on('click','tbody tr', function (evt) {
		var view =  $('table').siblings('input').val();
		var viewURL = "/Get/";
	    var cell= $(evt.target).closest('td');
	    var supplier_id = cell.parent().attr("id");
	 
	    if( cell.index() > 0){
	    	$.get(url + viewURL + supplier_id, function (data) {
	            //success data

	            field[0].siblings("input[type='hidden']").val(data.company_name);
	            field[1].siblings("input[type='hidden']").val(data.business_name);
	            field[2].siblings("input[type='hidden']").val(data.address);
	            field[3].siblings("input[type='hidden']").val(data.email);
	            field[4].siblings("input[type='hidden']").val(data.contact_no);
	            field[5].siblings("input[type='hidden']").val(data.category_id);
	            field[6].siblings("input[type='hidden']").val(data.contact_person);
	            field[7].siblings("input[type='hidden']").val(data.website);
	            field[8].siblings("input[type='hidden']").val(data.fbpage);
	            field[9].siblings("input[type='hidden']").val(data.note_to_admin);
	    		
	    		$("#details").addClass("current");
	            $("#reviews_btn").html("Reviews (" + data.num_reviews + ")");
	            if(data.num_reviews < 1){
	            	$("#reviews_btn").addClass("disabled");
	            }else{
	            	$("#reviews_btn").removeClass("disabled");
	            }
	            if($("#reviews_btn").hasClass("current")){
	            	$("#reviews_btn").removeClass("current");
	            }

	    		if(data.suggestor != null){
	    			field[10].html("Suggested by " + data.suggestor);
	    		}else{
	    			$("#mh").css('height',118);
	    			$("#mc").css('top',138);
	    		}
	    		if (data.note_to_admin == null){
	    			$('#notes').css('display', 'none')
	    		}else{
	    			$('#notes').css('display', 'block')
	    		}

	    		$("#editID").val(supplier_id);

	    		setValue();
				$("#supplierInfo").show();
				$("#review-screen").hide();
	    		editToggle();
	        });
	   }
	});

	$("#edit").click(function (e){
		var viewURL = "/Edit/";
		var supplier_id = $("#editID").val();

		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

		e.preventDefault();

		var formData ={
			company_name: field[0].val(),
			business_name: field[1].val(),
			address: field[2].val(),
			email: field[3].val(),
			contact_no: field[4].val(),
			category_id: field[5].val(),
			contact_person: field[6].val(),
			website: field[7].val(),
			fbpage: field[8].val(),
			note_to_admin: field[9].val()
		};	
		$.ajax({
			url: url + viewURL + supplier_id,
			type: "PUT",
			data: formData,
			success: function(data){
				var filter = $("select[name='sort']").val();
				console.log(filter);
				console.log(data.category_id);
				if(field[5].val() == "All" || data.category_id	== filter){
					$("#" + supplier_id + " td:nth-child(2)").html(data.company_name);
					$("#" + supplier_id + " td:nth-child(3)").html(data.category);
					$("#" + supplier_id + " td:nth-child(4)").html(data.contact_no);
				}else{
					$("#" + supplier_id).remove();
				}

				editToggle();
			}, error: function(x){
				alert(x.responseText);
			}
		});
	});

	$("#details").click(function(){
		if(!($(this).hasClass("current"))){
			$("#details").addClass("current");
			$("#reviews_btn").removeClass("current");
			$("#supplierInfo").show();
			$("#review-screen").hide();
		}
	})

	$("#reviews_btn").click(function(){
		var supplier_id = $("#editID").val();
		var viewURL = "/Reviews/" + supplier_id + "/1";
		if(!($(this).hasClass("disabled") || $(this).hasClass("current"))){
			$.get(viewURL, function(data) {
				$("#details").removeClass("current");
				$("#reviews_btn").addClass("current");
				$("#supplierInfo").hide();
				$("#review-screen").show();

				var reviews = data[0].data;
				for(i = 0; i < reviews.length; i++){
					var rateHTML = "<div class='comment-rating'>";
					for(j = 0; j<5; j++){
						rateHTML += "<span";
						if(j < reviews[i].rating){
							rateHTML += " class='rate'";
						}
						rateHTML += ">★ </span>";
					}
					rateHTML += "</div>";
					var comment = "<div class='subText'>" + reviews[i].created_at + "</div";					
					var html = "<div class='bottomBorder'><strong class='comment-name'>" + data.users[i] + "</strong>" 
							   + rateHTML + "<p class='review'>"
							   + reviews[i].review_content + "</p>"
							   + comment + "</div>";
					
					if(i>0){
						$("#reviewContent").append(html);
					}else{
						$("#reviewContent").html(html);
					}
				}
			}).fail(function(tp) {
				alert(tp.responseText);
			});
		}
	});

	$("#action > a").click(function() {
		var selected = $('table input[type="checkbox"]:checked').map(function(){
			return $(this).val();
		}).get();

		if(selected.length > 0){
			var action = $(this).html()
			var urlAdd = "";
			var type = "PUT";

			$.ajaxSetup({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
	            }
	        })

			if(action == "Delete"){
				type = "DELETE";
				urlAdd = "/Delete";
			}else{
				urlAdd = "/Change/" + action + "ed";
			}

			$.ajax({
				url: url + urlAdd,
				type: type,
				data: {suppliers:selected},
				success: function(data){
					location.reload(true);
				},
				error: function(tp){
					alert(tp.responseText)
				}
			});
		}
	});

	$('#undo').click(function() {
		setValue()
	});

	$('#modalWhole').click(function() {
		editToggle();
	});
	$('#modal-inner').click(function(e) {
		e.stopPropagation();
	});

	function setValue(){
		for(i = 0; i < field.length; i++){
			field[i].val(field[i].siblings("input[type='hidden']").val());
		}
	}

	$("#checkAll").click(function(){
	    $("input[type='checkbox']").not(this).prop('checked', this.checked);
	});

	$("input[type='checkbox']").change(function(){
		var table = $(this).parents().eq(2);
		var numAll = table.find("input[type='checkbox']").length;
		var numChecked = table.find("input[type='checkbox']:checked").length;
		if(numAll == numChecked){
			$("#checkAll").prop('checked', true);
			$("#checkAll").prop('indeterminate', false);
		}else if(numChecked == 0){
			$("#checkAll").prop('checked', false);
			$("#checkAll").prop('indeterminate', false);
		}else{
			$("#checkAll").prop('indeterminate', true);
		}
	});
});