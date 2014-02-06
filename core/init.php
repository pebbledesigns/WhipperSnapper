<?php
session_start();
ob_start();

$GLOBALS['config'] = array(
			'mysql' => array(
				'host' => 'localhost',
				'username' => 'root',
				'password' => 'root',
				'db' => 'whippersnapper'
			),
			'url' => array(
				'absolute' => '/Applications/MAMP/htdocs/whippersnapper/',
				'baseurl' => 'http://localhost:8888/whippersnapper/',
			),
			'session' => array(
			),
			'filename' => substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)
);

// Set config  to use the following: config::get('urls/absolute')
class config {
	public static function get($path = null) {
		if($path) {
			$config = $GLOBALS['config'];
			$path = explode('/', $path);

			foreach ($path as $bit) {
				if(isset($config[$bit])) {
					$config = $config[$bit];
				}
			}
			return $config;
		}
		return false;
	}

}

// register the use of not using 'new object()' e.g.
spl_autoload_register(function($class) {
	require_once config::get('url/absolute') . '/classes/' . $class . '.php'; 
});

function curPageURL() {
	 $pageURL = 'http';
	 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") {
	  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	 } else {
	  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	 }
	 return $pageURL;
}


if(!isset($_SESSION['agegate']) && config::get("filename") != 'index.php') {
	$urltopagegate = 'Location: ' . config::get("url/baseurl") . 'index.php' . '?referrer=';
	$currentURL = $urltopagegate . curPageURL();
	header($currentURL);
}

?>