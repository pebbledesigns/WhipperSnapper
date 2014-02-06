<?php 

class footer {
		
		public $footer;

		public function __construct($scripts=null, $ID=NULL) {

			$this->footer = '
			</div><!- .grid ->
			<div class="footer-container">
	            <footer class="grid">
	                <div class="row">
	                	<div class="slot-6-7-8-9">
	                		&copy; Whipper Snapper '.date("Y").'
	                	</div>
	                </div>
	            </footer>
	        </div>';

	        
	        $this->footer .= '<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700" rel="stylesheet" type="text/css">';		// LOAD GOOGLE FONTS	        
	        $this->footer .= '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>';	      						// JQUERY  
	        $this->footer .= '<script src="'. config::get('url/baseurl') .'js/custom.js"></script>';												// CUSTOM JS
			$this->footer .= '<script src="'. config::get('url/baseurl') .'js/jquery.validate.js"></script>';			// jQUERY Validator
	        
	        if(isset($scripts)){  $this->footer .= $scripts;  }		// Load any custom scripts set by the page

		}




}