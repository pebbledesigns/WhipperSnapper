<?php
require_once 'core/init.php';

//Load the template into page
$template = new template;

// Load page scripts
echo $template->headerScripts();

//-----------------------------------------------------
// BODY
//-----------------------------------------------------

echo '
<div id="loginBox">
	<h2>User Login</h2>
	<input type="text" placeholder="User" style="background-color: transparent;" />
	<input type="password" placeholder="******" style="background-color: transparent;" />
	<input type="submit" value="Sign In" class="btn_signin" />
</div>
<div id="loginbox">&copy; '.date('Y').' Pebble Designs</div>
';

$userService = new UserService('email', 'password');
if ($user_id = $userService->login()) {
    echo 'Logged it as user id: '.$user_id;
    $userData = $userService->getUser();
    // do stuff
} else {
    echo 'Invalid login';
}

//$sql = DB::getInstance()->query("SELECT * from `pd_MEMBERS`");


//-----------------------------------------------------
// FOOTER
//-----------------------------------------------------
	 
$footer = new footer();
//echo $footer->footer;