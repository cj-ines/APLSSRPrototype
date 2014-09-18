$(document).ready(function() {
	$('.score-label').dblclick(function() {
		$('.error-message').hide();
		$('#scoreModal').modal('show');
	}).tooltip();
	$('.mgr-comment').popover();

	$('.update-score-btn').click(function() {
		var reason = $('.score-reason-control').val();
		if (reason == '') {
			$('.error-message').show();
		} else {
			$('#scoreModal').modal('hide');
		}
	})
})