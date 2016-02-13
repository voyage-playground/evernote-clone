<?php
/**
 * Created by PhpStorm.
 * User: epsokc
 * Date: 2/11/16
 * Time: 2:37 PM
 */

require_once dirname(dirname(__FILE__)).'/models/user.php';

$user = new user();

$user->logOut();