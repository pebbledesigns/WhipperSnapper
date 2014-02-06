<?php
require_once 'core/init.php';

//Load the template into page
$template = new template;

// Load page scripts
echo $template->headerScripts();

//-----------------------------------------------------
// PAGE VARIABLES
//-----------------------------------------------------
?>


<?php
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

	echo'<form method="post" action="post.newWatch.php">
			<div class="row">
					<div class="slot-6-7-8-9">
							<label for="inputTitle">Title</label>
							<input name="inputTitle" type="text" class="required" required>
			  		</div>
			</div>

			<div class="row">
					<div class="slot-6-7">
							<label for="inputThumb">Thumb (.jpg)</label>
							<textarea name="inputThumb" class="required"></textarea>
			  		</div>
			  		<div class="slot-8-9">
							<label for="inputVideoSrc">Video Source (Youtube)</label>
							<textarea name="inputVideoSrc" class="required" placeholder="e.g. zkjfhdfhd"></textarea>
			  		</div>
			</div>

			

			<div class="row">
			  		<div class="slot-6-7">
							<label for="inputVideoType">Video Type</label>
							<select name="inputVideoType">
								<option value="">Please Select</option>
								<option value="1">Trailer</option>
								<option value="2">Episode</option>
							</select>
			  		</div>
			  		<div class="slot-8-9">
							<label for="inputPublished">Published</label>
							<select name="inputPublished">
								<option value="">No</option>
								<option value="1">Yes</option>
							</select>
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