<?php
require_once 'core/init.php';

//Load the template into page
$template = new template;

// Load page scripts
echo $template->headerScripts();

//-----------------------------------------------------
// PAGE VARIABLES
//-----------------------------------------------------
$page = 'gallery';
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
	echo '<div id="sectionHeader" style="padding-bottom: 0; width: 100%; url(\'' . config::get("url/baseurl") . 'images/' . $page . '/' .$header->sectionBGIMAGE.'\') ">'
			.'<div class="grid">'
				.'<div class="row">'
					.'<div class="slot-0-1-2-3-4-5" style="min-height: 539px; background-position: center top; background-size: 100% auto !important; background: url(\''. config::get("url/baseurl") . 'images/' . $page . '/' .$header->sectionIMAGE.'\');">'
						.'<div class="sectionTitle">' .
								'<img src="'. config::get("url/baseurl") . 'images/' . $page . '/'. $header->sectionICON .'" /> '
								.$header->sectionNAME.
						'</div>'
						.'<a href="" class="sectionBanner">'
							.''
						.'</a>'
						.'<div class="sectionTEXT" style="position: relative; bottom: 10px; display: none;">' . $header->sectionTEXT . '</div>' // Intro section text
					.'</div>' // .slot-0-1-2-3-4-5
				.'</div>' // .row
			.'</div>' // .grid
		.'</div>';


//-----------------------------------------------------
// BODY
//-----------------------------------------------------

echo '<div id="bodyArea" style="background-color:#'. $header->sectionHEX .'; background-image: url(\''. config::get("url/baseurl") . 'images/bgbodychequered.png'  . '\');">
		<div class="grid">
			<div class="bodyTitle" style="text-align: center">View all entries below!</div>
			';
					//-----------------------------------------------------
					// LIST GALLERIES
					//-----------------------------------------------------
					$gallery = new gallery();
					$gallery = $gallery->getGallerySections();




echo		'
		</div> <!-- End grid -->
	 </div>';


//-----------------------------------------------------
// FOOTER
//-----------------------------------------------------
	 
echo '</section>';
$footer = new footer();
echo $footer->footer;