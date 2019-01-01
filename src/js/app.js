jQuery(document).ready(function($) {

	var sectorRadioInputButtons = $('.sector input:radio');
	var sectorRadioInputOther   = $('.sector input:radio[id="other"]');

	sectorRadioInputButtons.change(function() {

       	var input = $('.sector input:text[id="sector"]');

        if (sectorRadioInputOther.is(':checked')) {
           input.prop('disabled', false).focus();
           return;
        }

        input.prop('disabled', true).val("");
    });



	var questionsRadioInputButtons = $('.questions input:radio');
	var questionTwoRadioInput   = $('.questions input:radio[id="question-2-yes"]');

    questionsRadioInputButtons.change(function() {

       	var textarea = $('.questions textarea#question-2-other');

        if (questionTwoRadioInput.is(':checked')) {

           textarea.prop('disabled', false).focus();
           return;
        }

        textarea.prop('disabled', true).val("");
    });


  // Validate the form
    
	$('form#survey').parsley()
		.on('field:validated', function() {

			var ok = $('.parsley-error').length === 0;
			$('.bs-callout-info').toggleClass('hidden', !ok);
			$('.bs-callout-warning').toggleClass('hidden', ok);
		})
		.on('form:submit', function() {
			
		});

});