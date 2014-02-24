<?php
require_once 'core/init.php';

//Load the template into page
$template = new template;

// Load page scripts
echo $template->headerScripts();

//-----------------------------------------------------
// PAGE VARIABLES
//-----------------------------------------------------
$page = 'admin';
?>


<?php
//-----------------------------------------------------
// HEADER
//-----------------------------------------------------

// LH COLUMN
echo $template->lhcolumn();

// LH COLUMN
echo $template->header('<span class="fa fa-th-large"></span> Regions <a href="newPage.php" class="pagesNewbtn">New</a>');

//-----------------------------------------------------
// BODY
//-----------------------------------------------------




echo '<div id="bodyContent">
			<div class="row">
				<div class="module leftmodule">
					<h2>Page / Regions Tree</h2>

					<div class="grid userList" style="padding: 2REM;">';
					
					// Query
					$pages = new pages();
					$pages->setPageList();

					
					echo '<ul class="documentTree">';
					foreach($pages->getPageList() as $data) {
						// Parent
						echo '<li>';
						
						echo '&#8212; <i class="fa fa-file-o"></i> '.
							// Get publish state
							$publishState = ($data->pd_pages_PUBLISH == '1' ? '  <span class="pagesDraft">Draft</span>' : '')
							. '&nbsp;&nbsp;' . '<a href="editPage.php?id='.$data->pd_pages_ID.'" class="pageLink"><strong>'. $data->pd_pages_TITLE . '</strong></a>'
							;
						$pageid = $data->pd_pages_ID; 
	        		 	
	        		 	$regions = new regions;
						$regions->setPageRegions($pageid);

						//print_r($regions->getPageRegions());
	        		 	//print_r($regions);
						if($regions->getPageRegions() > 0) {
							echo '<ul class="childPage">';
							foreach($regions->getPageRegions() as $dataChild) {
								echo '<li>⌊ <i class="fa fa-th-large"></i>
										'.$dataChild->pd_regions_REGIONID.'
										
									 &nbsp;&nbsp;<a href="editPage.php?id="></a>'
									 . '<a href="#"><i class="fa fa-eye pageLinks" title="View Page"></i></a>' // PREVIEW
									 . '<a href="#"><i class="fa fa-trash-o pageLinks" title="Delete"></i></a>' // DELETE
									 . '</li>';
							}
							echo '</ul>';
						}

						echo '</li>';
					}
					echo '<ul>';
				echo '</div><a href="#ex1" rel="modal:open">Open Modal</a>';
					
		  echo '</div>
				<div class="module rightmodule">
					<h2>Categories</h2>
					<ul>';
					$sql = DB::getInstance()->query("SELECT * from `pd_CATEGORIES`");
					foreach($sql->results() as $data) {	
						echo '<li>'. $data->pd_categories_TITLE;
								$catID = $data->pd_categories_ID;
								$sqlCOUNT = DB::getInstance()->query("SELECT * from `pd_PAGES` WHERE `pd_pages_CATEGORY` = '$catID'");
						echo ' (' . $sqlCOUNT->count() . ') ' .
						     '</li>';
					}
			   echo '</ul>
				</div>
			</div>
</div>';


//-----------------------------------------------------
// FOOTER
//-----------------------------------------------------
	 
$footer = new footer();
echo $footer->footer;