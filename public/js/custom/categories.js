function addDiv(id) {
	$("#categories-" + id).change(function() {
		parentId = $(this).val();
		$.ajax({
			type: 'GET',
			url: '/categories/parent/' + parentId,
			headers: {
				'X-Requested-With': 'XMLHttpRequest'
			},
			dataType: 'json',
			success: function(categories) {
				addCategories(categories, id);
			},
			error: function(error) {
				console.log(error);
			}
		});
	});
}

function addCategories(categories, id) {
	$(".categories-" + parseInt(id + 1)).each(function() {
		$(this).parent().empty();
	});
	if(categories != '') {
		var html = '<div class="form-group col-6 categories-' + parseInt(id + 1) + '"> <label> Sub Category  ' + parseInt(id + 1) + '</label>';
		html += '<select class="form-control parent" name="categories" id="categories-' + parseInt(id + 1) + '" onclick="addDiv(' + parseInt(id + 1) + ')">';
		html += '<option> - </option>';
		categories.forEach(function(category) {
			html += '<option value="' + category["id"] + '"> ' + category["name"] + ' </option>';
		});
		html += '</select></div>';
		$("#more-categories").append(html);
		if(categories[0]['parent_id'] == 0) {
			$(".categories-" + parseInt(id + 1)).each(function() {
				$(this).parent().empty();
			});
		}
	}
}

function addCategory() {
	var data = {
		'name': $("#name").val(),
		'parent_id': $(".parent option:selected").last().val(),
		[csrfName]: csrfHash
	};
	$.ajax({
		type: 'POST',
		url: '/categories',
		headers: {
			'X-Requested-With': 'XMLHttpRequest'
		},
		dataType: 'json',
		data: data,
		success: function(data) {
			console.log(data);
		},
		error: function(error) {
			console.log(error);
		}
	});
}