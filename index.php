<?php
require_once dirname(__FILE__) . '/vendor/autoload.php';

session_start();

require_once 'routes.php';

//$url = router::parseURL();
//
//if($url[3] == 'ajax') {
//    $postdata = file_get_contents("php://input");
//    $data = json_decode($postdata);
//    require_once 'ajax/'.$url[4].'.php';
//}
//else {
//    require_once 'home.php';
//}