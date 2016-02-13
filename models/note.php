<?php
/**
 * Created by PhpStorm.
 * User: Jaden Lemmon
 * Date: 2/11/16
 * Time: 10:35 AM
 */

require_once 'model.php';
require_once 'user.php';

class note extends model
{

    var $user;

    function __construct() {
        parent::__construct();

        $this->user = new user();
    }

    /**
     * @param $title
     * @param $content
     * @return bool
     *
     * Add's a new note for a user
     */
    public function addNote($title,$content) {
        $this->db->query("INSERT INTO notes (userID, content, title, lastUpdated) VALUES (:userID, :content, :title, :lastUpdated)", array
        ('userID'=>$_SESSION['id'], "content"=>$content, "title"=>$title, "lastUpdated" => date('Y-m-d G:i:s')));
        return true;
    }

    /**
     * @param $id
     * @param bool $trashed
     * @return bool
     *
     * Delete's or restores a note
     */
    public function deleteNote($id,$trashed = true) {
        if($trashed) {
            $trashed = 1;
        }
        else {
            $trashed = 0;
        }
        $this->db->query("UPDATE notes set trashed = :trashed where userID = :userID AND id = :id", array('trashed' => $trashed,'userID'=>$_SESSION['id'], "id"=>$id));
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
        $this->db->query("UPDATE notes set title=:title,content=:content,lastUpdated=:lastUpdated where id=:id", array('title' => $title, 'content' => $content, 'id'=>$id, 'lastUpdated' => date('Y-m-d G:i:s')));

        return $this->getNoteByID($id);
    }

    public function restoreNote($id) {

    }

    /**
     * @param $username
     * @param $noteID
     * @return bool
     *
     * Shares a note to another user
     */
    public function shareNote($username,$noteID) {
        $idToShareTo = $this->user->getIDFromUsername($username);

        $this->db->query("INSERT INTO shared_notes (noteID, sharedTo, sharedFrom) VALUES (:noteID, :sharedTo, :sharedFrom)", array
        ('noteID'=>intval($noteID), "sharedTo"=>$idToShareTo, "sharedFrom"=>$_SESSION['id']));

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
        $r = $this->db->query("SELECT id,content,title,unix_timestamp(dateAdded) as dateAdded,unix_timestamp(lastUpdated) as lastUpdated FROM notes
                    WHERE userID = :userID AND trashed = :trashed order by lastUpdated desc", array('userID'=>$_SESSION['id'], 'trashed' => $trashed));
        return $r;
    }

    /**
     * @param $id
     * @return mixed
     *
     * Get's a note by a specific id
     */
    public function getNoteByID($id) {
        return $this->db->query("SELECT id,content,title,unix_timestamp(dateAdded) as dateAdded,unix_timestamp(lastUpdated) as lastUpdated FROM notes
                    WHERE id=:id", array('id'=>$id));
    }

    /**
     * @return mixed
     *
     * Get's a users notes that have been shared to them
     */
    public function getUserSharedNotes() {
        $r = $this->db->query("select n.id, n.title, n.content, unix_timestamp(n.dateAdded) as dateAdded, unix_timestamp(n.lastUpdated) as lastUpdated, u.username, s.sharedFrom from notes n
        INNER JOIN shared_notes s on s.noteID = n.id
        INNER JOIN users u on u.id = s.sharedFrom
        where s.sharedTo = :userID order by n.lastUpdated desc", array('userID'=>$_SESSION['id']));
        return $r;
    }
}