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
echo $template->header('<span class="fa fa-th-large"></span> Regions');



	//-----------------------------------------------------
	// BODY
	//-----------------------------------------------------

echo '<div id="bodyContent">
			<div class="row">
				<div class="module Page leftmodule">
					<h2>Regions...
					</h2>';

					echo '<ul class="moduleList">'
						.'<li class="row header">'
							.'<div class="slot-0-1">REGIONID</div>'
							.'<div class="slot-2">PAGES</div>'
							.'<div class="slot-3">TYPE</div>'
							.'<div class="slot-4">CONTROLS</div>'
						.'</li>';
					$regions = new regions();
					
					if ($regions->count > 0) {
						
						// Count how many pages
						//$regions->setCountPages($region->pd_regions_PAGEID) . $regions->getCountPages()
						
						$countPages = $regions->regionCount;

						foreach($regions->data as $region) {
							echo '<li class="row">'
								.'<div class="slot-0-1">'.$region->pd_regions_REGIONID.'</div>'
								.'<div class="slot-2">'.$regions->setCountRegions($region->pd_regions_REGIONID) . $regions->getCountRegions().'</div>'
								.'<div class="slot-3">'.$regions->setType($region->pd_regions_TYPE). $regions->getType() . '</div>'
								.'<div class="slot-4">
									<a href="#" title="View">	
										<i class="fa fa-eye pageLinks"></i>
									</a>
									<a href="#" title="Delete"> 
										<i class="fa fa-trash-o pageLinks"></i>
									</a>
								</div>'
								.'</li>';
						}
					} else {
						echo 'No results';
					}
					echo '</ul>';
			echo '</div>
			<div class="module rightmodule">
					<h2>How To Use</h2>
			</div>
</div>';


//-----------------------------------------------------
// FOOTER
//-----------------------------------------------------
	 
$footer = new footer();
echo $footer->footer;