<?php
require_once 'core/init.php';

//Load the template into page
$template = new template;

// Load page scripts
echo $template->headerScripts();

//-----------------------------------------------------
// PAGE VARIABLES
//-----------------------------------------------------
$page = 'create';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	$entryid = $_GET['id'];
} else {
	header("location:../error404.php");
}

//-----------------------------------------------------
// PAGE SQL QUERY
//-----------------------------------------------------

$sql = DB::getInstance()->query("select * from `create` WHERE `create_ID` = '$entryid'");
		$sqlData = $sql->results();
		foreach( $sql->results() as $data ) {
			$sqlTitle 					= $data->create_TITLE;
			$sqlDESCRIPTION 			= $data->create_DESCRIPTION;
			$sqlBANNERIMG 				= $data->create_BANNERIMG;
			$sqlTIME 					= $data->create_TIME;
			$sqlDIFFICULTY 				= $data->create_DIFFICULTY;
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

	echo '<div id="sectionHeader" style="width: 100%; background: url(\'' . config::get("url/baseurl") . 'images/' . $page . '/' .$header->sectionBGIMAGE.'\') ">'
			.'<div class="grid">'
				.'<div class="row">'
					.'<div class="slot-6-7-8">'
						.'<div class="sectionTitle" style="background: url(\''. config::get("url/baseurl") . 'images/' . $page . '/'. $header->sectionICON .'\';">'.$header->sectionNAME.'</div>'
						.'<a href="" class="sectionBanner">'
							.'<img src="' . config::get("url/baseurl") . 'images/' . $page . '/' .$sqlBANNERIMG.'">'
						.'</a>'
					.'</div>' // .slot-0-1-2-3
					.'<div class="slot-9 featuredInstructions" style="background-image:url(\'' . config::get("url/baseurl") . 'images/' . $page . '/featuredInstructions.png\')" />'
						.'<div class="featuredContent featuredCreatecontent">
							<h2>HOW LONG TILL I CAN PLAY?</h2>';
							
							// SHOW CLOCK
							if (isset($sqlTIME)) {
								switch ($sqlTIME) {
								    case "60":
								        echo '<img src="'. config::get("url/baseurl") . 'images/' . $page . '/create60mins.png"/>';
								        break;
								    case "45":
								        echo '<img src="'. config::get("url/baseurl") . 'images/' . $page . '/create45mins.png"/>';
								        break;
								    case "30":
								        echo '<img src="'. config::get("url/baseurl") . 'images/' . $page . '/create30mins.png"/>';
								        break;
								    case "15":
								        echo '<img src="'. config::get("url/baseurl") . 'images/' . $page . '/create15mins.png"/>';
								        break;
								}
							} 

						// DIFFICULTY LEVEL
						echo '<h2 style="margin: 10% auto 5% auto;">DIFFICULTY LEVEL</h2>';
							if (isset($sqlDIFFICULTY)) {
								switch ($sqlDIFFICULTY) {
								    case "1":
								        echo '<img src="'. config::get("url/baseurl") . 'images/' . $page . '/difficultybegginer.png"/>';
								        break;
								    case "2":
								        echo '<img src="'. config::get("url/baseurl") . 'images/' . $page . '/difficultyeasy.png"/>';
								        break;
								    case "3":
								        echo '<img src="'. config::get("url/baseurl") . 'images/' . $page . '/difficultymedium.png"/>';
								        break;
								    case "4":
								        echo '<img src="'. config::get("url/baseurl") . 'images/' . $page . '/difficultyhard.png"/>';
								        break;
								}
							} 

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
			<div class="row" style="padding-top: 20px;">
				<div class="slot-0-1 createShoppingList" style="background: #fff;">
					<h3>GROWN UP SHOPPING LIST</h3>
					<ul>';
						$sql = DB::getInstance()->query("select * from `create_SHOPPINGLIST` WHERE `create_shoppinglist_CREATEID` = '$entryid'");
						foreach( $sql->results() as $createList ) {
							echo '<li>'. $createList->create_shoppinglist_TEXT.'</li>';
						}	
				echo '</ul>
					<img src="' . config::get("url/baseurl") . 'images/' . $page . '/icon_remember.png" />
					<p>Get your parents permission to try these projects. You could even get them to help!</p>
				</div>	
				<div class="slot-2-3-4-5 method" style="background: #fff;">
					<h3>HOW TO MAKE IT!</h3>
					<ol>';
						$sql 	 = DB::getInstance()->query("select * from `create_STEPS` WHERE `create_steps_CREATEID` = '$entryid' ORDER BY create_steps_ORDER");
						foreach( $sql->results() as $createSteps ) {
							echo '<li>'. $createSteps->create_steps_TEXT.'</li>';
						}
						
					'</ol>

				
				';

echo		'	</div>
			</div> <!-- end .row ->
		</div> <!-- End grid -->
	 </div>';


//-----------------------------------------------------
// FOOTER
//-----------------------------------------------------
	 
echo '</section>';
$footer = new footer();
echo $footer->footer;