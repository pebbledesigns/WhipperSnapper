<?php
/*----------------------
Get the list of competitions
------------------------*/

class gallery {
	
	public $sectionID;	

	public function getGallerySections() {
	  	$sql = DB::getInstance()->query('select * from `gallery_CATEGORIES`');
	  	
	  	if ($sql->count()) {
	  		$x = 6;
	  		echo '<div class="row contentRow">';
	  		foreach ($sql->results() as $gallery) {
			 	echo '
			 			<div class="slot-'.$x.' contentIndex">
								<a href="gallery_item.php?id='.$gallery->gallery_categories_ID.'" >
				 			 		<img src="' . config::get("url/baseurl") . 'images/gallery/' .$gallery->gallery_categories_THMB. '" />
				 			 		<span class="description">'.$gallery->gallery_categories_TEXT.'</span>
				 			 	</a>
				 		</div>';

			 	if ($x == '9') {
			 		$x = 6;
			 		echo '</div>
			 			<div class="row contentRow">
			 			 <div class="slot-'.$x.'">';
			 	} else {
			 		$x++;
			 	}
			}
	  	} else {
	  		return false;
	  	}	  	
	}

	public function getGalleryEntries() {
	  	$sql = DB::getInstance()->query('select * from `gallery_ENTRIES`');
	  	
	  	if ($sql->count()) {
	  		$x = 6;
	  		echo '<div class="row contentRow">';
	  		foreach ($sql->results() as $gallery) {
			 	echo '
			 			<div class="slot-'.$x.' contentIndex">
								<a class="fancybox" rel="gallery1" title="'.$gallery->gallery_entries_NAME.'" href="' . config::get("url/baseurl") . 'images/gallery/large/'. $gallery->gallery_entries_LARGE. '">
				 			 		<img src="' . config::get("url/baseurl") . 'images/gallery/thumbs/' . $gallery->gallery_entries_THUMB. '" />
				 			 		<span class="description">'.$gallery->gallery_entries_NAME.'</span>
				 			 	</a>
				 		</div>';

			 	if ($x == '9') {
			 		$x = 6;
			 		echo '</div>
			 			<div class="row contentRow">
			 			 <div class="slot-'.$x.'">';
			 	} else {
			 		$x++;
			 	}
			}
	  	} else {
	  		return false;
	  	}	  	
	}
	
}