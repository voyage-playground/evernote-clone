<?php
/**
 * Created by PhpStorm.
 * User: epsokc
 * Date: 2/11/16
 * Time: 1:09 PM
 */

require_once 'model.php';

class user extends model {

    function __construct() {
        parent::__construct();
    }

    /**
     * @param $username
     * @param $password
     * @return bool
     *
     * Log's a user in
     */
    public function logIn($username,$password) {
        //$password = md5($password);
        $r = $this->db->query("SELECT id, username, password FROM users
                    WHERE username = :username AND password = :password", array
        ('username'=>$username, "password"=>$password));

        if($r[0]['username'] == $username) {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $r[0]['id'];
            return true;
        }
        return false;
    }

    public function logOut() {
        session_start();
        session_destroy();
    }

    /**
     * @return bool
     *
     * Checks if a user is already logged in
     */
    public function isLoggedIn() {
        if($_SESSION['username']) {
            return true;
        }
        else {
            return false;
        }
    }
}