<?php 

class footer {
		
		public $footer;

		public function __construct($scripts=null, $ID=NULL) {
			
			

			$this->footer = '
			</div><!- .grid ->
			<div class="footer-container">
	            <footer class="grid">
	                <div class="row">
	                	<div class="slot-0-1"><img src="'. config::get('url/baseurl') .'images/footer1.png" /></div>
	                	<div class="slot-2-3"><img src="'. config::get('url/baseurl') .'images/footer2.png" /></div>
	                	<div class="slot-4-5"><img src="'. config::get('url/baseurl') .'images/footer3.png" /></div>
	                </div>
	                <div class="row">
	                	<div class="slot-0-1"><span style="font-size: 2REM; color: #aaa;">KEEPING KIDS ENTERTAINED</span></div>
	                	<div class="slot-2-3">
	                		<ul class="footerNav">
	                			<li><a href="'. config::get('url/baseurl') .'watch.php" />WATCH</a></li>
	                			<li><a href="'. config::get('url/baseurl') .'win.php" />WIN</a></li>
	                			<li><a href="'. config::get('url/baseurl') .'create.php" />CREATE</a></li>
	                			<li><a href="'. config::get('url/baseurl') .'gallery.php" />GALLERY</a></li>
	                			<li><a href="#" />TERMS</a></li>
	                			<li><a href="#" />PRIVACY POLICY</a></li>
	                		</ul>
	                	</div>
	                	<div class="slot-4-5" style="text-align: right;"><copyright>&copy; 2013 Whipper Snapper Media. All Rights Reserved.</copyright></div>
	                </div>
	            </footer>
	        </div>
	        <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet" type="text/css">
	        <link rel="stylesheet" href="'. config::get('url/baseurl') .'styles/css/jquery.fancybox.css" type="text/css" media="screen and (min-width: 720px)">
	        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>	        
	  		

	 		<script src="'. config::get('url/baseurl') .'js/jquery.fancybox.js"></script>
	        <script src="'. config::get('url/baseurl') .'js/jquery.fancybox-media.js"></script>
	        <script src="'. config::get('url/baseurl') .'js/main.js"></script>
	        <script src="'. config::get('url/baseurl') .'js/jquery.uploadfile.min.js"></script>
			<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	        ';

	        // Load any custom scripts
	        if(isset($scripts)){
				$this->footer .= $scripts;
			}

			$this->footer .='
	        <script>
	        	var settings = {
						url: "'.config::get('url/baseurl').'upload.php?id='.$ID.'",
						method: "POST",
						allowedTypes:"jpg,png,gif,doc,pdf,zip",
						fileName: "myfile",
						multiple: false,
						onSuccess:function(files,data,xhr)
						{
							$("#status").html("<font color=\'green\'>Upload is success</font>");
							setTimeout( function() { 
									$(\'#success\').fadeIn();
									$(\'.ajax-file-upload\').fadeOut(); 
									$(\'.ajax-file-upload-statusbar\').fadeOut();
									$(\'#status\').fadeOut();
									var getFilename = $(\'.ajax-file-upload-filename\').text();
									$(\'#uploadedFile\').val(getFilename);
							}, 2000);
							
						},
						onError: function(files,status,errMsg)
						{		
							$("#status").html("<font color=\'red\'>Upload is Failed</font>");
						}
					}
					$("#mulitplefileuploader").uploadFile(settings);

	        </script>
	        <script>
	            var _gaq=[[\'_setAccount\',\'UA-XXXXX-X\'],[\'_trackPageview\']];
	            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	            g.src=\'//www.google-analytics.com/ga.js\';
	            s.parentNode.insertBefore(g,s)}(document,\'script\'));
	        </script>
			';
		}




}