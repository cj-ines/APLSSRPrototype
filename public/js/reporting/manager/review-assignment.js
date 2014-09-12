$(document).ready(function() {
	$('.approve-button').click(function() {
		approve_reviewer($(this).closest('tr'),$(this));
	})

	$('.show-reviewer').click(function() {
		show_reviewer($(this).closest('tr'),$(this));
	})
})

function show_reviewer(tr,bt) {
	/*
	tr.addClass('success');
	bt.attr('class','btn btn-success');
	bt.html('Approved');
	*/
}

function approve_reviewer(tr,bt) {
	tr.addClass('success');
	console.log(tr.attr('class'));
	bt.removeClass('btn-primary');
	bt.addClass('btn-success');
	bt.addClass('rev-appoved');
	bt.html('Approved');
}