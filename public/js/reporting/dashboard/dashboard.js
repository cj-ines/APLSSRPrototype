$(document).ready(function() {
	$('.score-label').dblclick(function() {
		$('#scoreModal').modal('show');
	}).tooltip();
	$('.mgr-comment').popover();
})