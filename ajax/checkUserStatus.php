<?php
/**
 * Created by PhpStorm.
 * User: epsokc
 * Date: 2/11/16
 * Time: 2:19 PM
 */

require_once dirname(dirname(__FILE__)). '/models/user.php';

$user = new user();

if($user->isLoggedIn()){
    echo 'yes';
}
else {
    echo 'no';
}