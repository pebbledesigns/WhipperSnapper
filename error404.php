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
	echo '<div id="sectionHeader" style="width: 100%; url(\'' . config::get("url/baseurl") . 'images/' . $page . '/' .$header->sectionBGIMAGE.'\') ">'
			.'<div class="grid">'
				.'<div class="row">'
					.'<div class="slot-0-1-2-3-4-5">'
						.'<div class="sectionTitle" style="background: url(\''. config::get("url/baseurl") . 'images/' . $page . '/'. $header->sectionICON .'\';">'.$header->sectionNAME.'</div>'
						.'<a href="" class="sectionBanner">'
							.'<img src="' . config::get("url/baseurl") . 'images/' . $page . '/' .$header->sectionIMAGE.'">'
						.'</a>'
					.'</div>' // .slot-0-1-2-3-4-5
				.'</div>' // .row
			.'</div>' // .grid
		.'</div>';


//-----------------------------------------------------
// BODY
//-----------------------------------------------------

echo '<div id="bodyArea" style="background-color:#'. $header->sectionHEX .'; background-image: url(\''. config::get("url/baseurl") . 'images/bgbodychequered.png'  . '\');">
		<div class="grid">
			<h1 style="font-size: 4REM;">ERROR 404</h1>
			';



echo		'
		</div> <!-- End grid -->
	 </div>';


//-----------------------------------------------------
// FOOTER
//-----------------------------------------------------
	 
echo '</section>';
$footer = new footer();
echo $footer->footer;