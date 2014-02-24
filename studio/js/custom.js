$(document).ready( function() {
	$('form').validate();

	// WYSIWIG EDITOR CONTROLS
	// http://www.barneyparker.com/world-simplest-html5-wysisyg-inline-editor/
	$('.wysiwigControls a').click(function(e) {
	  switch($(this).data('role')) {
	    case 'h1':
	    case 'h2':
	    case 'p':
	      document.execCommand('formatBlock', false, $(this).data('role'));
	      break;
	    default:
	      document.execCommand($(this).data('role'), false, null);
	      break;
	    }
	});

	// WYSIWYG CLONE
	//http://www.barneyparker.com/world-simplest-html5-wysisyg-inline-editor/
	$('#editor').bind('blur', function(){
	    $('#editor div').contents().unwrap().wrap('<p/>');

	    var stringContent = $("#editor").html();
		$("#textarea").val(stringContent);
	});

	$('.moduleControl').on('click', function() {
		$('.moduleContent').closest('.moduleContent').toggle();
	});

});

