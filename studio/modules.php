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
echo $template->header('<span class="fa fa-sitemap"></span> Installed Modules');



	//-----------------------------------------------------
	// BODY
	//-----------------------------------------------------

echo '<div id="bodyContent">
			<div class="row">
				<div class="module Page">
					<h2>Modules...
					</h2>';

					echo '<ul class="moduleList">'
						.'<li class="row">'
							.'<div class="slot-10">Name</div>'
							.'<div class="slot-11-12">Description</div>'
							.'<div class="slot-13">Version</div>'
							.'<div class="slot-14">DB Table</div>'
							.'<div class="slot-15">Installed</div>'
						.'</li>';
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
					echo '</ul>';
					

					
					
					  
					
			echo '</div>
</div>';


//-----------------------------------------------------
// FOOTER
//-----------------------------------------------------
	 
$footer = new footer();
echo $footer->footer;