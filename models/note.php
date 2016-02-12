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

    /**
     * @param $title
     * @param $content
     * @return bool
     *
     * Add's a new note for a user
     */
    public function addNote($title,$content) {
        $this->db->query("INSERT INTO notes (userID, content, title) VALUES (:userID, :content, :title)", array
        ('userID'=>$_SESSION['id'], "content"=>$content, "title"=>$title));
        return true;
    }

    /**
     * @param $id
     * @return bool
     *
     * Delete's a note for a user
     */
    public function deleteNote($id) {
        //$this->db->query("DELETE FROM notes where userID = :userID AND id = :id", array('userID'=>$_SESSION['id'], "id"=>$id));
        $this->db->query("UPDATE notes set trashed = 1 where userID = :userID AND id = :id", array('userID'=>$_SESSION['id'], "id"=>$id));
        return true;
    }

    /**
     * @param $id
     * @param $title
     * @param $content
     * @return bool
     *
     * Updates a user's note
     */
    public function updateNote($id,$content,$title) {
        $this->db->query("UPDATE notes set title=:title,content=:content where id=:id AND userID=:userID", array('title' => $title, 'content' => $content, 'id'=>$id, 'userID'=>$_SESSION['id']));
        return true;
    }

    /**
     * @param bool $trashed
     * @return mixed
     *
     * Get's the notes for a specific user. Trashed gets deleted notes.
     */
    public function getUserNotes($trashed = false) {
        if($trashed) {
            $trashed = 1;
        }
        else {
            $trashed = 0;
        }
        $r = $this->db->query("SELECT * FROM notes
                    WHERE userID = :userID AND trashed = :trashed", array('userID'=>$_SESSION['id'], 'trashed' => $trashed));
        return $r;
    }
}