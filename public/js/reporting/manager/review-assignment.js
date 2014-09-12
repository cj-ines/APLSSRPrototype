$(document).ready(function() {
	$('.approve-button').click(function() {
		if ($(this).hasClass('approved')) {
			$(this).closest('tr').removeClass('success');
			$(this).attr('class','btn btn-primary');
			$(this).html('Approve');
		}
		else {
			$(this).closest('tr').addClass('success');
			$(this).attr('class','btn btn-success approved');
			$(this).html('Approved');
		}
		sss
	})

});
