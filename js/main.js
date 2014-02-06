$(document).ready( function() {
	// SHOW TERMS AND CONDITIONS (TOGGLE)
	$('.btnTermsandConditions').on('click', function() {
		event.preventDefault();
		$('#enterCompetitionForm').fadeToggle();
		$('.termsAndConditions').fadeToggle();
	});

	$('.closeTerms').on('click', function() {
		event.preventDefault();
		$('#enterCompetitionForm').fadeToggle();
		$('.termsAndConditions').fadeToggle();
	});

	$('.inputTermsandConditions').on('click', function() {
		event.preventDefault();
		$('#enterCompetitionForm').fadeToggle();
		$('.termsAndConditions').fadeToggle();
	});

	// LIGHTBOX
	$(".fancybox").fancybox({
		openEffect	: 'none',
		closeEffect	: 'none'
	});

	$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
	});

	// CLOSE ADVERT BANNER
	$('.closeAdvertBanner').on('click', function() {
			event.preventDefault();
			$('#advertBanner').remove();
	});

	

	// $('#advertBanner').mouseover(function() {
 //    	$(this).stop(true, true).animate({height: '400px'});
	// }).mouseout(function() {
 //    	$(this).stop(true, true).animate({height: '100px'});
	// });


	/*--------------------------------------------------*/
	/* UPLOADER
	/*--------------------------------------------------*/

	$("#enterCompetitionForm").validate({
		rules: {
            inputName: "required",
            inputParentsName: "required",
            inputName: "required",
            inputName: "required",
            postcode: {
                required: true,
                minlength: 3
            }
        },
        messages: {
            inputName: "Please enter your child's name",
            inputParentsName: "Please enter your child's name",
            inputParentsEmail: "Please enter your child's name",
            inputName: "Please enter your child's name",
            postcode: {
                required: "Field PostCode is required",
                minlength: "Field PostCode must contain at least 3 characters" 
            }
        }

	});


});