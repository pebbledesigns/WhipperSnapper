<?php


	class loadModule {
		
		public $path;
		public $data = array();
		public $items = array();
		public $count = 0;

		public function __construct($path) 
		{

			$path = realpath($path);
			$x = 0;
			foreach (glob($path . "/*", GLOB_ONLYDIR) as $filename) 
			{
			    $this->items[] = $filename;
			    $this->count = $x;
			    $x++;
			}
		}

		public function getModuleList() {
			foreach ($this->items as $filename) {
			     $this->data[] = simplexml_load_file($filename . "/config.xml");
			}
			return $this->data;
		}

		public function count() {
			return $this->count;
		}

	}

// $module = new loadModule('/Users/denzel2364/Dropbox/htdocs/OOP-Framework/modules');

// $path = '/Users/denzel2364/Dropbox/htdocs/OOP-Framework/modules';
// $items = array();
// foreach (glob($path . "/*", GLOB_ONLYDIR) as $filename) {
//     $items[] = $filename;
// }

// foreach($items as $data) {
//      $xml=simplexml_load_file($data . "/config.xml");
//      echo $xml->db_table;
// }