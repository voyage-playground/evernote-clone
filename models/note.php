<?php
/**
 * Created by PhpStorm.
 * User: Jaden Lemmon
 * Date: 2/11/16
 * Time: 10:35 AM
 */

require_once 'model.php';

class note extends model
{

    function __construct() {
        parent::__construct();
    }

    public function addNote() {

    }

    /**
     * @return mixed
     *
     * Get's the notes for a specific user
     */
    public function getUserNotes() {
        $r = $this->db->query("SELECT * FROM notes
                    WHERE userID = :userID", array('userID'=>$_SESSION['id']);
        return $r[0];
    }
}