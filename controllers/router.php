<?php
/**
 * Created by PhpStorm.
 * User: Jaden
 * Date: 2/12/16
 * Time: 6:41 PM
 */

namespace app\controllers;

class router {

    //static $urlParams;

    function __construct() {
    }

    static function parseURL() {
        $requestUrl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $requestString = substr($requestUrl, strlen(0));
        $urlParams = explode('/', $requestString);
        //self::$urlParams = $urlParams;
        return $urlParams;
    }

    static function route($path,$callback) {
        $url = self::parseURL();
        $path2 = $url[3].'/'.$url[4];
        //echo $path;
        //print_r($url);
        if($path == $path2) {
            $callback();
        }
    }
}