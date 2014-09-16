jQuery(function() {
	$('#add-row').unbind('click').click(function() {
		addRow();
	});

	$('.remove-row').click(function() {
		$(this).closest('tr').hide('slow');
	});
	$('.approve-button').click(function() {
		if ($(this).hasClass('approved')) {
			$(this).closest('tr').removeClass('success');
			$(this).attr('class','btn btn-primary btn-xs');
			$(this).html('Update');
		}
		else {
			$(this).closest('tr').addClass('success');
			$(this).attr('class','btn btn-success approved btn-xs');
			$(this).html('Updated');
		}
		f
	})

});

function addRow() {
	//var select
	//var html = '<tr class="subject-row"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><button class="btn btn-xs btn-primary approve-button">Update</button></td></tr>';
	var html = 	'<tr class="subjet-row"><td></td><td></td><td></td><td></td><td></td><td></td><td><select class="form-control"><option>Select Reviewer</option><option>Donathelo Dela Cruz</option><option>Delo Manaloto</option></select></td><td><button class="btn btn-xs btn-primary approve-button">Update</button> <button class="btn btn-danger btn-xs remove-row"><span class="glyphicon glyphicon-remove"></span></button></td></tr>';
	//var html = $('#last-row').html();
	$('#last-row').before(html);
	console.log($('#last-row').attr('id'));
}