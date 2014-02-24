<?php 

class footer {
		
		public $footer;

		public function __construct($scripts=null, $ID=NULL) {

			$this->footer = '
			</section><!- .grid ->
			

			<div id="ex1" style="display:none;">
			    <p>Thanks for clicking.  That felt good.  <a href="#" rel="modal:close">Close</a> or press ESC</p>
			</div>

	        ';

	        
	        $this->footer .= '<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css">';			// LOAD GOOGLE FONTS	        
	        //$this->footer .= '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>';	      						// JQUERY  
	        $this->footer .= '<script src="'. config::get('url/baseurl') .'js/jquery-1.10.1.min.js"></script>';											// CUSTOM JS
	        $this->footer .= '<script src="'. config::get('url/baseurl') .'js/custom.js"></script>';											// CUSTOM JS
			$this->footer .= '<script src="'. config::get('url/baseurl') .'js/jquery.validate.js"></script>';			// jQUERY Validator
	        $this->footer .= '<script src="'. config::get('url/baseurl') .'js/jquery.modal.js"></script>';			// MODAL
	        if(isset($scripts)){  $this->footer .= $scripts;  }		// Load any custom scripts set by the page

		}




}