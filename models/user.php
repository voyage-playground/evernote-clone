<?php
/**
 * Created by PhpStorm.
 * User: Jaden Lemmon
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
        $password = md5($password);
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

    /**
     * @param $username
     * @param $password1
     * @param $password2
     * @param $email1
     * @param $email2
     * @return bool
     *
     * Creates a new user account
     */
    public function createAccount($username,$password1,$password2,$email1,$email2) {
        if($password1 !== $password2 || $email1 !== $email2) return false;

        $password1 = md5($password1);

        $this->db->query("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)", array
        ('username'=>$username, "password"=>$password1, "email"=>$email1));

        return true;
    }

    /**
     * Log's out a user
     */
    public function logOut() {
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