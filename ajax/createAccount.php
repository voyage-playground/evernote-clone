<?php
/**
 * Created by PhpStorm.
 * User: Jaden Lemmon
 * Date: 2/11/16
 * Time: 5:59 PM
 */

use models\user;

$user = new user();

if($user->createAccount($data->username,$data->password1,$data->password2,$data->email1,$data->email2)) {
    echo 'success';
}
else {
    echo 'error';
}