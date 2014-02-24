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

	// NAV
	echo $template->nav();



//-----------------------------------------------------
// BODY
//-----------------------------------------------------

echo '<div class="grid">
		<div class="row">
				<div class="slot-6">
						<h2>WIN</h2>
						<ul>';

						$sqlWin = DB::getInstance()->query('select * from comps');
						if ($sqlWin->count()) {
							foreach ($sqlWin->results() as $comp) {
								echo '<li><a href="editpage?id='.$comp->comps_ID.'">' . $comp->comps_TITLE . '</a></li>';
							}
						} else {
							echo 'No results';
						}
				  echo '<li class="createNew"><a href="">Create New</a></li>
				  		</ul>';

		  echo '</div>
				<div class="slot-7">
						<h2>WATCH</h2>
						<ul>';
						$sqlWatch = DB::getInstance()->query('select * from `watch`');
						if ($sqlWatch->count()) {
							foreach ($sqlWatch->results() as $watch) {
								echo '<li><a href="editpage?id='.$watch->watch_ID.'">' . $watch->watch_TITLE . '</a></li>';
							}
						} else {
							echo 'No results';
						}
				  echo '<li class="createNew"><a href="">Create New</a></li>
				  		</ul>';
		  
		  echo '</div>

				<div class="slot-8">
						<h2>GALLERY</h2>
						<ul>';
						$sql = DB::getInstance()->query('select * from `gallery_CATEGORIES`');
						if ($sql->count()) {
							foreach ($sql->results() as $galleries) {
									echo '<li><a href="editpage?id='.$galleries->gallery_categories_ID.'">' . $galleries->gallery_categories_TEXT . '</a></li>';
							}
						} else {
						 	echo 'No results';
						}
				  echo '<li class="createNew"><a href="">Create New</a></li>
				  		</ul>';
		  
		  echo '</div>
				<div class="slot-9">
						<h2>CREATE</h2>
						<ul>';
						$create = DB::getInstance()->query('select * from `create`');
						if ($create->count()) {
							foreach ($create->results() as $create) {
									echo '<li><a href="editpage?id='.$create->create_ID.'">' . $create->create_TITLE . '</a></li>';
							}
						} else {
						 	echo 'No results';
						}
				  echo '<li class="createNew"><a href="">Create New</a></li>
				  		</ul>';
		  
		  echo '</div>
		</div>
	
	</div>';


//-----------------------------------------------------
// FOOTER
//-----------------------------------------------------
	 
echo '</section>';
$footer = new footer();
echo $footer->footer;