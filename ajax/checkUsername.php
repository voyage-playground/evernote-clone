<?php
/**
 * Created by PhpStorm.
 * User: Jaden
 * Date: 2/11/16
 * Time: 9:21 PM
 */

require_once '../models/user.php';

$user = new user();

if($user->checkUsername($data->username)) {
    echo 'yes';
}
else {
    echo 'no';
}