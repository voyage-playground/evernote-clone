<?php

/**
 * Created by PhpStorm.
 * User: epsokc
 * Date: 2/11/16
 * Time: 1:09 PM
 */

namespace models;

class model
{
    var $db;

    function __construct() {
        $this->db = new DB();
    }
}