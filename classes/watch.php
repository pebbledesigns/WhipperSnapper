<?php
/*----------------------
Get the list of competitions
------------------------*/

class watch {
	
	public $sectionID;	

	public function getWatch() {
	  	$sql = DB::getInstance()->query('select * from watch');
	  	
	  	if ($sql->count()) {
	  		$x = 6;
	  		echo '<div class="row contentRow">';
	  		foreach ($sql->results() as $watch) {
			 	echo '
			 			<div class="slot-'.$x.' contentIndex">
								<a class="fancybox-media watchVideos clearfix" href="http://www.youtube.com/watch?v='.$watch->watch_SRC.'" >';
				 			 		if( isset($watch->watch_TYPE) && !is_null($watch->watch_TYPE) ) {
				 			 			switch ($watch->watch_TYPE) {
				 			 				case "1":
				 			 					echo '<span class="tag">EPISODE</span>';
				 			 				break;
				 			 				case "2":
				 			 					echo '<span class="tag">TRAILER</span>';
				 			 				break;
				 			 			}
				 			 		}
				 			  echo '<img src="' . config::get("url/baseurl") . 'images/watch/' .$watch->watch_THUMB. '" />
				 			 		<span class="description">'.$watch->watch_TITLE.'</span>
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