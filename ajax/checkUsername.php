<?php
/**
 * Created by PhpStorm.
 * User: Jaden
 * Date: 2/11/16
 * Time: 9:21 PM
 */

use app\models\user;

$user = new user();

if($user->checkUsername($data->username)) {
    echo 'yes';
}
else {
    echo 'no';
}