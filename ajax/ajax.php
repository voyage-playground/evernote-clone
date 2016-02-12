<?php
/**
 * Ajax Controller
 */
session_start();

$postdata = file_get_contents("php://input");

$data = json_decode($postdata);

require_once $data->type.'.php';