<?php
require_once 'core/init.php';

//Load the template into page
$template = new template;

// Load page scripts
echo $template->headerScripts();

//-----------------------------------------------------
// PAGE VARIABLES
//-----------------------------------------------------
$compID = $_GET['id'];

$data = DB::getInstance()->query("select * from `comps` where comps_ID = 1");




//echo getData('gallery_categories_TEXT');


//-----------------------------------------------------
// HEADER
//-----------------------------------------------------

	// NAV
	echo $template->nav();



//-----------------------------------------------------
// BODY
//-----------------------------------------------------



echo '<div class="grid">';

	if (isset($_GET['success'])) {
		echo '<div class="message confirm">Success!</div>';
	}

	echo'<form method="post" action="post.newWin.php">
			<div class="row">
					<div class="slot-6-7-8-9">
							<label for="inputTitle">Title</label>
							<input name="inputTitle" type="text" class="required" value="'.$data->getData('comps_TITLE').'" required>
			  		</div>
			</div>

			<div class="row">
					<div class="slot-6-7">
							<label for="inputDescription">Description</label>
							<textarea name="inputDescription" class="required">'.$data->getData('comps_DESCRIPTION').'</textarea>
			  		</div>
			  		<div class="slot-8-9">
							<label for="inputInstructions">Entry Instructions</label>
							<textarea name="inputInstructions" class="required">'.$data->getData('COMPS_ENTRYINSTRUCTIONS').'</textarea>
			  		</div>
			</div>

			<div class="row">
					<div class="slot-6-7-8-9">
						<h2>TERMS AND CONDITIONS</h2>
						<hr />
					</div>
			</div>

			<div class="row">
					<div class="slot-6-7">
							<label for="inputDate">Closing Date</label>
							<input name="inputDate" type="date" class="required" required>
			  		</div>
			  		<div class="slot-8-9">
							<label for="inputWinnerText">Winner Text</label>
							<input name="inputWinnerText" type="text" class="required" value="'.$data->getData('comps_WINNERTEXT').'" required>
			  		</div>
			</div>

			<div class="row">
					<div class="slot-6-7">
							<label for="inputFirstPrize">First Prize</label>
							<textarea name="inputFirstPrize" class="required">'.$data->getData('comps_FIRSTPRIZE').'</textarea>
			  		</div>
			  		<div class="slot-8-9">
							<label for="inputRunnersUpPrize">Runners Up Prize(s)</label>
							<textarea name="inputRunnersUpPrize" class="required">'.$data->getData('comps_RUNNERSUPPRIZES').'</textarea>
			  		</div>
			</div>

			<div class="row">
					<div class="slot-6-7-8-9">
						<h2>IMAGES</h2>
						<hr />
					</div>
			</div>

			<div class="row">
					<div class="slot-0-1">
							<label for="inputBanner">Banner Image</label>
							<input name="inputBanner" type="text" class="required" value="'.$data->getData('comps_BANNERIMG').'" required>
			  		</div>
			  		<div class="slot-2-3">
							<label for="inputThumb">Thumbnail</label>
							<input name="inputThumb" type="text" class="required" value="'.$data->getData('comps_THUMBNAIL').'" required>
			  		</div>
			  		<div class="slot-4-5">
			  				<label>Select a gallery (optional)</label>
			  				<select name="selectGallery">
			  					<option value="">Please select</option>';
				  				$currentID = $data->getData('comps_GALLERYLINK');

				  				$sql = DB::getInstance()->query("select * from `gallery_CATEGORIES`");
								if ($sql->count()) {
									foreach ($sql->results() as $galleries) {
											echo '<option value="' .$galleries->gallery_categories_ID.'" ';
												if ($currentID ==  $galleries->gallery_categories_ID ) { echo 'selected = "selected"'; }
											echo '>' .$galleries->gallery_categories_TEXT. '</option>';
									}
								} else {
								 	echo 'No results';
								}
					echo '</select>
					</div>
			</div>

			<input type="submit" value="submit" />
		</form>


	
	</div>';


//-----------------------------------------------------
// FOOTER
//-----------------------------------------------------
	 
echo '</section>';
$footer = new footer();
echo $footer->footer;