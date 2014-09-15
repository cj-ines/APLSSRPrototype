$(document).ready(function() {
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
		exit(0);
	})

});
