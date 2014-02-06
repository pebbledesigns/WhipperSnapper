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
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	$entryid = $_GET['id'];
} else {
	header("location:../error404.php");
}

//-----------------------------------------------------
// PAGE SQL QUERY
//-----------------------------------------------------

$sql = DB::getInstance()->query("select * from `gallery_CATEGORIES` WHERE `gallery_categories_ID` = '$entryid'");
		$sqlData = $sql->results();
		foreach( $sql->results() as $data ) {
			$sqlTitle 					= $data->gallery_categories_TEXT;
			$sqlThmb 					= $data->gallery_categories_THMB;
			$sqlBANNERIMG 				= $data->gallery_categories_HEADERBANNER;
		}

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
			.'<div class="grid" style="background-color: #ff4700;">'
				.'<div class="row">'
					.'<div class="slot-6-7-8" >'
						.'<div class="sectionTitle" style="background: url(\''. config::get("url/baseurl") . 'images/' . $page . '/'. $header->sectionICON .'\';">'.$header->sectionNAME.'</div>'
						.'<a href="" class="sectionBanner">'
							.'<img src="' . config::get("url/baseurl") . 'images/' . $page . '/' .$sqlBANNERIMG.'">'
						.'</a>'
						.'<div class="sectionTEXT" style="color: #fff;">Here is The winning entry for the Power Rangers Samurai Competition! Congratulations!
Don’t forget to check out all of our other entries below!</div>' // Intro section text
					.'</div>' // .slot-0-1-2-3
					.'<div class="slot-9 featuredInstructions" style="background-image:url(\'' . config::get("url/baseurl") . 'images/' . $page . '/featuredInstructions.png\')" />'
						.'<div class="featuredContent featuredCreatecontent">
							<h2 style="padding-bottom: 10px;">COMPETITION</h2>
							<img width="80%" src="'. config::get("url/baseurl") . 'images/' . $page . '/' . $sqlThmb .'" />
							'. $sqlTitle .'';

						

					echo '</div>'
					.'</div>' // .slot-4-5
				.'</div>' // .row
			.'</div>' // .grid
		.'</div>';




//-----------------------------------------------------
// BODY
//-----------------------------------------------------

echo '<div id="bodyArea" class="enterCompetition" style="background-color:#'. $header->sectionHEX .'; background-image: url(\''. config::get("url/baseurl") . 'images/bgbodychequered.png'  . '\');">
		<div class="grid">
			<div class="bodyTitle" style="text-align: center">View more entries below!</div>';

					//-----------------------------------------------------
					// LIST GALLERY ENTRIES
					//-----------------------------------------------------
					$gallery = new gallery();
					$gallery = $gallery->getGalleryEntries();


echo		'</div> <!-- end .row ->
		</div> <!-- End grid -->
	 </div>';


//-----------------------------------------------------
// FOOTER
//-----------------------------------------------------
	 
echo '</section>';
$footer = new footer();
echo $footer->footer;