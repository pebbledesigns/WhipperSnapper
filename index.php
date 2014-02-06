<?php
require_once 'core/init.php';

//Load the template into page
$template = new template;

// Load page scripts
echo $template->headerScripts();

//-----------------------------------------------------
// PAGE VARIABLES
//-----------------------------------------------------
$page = 'index';
?>


<?php
//-----------------------------------------------------
// HEADER
//-----------------------------------------------------
	// Advertising banner
	//echo $template->advertBanner();

	// NAV
	//echo $template->nav();

	//HEADER - this is the part with the section title, background graphic and main banner
	//$header = new header($page);

	echo '<section>';


//-----------------------------------------------------
// BODY
//-----------------------------------------------------



echo '<div id="bodyArea">
		<div class="grid">
			<div class="row">
				<div class="slot-0-1-2" >
						<a href="post.agegate.php?';

							if(isset($_GET['referrer'])) {
								echo 'referrer='. $_GET['referrer'] . '&ageGate=young';
							} else {
								echo 'ageGate=younger';
							}
						
				echo '" style="color: #aaa; font-size: 3REM;">Young</a>
				</div>
				<div class="slot--3-4-5" style="color: #aaa; font-size: 3REM;">
						<a href="post.agegate.php?';

							if(isset($_GET['referrer'])) {
								echo 'referrer='. $_GET['referrer'] . '&ageGate=older';
							} else {
								echo 'ageGate=older';
							}
						
				echo '" style="color: #aaa; font-size: 3REM;">old</a>
				</div>
			</div>
		</div> <!-- End grid -->
	 </div>';




//-----------------------------------------------------
// FOOTER
//-----------------------------------------------------
	 
echo '</section>';
//$footer = new footer();
//echo $footer->footer;