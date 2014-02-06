<?php

class enterCompetition {
	
	public $sql;	

	 
	public function get($sectionName) {
		$sql = DB::getInstance()->query("select * from comps WHERE comps_ID = '$sectionName'");
		return $this->sql = $sql;
	}

 

	 // function __construct($sectionName) {
	 //  	$sql = DB::getInstance()->query("select * from comps WHERE comps_ID = '$sectionName'");
	  	
	 //  	if ($sql->count()) {
	 //  		foreach ($sql->results() as $section) {
		// 	 	$this->sectionNAME 	= $section->comps_DESCRIPTION;
		// 	 	return $section->comps_ID;
		// 	}
	 //  	} else {
	 //  		return false;
	 //  	}	  	
	 // }

	 public function getTitle() {
	 	return $this->sectionNAME;
	 }


	
}
