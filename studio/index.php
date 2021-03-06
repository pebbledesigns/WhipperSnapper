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
echo $template->header();

//-----------------------------------------------------
// BODY
//-----------------------------------------------------

echo '<div id="bodyContent">
			<div class="row">
				<div class="module slot-0-1-2">
					<h2>Example title</h2>
					<ul>
						<li>Example content 1</li>
						<li>Example content 2</li>
						<li>Example content 3</li>
					</ul>
				</div>
				<div class="module slot-3-4-5">
					<h2>Example title 2</h2>
					<ul>
						<li>Example content 1</li>
						<li>Example content 2</li>
						<li>Example content 3</li>
					</ul>
				</div>
			</div>
</div>';

    

    $module = new loadModule(config::get('url/absolute') . "/modules");
					if ($module->count > 0) {
						foreach($module->getModuleList() as $child) {
							echo '<li class="row">'
								.'<div class="slot-10"><i class="fa '.$child->pageIcon.'"></i> '.$child->moduleName.'</div>'
								.'<div class="slot-11-12">'.$child->moduleDescription.'</div>'
								.'<div class="slot-13">'.$child->version.'</div>'
								.'<div class="slot-14">'.$child->db_table.'</div>'
								.'<div class="slot-15">'.$child->db_table.'</div>'
								.'</li>';
						}
					} 


//-----------------------------------------------------
// FOOTER
//-----------------------------------------------------
	 
$footer = new footer();
//echo $footer->footer;