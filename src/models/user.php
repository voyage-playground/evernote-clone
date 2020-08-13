<?php
/**
 * Created by PhpStorm.
 * User: Jaden Lemmon
 * Date: 2/11/16
 * Time: 1:09 PM
 */

namespace app\models;
//use app\models\model;
//use app\models\model as model;

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

    /**
     * @param $username
     * @return bool
     *
     * Checks to see if a username is available
     */
    public function checkUsername($username) {
        $r = $this->db->query(" SELECT COUNT(DISTINCT username) AS username FROM users where username = :username",array
        ('username'=>$username));
        $result = $r[0]['username'];

        if($result == 0) return true;
        return false;
    }

    /**
     * @param $username
     * @return mixed
     *
     * Get's a username from user id
     */
    public function getIDFromUsername($username) {
        $r = $this->db->query("SELECT id from users where username = :username",array
        ('username'=>$username));

        return $r[0]['id'];
    }
}