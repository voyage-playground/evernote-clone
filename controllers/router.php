<?php
/**
 * Created by PhpStorm.
 * User: Jaden
 * Date: 2/12/16
 * Time: 6:41 PM
 */

class router {

    function __construct() {
    }

    static function parseURL() {
        $requestUrl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $requestString = substr($requestUrl, strlen(0));

        return $urlParams = explode('/', $requestString);
    }
}