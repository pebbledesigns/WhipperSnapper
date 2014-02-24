<?php
require_once 'core/init.php';

//Load the template into page
$template = new template;

// Load page scripts
echo $template->headerScripts();

//-----------------------------------------------------
// PAGE VARIABLES
//-----------------------------------------------------
if ( isset($_GET['id']) && is_numeric($_GET['id'])) {
		$pageid = $_GET['id'];
} else {
	header('location:error404.php');
}
?>


<?php
//-----------------------------------------------------
// HEADER
//-----------------------------------------------------

// LH COLUMN
echo $template->lhcolumn();

// LH COLUMN
echo $template->header('<span class="fa fa-files-o"></span> Edit Page');

	//-----------------------------------------------------
	// GET PAGE VARIABLES
	//-----------------------------------------------------
	$sql = DB::getInstance()->query("SELECT * from `pd_PAGES` WHERE `pd_pages_ID` = '$pageid'");
	if ($sql->results() > 0) {
		foreach($sql->results() as $data) { 
	        $pageID 		= $data->pd_pages_ID; 			// PAGE ID
	        $pageTitle 		= $data->pd_pages_TITLE; 		// PAGE TITLE
	        $pageDesc		= $data->pd_pages_DESC;			// DESCRIPTION
	        $pageCategory	= $data->pd_pages_CATEGORY;		// DESCRIPTION
	        $pageParentID	= $data->pd_pages_PARENT;
		}
	} else {
		header('location:error404.php');
	}
	

	//-----------------------------------------------------
	// BODY
	//-----------------------------------------------------

echo '<div id="bodyContent">
			<div class="row">
				<div class="module leftmodule editPage" style="position: relative;">
					<h2>Edit...
						<i class="fa fa-eye pageLinks" title="View Page"></i>
						<i class="fa fa-trash-o pageLinks" title="Delete"></i>
					</h2>

					
					<img src="images/Bausch&Lomb_page.jpg" style="width: 100%; height: auto; border: 1px solid #aaa; position: absolute; top: 0;" />
					
					<input type="text" placeholder="Title" value="'.$pageTitle.'" style="position: absolute; top: 175px; width: 80%; margin-left: 53px; color: #00ABB3; font-weight: bold; font-size: 2REM;" />
						
					<div class="wysiwigControls" style="position: absolute; top: 180px; display: none;">' 
						//. '<a data-role="undo" href="javascript:void(0)"><i class="fa fa-undo"></i></a>'
				        //. '<a data-role="redo" href="javascript:void(0)"><i class="fa fa-repeat"></i></a>'
				        . '<a data-role="bold" href="javascript:void(0)"><i class="fa fa-bold"></i></a>'
				        . '<a data-role="italic" href="javascript:void(0)"><i class="fa fa-italic"></i></a>'
				        . '<a data-role="underline" href="javascript:void(0)"><i class="fa fa-underline"></i></a>'
				        . '<a data-role="strikeThrough" href="javascript:void(0)"><i class="fa fa-strikethrough"></i></a>'
				        . '<a data-role="justifyLeft" href="javascript:void(0)"><i class="fa fa-align-left"></i></a>'
				        . '<a data-role="justifyCenter" href="javascript:void(0)"><i class="fa fa-align-center"></i></a>'
				        . '<a data-role="justifyRight" href="javascript:void(0)"><i class="fa fa-align-right"></i></a>'
				        //. '<a data-role="justifyFull" href="javascript:void(0)"><i class="fa fa-align-justify"></i></a>'
				        //. '<a data-role="indent" href="javascript:void(0)"><i class="fa fa-indent"></i></a>'
				        //. '<a data-role="outdent" href="javascript:void(0)"><i class="fa fa-outdent"></i></a>'
				        . '<a data-role="insertUnorderedList" href="javascript:void(0)"><i class="fa fa-list-ul"></i></a>'
				        . '<a data-role="insertOrderedList" href="javascript:void(0)"><i class="fa fa-list-ol"></i></a>'
				        //. '<a data-role="h1" href="javascript:void(0)">h<sup>1</sup></a>'
				        //. '<a data-role="h2" href="javascript:void(0)">h<sup>2</sup></a>'
				        //. '<a data-role="p" href="javascript:void(0)">p</a>'
				        . '<a data-role="subscript" href="javascript:void(0)"><i class="fa fa-subscript"></i></a>'
				        . '<a data-role="superscript" href="javascript:void(0)"><i class="fa fa-superscript"></i></a>'
					. '</div>
					<div id="editor" contenteditable style="position: absolute; top: 280px; left: 73px; width: 44%; min-height: 184px;">'.$pageDesc.'</div>
					<textarea id="textarea" style="display: none;">'.$pageDesc.'</textarea>



			  	</div>';
		  echo '<div class="module rightmodule">
					<h2>Page Controls</h2>
					<select>
						<option value="1"'; 
							if ( $data->pd_pages_PUBLISH == '1' ) { echo "selected='selected'"; }
				   echo '>Draft</option>

						<option value="2"'; 
							if ( $data->pd_pages_PUBLISH == '2' ) { echo "selected='selected'"; }
				   echo '>Published</option>
					</select>';

					$sql = DB::getInstance()->query("SELECT * from `pd_PAGES` WHERE `pd_pages_PARENT` IS NULL");
					echo '<h3>Parent</h3>'
					    .'<select>'
					    .'<option value="">Please select</value>';
								foreach($sql->results() as $data) {
									echo '<option value="'. $data->pd_pages_ID.'"'; 
										 if ( $data->pd_pages_ID == $pageParentID ) { echo " selected"; }
									echo '>'
										 . $data->pd_pages_TITLE 
										 .'</object>';
								}
					echo '</select>';

					$sqlCat = DB::getInstance()->query("SELECT * from `pd_CATEGORIES`");
					echo '<h3>Category</h3>'
					    .'<select>';
								foreach($sqlCat->results() as $dataCat) {
									echo '<option value="'. $dataCat->pd_categories_ID.'"';
										if ( $dataCat->pd_categories_ID == $pageCategory ) { echo " selected"; }
									echo '>'. $dataCat->pd_categories_TITLE;
									$catID = $dataCat->pd_categories_ID;
									$sqlCOUNT = DB::getInstance()->query("SELECT * from `pd_PAGES` WHERE `pd_pages_CATEGORY` = '$catID'");
									echo ' (' . $sqlCOUNT->count() . ') ' . '</object>';
								}
					echo '</select>';
					
		   echo '</div>
		  
</div>';


//-----------------------------------------------------
// FOOTER
//-----------------------------------------------------
	 
$footer = new footer();
echo $footer->footer;