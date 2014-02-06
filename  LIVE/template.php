<?php


class template {
	
	public function getagegater() {
			if(isset($_SESSION['agegate']) && $_SESSION['agegate'] == 'younger') {
				return '<link rel="stylesheet" href="'. config::get('url/baseurl') .'styles/css/younger.css" type="text/css">';
			}
	}
	public function headerScripts($title = 'test') { 
		


		return '<!DOCTYPE html>
		<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
		<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
		<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
		<!--[if gt IE 8]><!--><html class="no-js"> <!--<![endif]-->
		<head>
	        <meta charset="utf-8">
	        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	        <title>'. language::getlang('title')  .'</title>
	        <meta name="description" content="">
	        <meta name="viewport" content="width=device-width">

	        <link rel="stylesheet" href="'. config::get('url/baseurl') .'styles/css/main.css">
	        <!--[if lt IE 9 ]><link rel="stylesheet" href="./css/720_grid.css" type="text/css"><![endif]-->
			<link rel="stylesheet" href="'. config::get('url/baseurl') .'styles/css/720_grid.css" type="text/css" media="screen and (min-width: 720px)">
			<link rel="stylesheet" href="'. config::get('url/baseurl') .'styles/css/986_grid.css" type="text/css" media="screen and (min-width: 986px)">
			'.$this->getagegater().'
	        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>';


	}

	public function advertBanner() {
		// This is where we add the banner code.
		if( config::get('filename') == 'index.php') {

			return '</head>
				    <body>
			        <!--[if lt IE 7]>
			            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
			        <![endif]-->
			        <header>
	        		<div id="advertBanner" style="overflow: hidden;">
						<a href="" class="closeAdvertBanner">X</a>
						<iframe style="margin-top: -28px" width="100%" height="400px" src="//www.youtube.com/embed/EtdxXZ8zJBU" frameborder="0" allowfullscreen></iframe>
					</div>';
		}

		
	}

	public function nav($currentpage=null) {
		// Master Navigation
		return '
			<div class="navWrapperBg">
				<div class="navwrapper grid">
					<ul class="nav row">
						<li class="slot-1"><a href="'. config::get('url/baseurl') .'win.php" id=\'nav_win\' >WIN</a></li>
						<li class="slot-2"><a href="'. config::get('url/baseurl') .'watch.php" id=\'nav_watch\' >WATCH</a></li>
						<li class="slot-3" id="logo"><img style="" height="55" src="'. config::get('url/baseurl') .'images/logo.png" /></li>
						<li class="slot-4"><a href="'. config::get('url/baseurl') .'create.php" id=\'nav_create\' >CREATE</a></li>
						<li class="slot-5"><a href="'. config::get('url/baseurl') .'gallery.php" id=\'nav_gallery\' >GALLERY</a></li>
					</ul>
				</div>
			</div><!- navwrapper ->
			</header>
		';
	}


}