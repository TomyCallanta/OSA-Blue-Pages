$(document).ready(function(){
	var url = "/api/Admin"; 

	$('.edit').click(function(){
		var supplier_id = $(this).parent().siblings("input[type='hidden']").val();
		$.get(url + '/Get/' + supplier_id, function(data){
			for(d in data){
				var field = $('#' + d);
				if(d === "tags"){
					var tags = data[d].split('|');
					
					$('#' + d).chips();

					if(tags){					
						for(t in tags){
							$('#' + d).chips('addChip', {
								tag: tags[t]
							});
						}
					}
				}else if(d === "note_to_admin"){
					if(data[d]){
						$('#' + d).val(data[d]);
						$('#' + d).show();
					}else{
						$('#' + d).hide();
					}
				}else{
					$('#' + d).val(data[d]);
				}
			}
			$('#edit-modal').modal('open');
		}).fail(function(e){
			alert("Something went wrong! :(");
		});
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
	    $("input[type='checkbox']").not($(this)).each(function(){
	    	$(this).prop('checked', $("#checkAll").prop('checked'));
	    });
	});

	$("input[type='checkbox']").change(function(){
		var table = $('#suppliers');
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