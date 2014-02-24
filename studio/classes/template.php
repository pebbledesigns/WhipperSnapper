<?php


class template {
	
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
			<link rel="stylesheet" href="'. config::get('url/baseurl') .'styles/css/font-awesome.css" type="text/css">
			<link rel="stylesheet" href="'. config::get('url/baseurl') .'styles/css/avgrund.css" type="text/css">
		</head>
		<body>';
	}

	public function header($title = 'Dashboard') {
		return '
			<header>
				<h1 class="title">'.$title.'</h1>
				<div id="rhControls">
					<a class="fa fa-plus-circle" href="" title="Add User"></a>
					<a class="fa fa-cog" href="" title="Settings"></a>
				</div>
			</header>

		';
	}

	public function lhcolumn($currentpage=null) {
		$lhcolumn = '<section id="wrapper">
						<aside id="lhcolumn">
							<div id="" style="background: #1382b7; height: 80px; width: 100%;"></div>
							<nav>
								<ul>
									<li><a href="pages.php"><span class="fa fa-files-o"></span> Pages</a></li>';
									$module = new loadModule(config::get('url/absolute') . "/modules");
									if ($module->count > 0) {
										foreach($module->getModuleList() as $child) {
											$lhcolumn .= '<li><a href="pages.php"><span class="fa '.$child->pageIcon.'"></span>'.$child->moduleName.'</a></li>';
										}
									} 
				  $lhcolumn .= '</ul>
							</nav>
							
							<h2 class="sectionTitle"> Settings </h2>
							<nav>
								<ul>
									<li><a href="users.php"><span class="fa fa-users"></span> Users</a></li>
									<li><a href="modules.php"><span class="fa fa-sitemap"></span> Modules</a></li>
									<li><a href="regions.php"><span class="fa fa-th-large"></span> Regions</a></li>
									<li><a href=""><span class="fa fa-star"></span> Menu 4</a></li>
								</ul>
							</nav>

							<div id="asideFooter">&copy; '.date('Y').' Pebble Designs</div>



						</aside>

			';
			return $lhcolumn;

	}




}