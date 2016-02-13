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

    function parseURL() {
        $requestUrl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $requestString = substr($requestUrl, strlen($baseUrl));

        return $urlParams = explode('/', $requestString);

//        $controllerName = ucfirst(array_shift($urlParams)).'Controller';
//        $actionName = strtolower(array_shift($urlParams)).'Action';
//
//        print_r($urlParams);
    }
}