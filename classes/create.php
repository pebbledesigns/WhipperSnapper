<?php
/*----------------------
Get the list of competitions
------------------------*/

class create {
	
	public $sectionID;	

	public function getCreate() {
	  	$sql = DB::getInstance()->query('select * from `create`');
	  	
	  	if ($sql->count()) {
	  		$x = 6;
	  		echo '<div class="row contentRow">';
	  		foreach ($sql->results() as $create) {
			 	echo '
			 			<div class="slot-'.$x.' contentIndex">
								<a href="create_item.php?id='.$create->create_ID.'" >
				 			 		<img src="' . config::get("url/baseurl") . 'images/create/' .$create->create_THUMB. '" />
				 			 		<span class="description">'.$create->create_TITLE.'</span>
				 			 	</a>
				 		</div>';

			 	if ($x == '9') {
			 		$x = 6;
			 		echo '
			 			</div><div class="row contentRow">
			 			';
			 	} else {
			 		$x++;
			 	}
			}
	  	} else {
	  		return false;
	  	}	  	
	}


	public $compTitle;
	public $compDesc;
	
	public function getcompDescription() {
		return $this->compTitle = 'tets';
	}

	public function setCompetitionData($compid) {
		$sql = DB::getInstance()->query("select * from comps WHERE comps_ID = '1'");
		if($sql->count()) {
			foreach ($sql->results() as $compData) {
				$this->compDesc = $compData->comps_DESCRIPTION;
			}
		} else {
			echo 'no results';
		}
	}

	public function getCompetitionData() {
		return $this->compData;
	}
	
}