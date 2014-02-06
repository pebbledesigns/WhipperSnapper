<?php
/*----------------------
Get the list of competitions
------------------------*/

class agegate {
	
	
		public $agegate;

		public function __construct($choice) {
			$this->agegate = $choice;
		}

		public function getAgeGate() {
			return $this->agegate;
		}



	// public $sectionID;	

	// public function getCompetitions() {
	//   	$sql = DB::getInstance()->query('select * from comps');
	  	
	//   	if ($sql->count()) {
	//   		$x = 6;
	//   		echo '<div class="row contentRow">';
	//   		foreach ($sql->results() as $comp) {
	// 		 	echo '
	// 		 			<div class="slot-'.$x.' contentIndex">
	// 							<a href="competitions/enter.php?id='.$comp->comps_ID.'" >
	// 			 			 		<img src="' . config::get("url/baseurl") . 'images/win/competitions/' .$comp->comps_THUMBNAIL. '" />
	// 			 			 		<span class="description">'.$comp->comps_TITLE.'</span>
	// 			 			 	</a>
	// 			 		</div>';

	// 		 	if ($x == '9') {
	// 		 		$x = 6;
	// 		 		echo '</div>
	// 		 			<div class="row contentRow">
	// 		 			 <div class="slot-'.$x.'">';
	// 		 	} else {
	// 		 		$x++;
	// 		 	}
	// 		}
	//   	} else {
	//   		return false;
	//   	}	  	
	// }


	// public $compTitle;
	// public $compDesc;
	
	// public function getcompDescription() {
	// 	return $this->compTitle = 'tets';
	// }

	// public function setCompetitionData($compid) {
	// 	$sql = DB::getInstance()->query("select * from comps WHERE comps_ID = '1'");
	// 	if($sql->count()) {
	// 		foreach ($sql->results() as $compData) {
	// 			$this->compDesc = $compData->comps_DESCRIPTION;
	// 		}
	// 	} else {
	// 		echo 'no results';
	// 	}
	// }

	// public function getCompetitionData() {
	// 	return $this->compData;
	// }
	
}