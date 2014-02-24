<?php

	class pages {
		public $results = array();
		public $childresult = array();

		public function setPageList() {
			$sql = DB::getInstance()->query("SELECT * from `pd_PAGES` WHERE `pd_pages_PARENT` IS NULL");

			foreach($sql->results() as $data) {
				$this->results[] = $data;
			}
		}
		public function getPageList() {
			return $this->results;
		}

		public function setPageChildList($parent) {
			$sql = DB::getInstance()->query("SELECT * from `pd_PAGES` WHERE `pd_pages_PARENT` = '$parent'");
			$this->childresult = array();
			foreach($sql->results() as $childdata) {
				$this->childresult[] = $childdata;
			}
		}
		public function getPageChildList() {
			return $this->childresult;
		}

	}