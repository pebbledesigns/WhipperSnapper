<?php
require_once 'core/init.php';

// e.g. get host in the config
//echo config::get('mysql/host');

// test DB connection
//$users = DB::getInstance()->query('SELECT username from users');

//$user = DB::getInstance()->get('members', array('username','=','dddddd'));
$user = DB::getInstance()->query('SELECT * from memberss');


//var_dump($user);

if (!$user->count()) {
	echo 'errors from index.php';
} else {
	 foreach ($user->results() as $user) {
	 	echo $user->password;
	}
}