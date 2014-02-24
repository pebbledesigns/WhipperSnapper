<?php


	class regions {

		public $results = array();
		public $count;
		public $regionCount = 0;
		public $type;
		public $parentpage = array();

		public function __construct() {
			$sql = DB::getInstance()->query("SELECT * from `pd_REGIONS` GROUP BY `pd_regions_REGIONID`");
			$this->count = DB::getInstance()->count();
			$this->resutls = $sql->results();
		}


		public function _getRegions() {
			return $this->results;

		}

		public function setCountRegions($regionid=NULL) {
			$sql = DB::getInstance()->query("SELECT * from `pd_REGIONS` WHERE `pd_regions_REGIONID` = '$regionid'");
			if($sql->count() > 0) {
				$this->regionCount = $sql->count();
			} 
		}

		public function getCountRegions() {
			return $this->regionCount;
		}

		public function setType($type) {
			$type = DB::getInstance()->query("SELECT * from `pd_regions_TYPE` WHERE `pd_regions_type_ID` = '$type'");
			$type = array();
			foreach($type->results() as $type) {
				$this->type = $type->pd_regions_type_NAME;
			}
		}
		public function getType() {
			return $this->type;
		}

		public function setPageRegions($pageid) {
			$sql = DB::getInstance()->query("SELECT * from `pd_REGIONS` WHERE `pd_regions_PAGEID` = '$pageid'");
			$this->parentpage = $sql->results();
		}
		public function getPageRegions() {
			return $this->parentpage;
		}

	}


	// class pages {
	// 	public $results = array();
	// 	public $childresult = array();

	// 	public function setPageList() {
	// 		$sql = DB::getInstance()->query("SELECT * from `pd_PAGES` WHERE `pd_pages_PARENT` IS NULL");

	// 		foreach($sql->results() as $data) {
	// 			$this->results[] = $data;
	// 		}
	// 	}
	// 	public function getPageList() {
	// 		return $this->results;
	// 	}

	// 	public function setPageChildList($parent) {
	// 		$sql = DB::getInstance()->query("SELECT * from `pd_PAGES` WHERE `pd_pages_PARENT` = '$parent'");
	// 		$this->childresult = array();
	// 		foreach($sql->results() as $childdata) {
	// 			$this->childresult[] = $childdata;
	// 		}
	// 	}
	// 	public function getPageChildList() {
	// 		return $this->childresult;
	// 	}

	// }