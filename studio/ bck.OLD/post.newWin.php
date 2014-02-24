<?php
require_once 'core/init.php';

//Load the template into page
$template = new template;

// Load page scripts
echo $template->headerScripts();

//-----------------------------------------------------
// PAGE VARIABLES
//-----------------------------------------------------
//$compID = $_GET['id'];
?>


<?php
//-----------------------------------------------------
// HEADER
//-----------------------------------------------------

	// NAV
	echo $template->nav();

//-----------------------------------------------------
// POST (FORM) VARIABLES
//-----------------------------------------------------

$obj = new cleandata;
  
	$error = FALSE;


	// inputTitle
	if (isset($_POST['inputTitle'])) {
		$obj->setProperty($_POST['inputTitle'], FALSE);
		$title = $obj->getProperty();
	} else { $error = TRUE; }

	// inputDescription
	if (isset($_POST['inputDescription'])) {
		$obj->setProperty($_POST['inputDescription'], FALSE);
		$description = $obj->getProperty();
	} else { $error = TRUE; }
		
	// inputInstructions
	if (isset($_POST['inputInstructions'])) {
		$obj->setProperty($_POST['inputInstructions'], FALSE);
		$instructions = $obj->getProperty();
	} else { $error = TRUE; }

	// inputDate
	if (isset($_POST['inputDate'])) {
		$obj->setDate($_POST['inputDate'], FALSE);
		$date = $obj->getDate();
	} else { $error = TRUE; }

	// inputWinnerText
	if (isset($_POST['inputWinnerText'])) {
		$obj->setProperty($_POST['inputWinnerText'], FALSE);
		$winnertext = $obj->getProperty();
	} else { $error = TRUE; }

	// inputFirstPrize
	if (isset($_POST['inputFirstPrize'])) {
		$obj->setProperty($_POST['inputFirstPrize'], FALSE);
		$firstprize = $obj->getProperty();
	} else { $error = TRUE; }

	// inputRunnersUpPrize
	if (isset($_POST['inputRunnersUpPrize'])) {
		$obj->setProperty($_POST['inputRunnersUpPrize'], FALSE);
		$runnersup = $obj->getProperty();
	} else { $error = TRUE; }

	// inputBanner
	if (isset($_POST['inputBanner'])) {
		$obj->setProperty($_POST['inputBanner'], FALSE);
		$banner = $obj->getProperty();
	} else { $error = TRUE; }

	// inputThumb
	if (isset($_POST['inputThumb'])) {
		$obj->setProperty($_POST['inputThumb'], FALSE);
		$thumb = $obj->getProperty();
	} else { $error = TRUE; }

	// inputGallery
	if (isset($_POST['selectGallery'])) {
		$obj->setProperty($_POST['selectGallery'], FALSE);
		$galleryLink = $obj->getProperty();
	} else { $error = TRUE; }


	if ($error == TRUE) {
		echo 'There has been an error';
	} else {
		$sql = DB::getInstance()->query("INSERT INTO `comps` (
					`comps_ID`, 
					`comps_TITLE`, 
					`comps_DESCRIPTION`, 
					`comps_THUMBNAIL`, 
					`comps_CLOSINGDATE`, 
					`comps_FIRSTPRIZE`, 
					`comps_RUNNERSUPPRIZES`, 
					`comps_WINNERTEXT`, 
					`comps_BANNERIMG`, 
					`COMPS_ENTRYINSTRUCTIONS`, 
					`comps_GALLERYLINK`
					) VALUES (
					NULL, 
					IF('$title' = '', NULL, '$title' ) 							,
					IF('$description' = '', NULL, '$description' ) 				,
					IF('$thumb' = '', NULL, '$thumb' ) 							,
					IF('$date' = '', NULL, '$date' ) 							, 
					IF('$firstprize' = '', NULL, '$firstprize' ) 				,
					IF('$runnersup' = '', NULL, '$runnersup' ) 					,
					IF('$winnertext' = '', NULL, '$winnertext' ) 				,
					IF('$banner' = '', NULL, '$banner' ) 						,
					IF('$instructions' = '', NULL, '$instructions' ) 			,
					IF('$galleryLink' = '', NULL, '$galleryLink' ) 				
					)");

		if( $sql->error() == TRUE) {
			echo 'Fail';
		} else {
			echo 'Success';
			var_dump($sql);
		}
	}


//-----------------------------------------------------
// BODY
//-----------------------------------------------------