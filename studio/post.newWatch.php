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

echo '<hr />';
	// inputTitle
	if (isset($_POST['inputTitle'])) {
		$obj->setProperty($_POST['inputTitle'], FALSE);
		$title = $obj->getProperty();
	} else { $error = TRUE; }

echo '<hr />';

	// inputThumb
	if (isset($_POST['inputThumb'])) {
		$obj->setProperty($_POST['inputThumb'], FALSE);
		$thumb = $obj->getProperty();
	} else { $error = TRUE; }
		
	// inputDescription
	if (isset($_POST['inputVideoSrc'])) {
		$obj->setProperty($_POST['inputVideoSrc'], FALSE);
		$src = $obj->getProperty();
	} else { $error = TRUE; }

	// Video Typw
	if (isset($_POST['inputVideoType'])) {
		$obj->setProperty($_POST['inputVideoType'], FALSE);
		$videoType = $obj->getProperty();
	} else { $error = TRUE; }

	// PUBLISHED
	if (isset($_POST['inputPublished'])) {
		if(isset($_POST['inputPublished']) && $_POST['inputPublished'] == '1') {
			$published = '1';
		} else {
			$published = '0';
		}

	} else { $error = TRUE; }

	// inputFeatured
	// if (isset($_POST['inputFeatured'])) {
	// 	$obj->setProperty($_POST['inputFeatured'], FALSE);
	// 	$featured = $obj->getProperty();
	// } else { $error = TRUE; }

	// inputVideoType



	if ($error == TRUE) {
		echo 'There has been an error';
	} else {
		$sql = DB::getInstance()->query("INSERT INTO  `watch` (
										`watch_ID` ,
										`watch_TITLE` ,
										`watch_THUMB` ,
										`watch_SRC` ,
										`watch_FEATURED` ,
										`watch_TYPE`,
										`watch_PUBLISHED`
										)
										VALUES (
										NULL ,  
										IF('$title' = '', NULL, '$title' ) ,  
										IF('$thumb' = '', NULL, '$thumb' ) ,  
										IF('$src' = '', NULL, '$src' ) ,  
										NULL ,  
										IF('$videoType' = '', NULL, '$videoType' ) ,  
										IF('$published' = '', NULL, '$published' )   
										)");

		if( $sql->error() == TRUE) {
			echo 'Fail';
		} else {
			//echo 'Success';
			//var_dump($sql);
		}
	}


//-----------------------------------------------------
// BODY
//-----------------------------------------------------