<?php 
session_start();
ob_start();

$_SESSION['agegate'] = $_GET['ageGate'];





if (isset($_GET['referrer'])) {
	$dir = 'Location: ' . $_GET['referrer'];
	header($dir);
} else {
	//header('Location: win.php');
	echo $_SESSION['agegate'];
}


?>