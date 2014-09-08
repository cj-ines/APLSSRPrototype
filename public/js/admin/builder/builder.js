/**
 * Created by inescri on 08/09/14.
 */
jQuery(function(){
    $('.q-button').tooltip();
    $('.selected-question-list').hide();
    $('.q-button').click(function() {
       // $( this).setAttribute()
        var qid;
        console.log(qid = $(this).attr('id'));
        if ($(this).hasClass('active')) {
            $('#q_' + qid).slideUp();
        }
        else {
            $('#q_' + qid).slideDown();
        }
    });

});
