<?php
require_once 'core/init.php';

//Load the template into page
$template = new template;

// Load page scripts
echo $template->headerScripts();

//-----------------------------------------------------
// PAGE VARIABLES
//-----------------------------------------------------
$page = 'win';
?>


<?php
//-----------------------------------------------------
// HEADER
//-----------------------------------------------------
	// Advertising banner
	echo $template->advertBanner();

	// NAV
	echo $template->nav();

	//HEADER - this is the part with the section title, background graphic and main banner
	$header = new header($page);

	echo '<section>';
	echo '<div id="sectionHeader" style="width: 100%; background: url(\'' . config::get("url/baseurl") . 'images/' . $page . '/' .$header->sectionBGIMAGE.'\') ">'
			.'<div class="grid">'
				.'<div class="row">'
					.'<div class="slot-0-1-2-3-4-5">'
						.'<div class="sectionTitle">' .
								'<img src="'. config::get("url/baseurl") . 'images/' . $page . '/'. $header->sectionICON .'" /> '
								.$header->sectionNAME.
						'</div>'
						.'<a href="" class="sectionBanner">'
							.'<img src="' . config::get("url/baseurl") . 'images/' . $page . '/' .$header->sectionIMAGE.'">'
						.'</a>'
						.'<div class="sectionTEXT">' . $header->sectionTEXT . '</div>' // Intro section text
					.'</div>' // .slot-0-1-2-3-4-5
				.'</div>' // .row
			.'</div>' // .grid
		.'</div>';


//-----------------------------------------------------
// BODY
//-----------------------------------------------------

echo '<div id="bodyArea" style="background-color:#'. $header->sectionHEX .'; background-image: url(\''. config::get("url/baseurl") . 'images/bgbodychequered.png'  . '\');">
		<div class="grid">
			<div class="bodyTitle" style="text-align: center;">Enter even more competitions below!</div>
			';
					//-----------------------------------------------------
					// TEST UPLOAD SCRIPT
					//-----------------------------------------------------
?>
<div class="row">
      <div class="well">
		Click on the Upload button to start the demo:
		<div id="mulitplefileuploader">Upload</div>
		<div id="status"></div>
  	</div>


<?php

echo		'
		</div> <!-- End grid -->
	 </div>';


//-----------------------------------------------------
// FOOTER
//-----------------------------------------------------
	 
echo '</section>';
$footer = new footer();
echo $footer->footer;
