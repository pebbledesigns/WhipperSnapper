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
echo $template->header('<span class="fa fa-files-o"></span> New Page');

//-----------------------------------------------------
// BODY
//-----------------------------------------------------




echo '<div id="bodyContent">
				<div class="module leftmodule">
					<h2>Insert a new page</h2>

					<input type="text" placeholder="Title" />

					<div class="wysiwigControls">' 
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
					<div id="editor" contenteditable>
					</div>
					<textarea id="textarea" style="display: none;"></textarea>

					<h2>Regions</h2>
			  	</div>';
		  echo '<div class="module rightmodule">
					<h2>Page Controls</h2>
					<select>
						<option value="1">Draft</option>
						<option value="2">Publish</option>
					</select>';

					$sql = DB::getInstance()->query("SELECT * from `pd_PAGES` WHERE `pd_pages_PARENT` IS NULL");
					echo '<h3>Parent</h3>'
					    .'<select>'
						    	.'<option value="">Please select</option>';
								foreach($sql->results() as $data) {
									echo '<option value="'. $data->pd_pages_ID .'">'. $data->pd_pages_TITLE .'</object>';
								}
					echo '</select>';

					$sqlCat = DB::getInstance()->query("SELECT * from `pd_CATEGORIES`");
					echo '<h3>Category</h3>'
					    .'<select>';
								foreach($sqlCat->results() as $dataCat) {
									echo '<option value="'. $dataCat->pd_categories_ID .'">'. $dataCat->pd_categories_TITLE;
									$catID = $dataCat->pd_categories_ID;
									$sqlCOUNT = DB::getInstance()->query("SELECT * from `pd_PAGES` WHERE `pd_pages_CATEGORY` = '$catID'");
									echo ' (' . $sqlCOUNT->count() . ') ' . '</object>';
								}
					echo '</select>';
					
		   echo '</div>';
		   echo '<div class="module rightmodule">
					<h2>SEO<a href="#"><i class="moduleControl fa fa-angle-down"></i></a></h2>
					<div class="moduleContent">
						<select>
							<option value="1">Draft</option>
							<option value="2">Publish</option>
						</select>';

						$sql = DB::getInstance()->query("SELECT * from `pd_PAGES` WHERE `pd_pages_PARENT` IS NULL");
						echo '<h3>Parent</h3>'
						    .'<select>'
						    	.'<option value="">Please select</option>';
									foreach($sql->results() as $data) {
										echo '<option value="'. $data->pd_pages_ID .'">'. $data->pd_pages_TITLE .'</object>';
									}
						echo '</select>';

						$sqlCat = DB::getInstance()->query("SELECT * from `pd_CATEGORIES`");
						echo '<h3>Category</h3>'
						    .'<select>';
									foreach($sqlCat->results() as $dataCat) {
										echo '<option value="'. $dataCat->pd_categories_ID .'">'. $dataCat->pd_categories_TITLE;
										$catID = $dataCat->pd_categories_ID;
										$sqlCOUNT = DB::getInstance()->query("SELECT * from `pd_PAGES` WHERE `pd_pages_CATEGORY` = '$catID'");
										echo ' (' . $sqlCOUNT->count() . ') ' . '</object>';
									}
						echo '</select>
					</div>';
		   echo '</div>
		   
</div>';


//-----------------------------------------------------
// FOOTER
//-----------------------------------------------------
	 
$footer = new footer();
echo $footer->footer;