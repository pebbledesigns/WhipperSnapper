<?php 
require_once 'DB.php';

class UserService
{
    protected $_email;    // using protected so they can be accessed
    protected $_password; // and overidden if necessary

    protected $_user;     // stores the user data

    public function __construct($email, $password) 
    {
       $this->_email = $email;
       $this->_password = $password;
    }

    public function login()
    {
        $user = $this->_checkCredentials();
        if ($user) {
            $this->_user = $user; // store it so it can be accessed later
            $_SESSION["user_id"] = $user;
            return $user;
        }
        return false;
    }

    protected function _checkCredentials()
    {
        $sql = DB::getInstance()->query("SELECT * from `pd_MEMBERS` WHERE `pd_members_ID` = '1'");

        if ($sql->results() > 0) {

            foreach($sql->results() as $data) {
            	$user = $data->pd_members_USERNAME;
            }
            return $user;

            // $submitted_pass = sha1($user['salt'] . $this->_password);
            // if ($submitted_pass == $user['password']) {
            //     return $user;
            // }
        } else {
        	return false;
        }
    }

    public function getUser()
    {
        return $this->_user;
    }
}



// $userService = new UserService($pdo, $_POST['email'], $_POST['password']);
// if ($user_id = $userService->login()) {
//     echo 'Logged it as user id: '.$user_id;
//     $userData = $userService->getUser();
//     // do stuff
// } else {
//     echo 'Invalid login';
// }