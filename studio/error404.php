<?php
require_once 'core/init.php';

//Load the template into page
$template = new template;

// Load page scripts
echo $template->headerScripts();


//-----------------------------------------------------
// HEADER
//-----------------------------------------------------

// LH COLUMN
echo $template->lhcolumn();

// LH COLUMN
echo $template->header('<span class="fa fa-exclamation"></span> ERROR 404!');

//-----------------------------------------------------
// BODY
//-----------------------------------------------------




echo '<div id="bodyContent">
			<div class="row" style="text-align: center; font-size: 3REM; color: #aaa; font-weight: 300;">
				<img src="images/404.png" width="528" width="334" /><br />
				Oops! - Nothing here i\'m afraid!
			</div>';
echo '</div>';


//-----------------------------------------------------
// FOOTER
//-----------------------------------------------------
	 
$footer = new footer();
echo $footer->footer;