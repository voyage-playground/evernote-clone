<?php
/**
 * Created by PhpStorm.
 * User: Jaden
 * Date: 3/10/16
 * Time: 9:31 PM
 */

namespace app\controllers;
use app\models\user as user;
use app\models\note;

class ajax {

    var $user;
    var $note;

    function __construct() {
        $this->user = new user();
        $this->note = new note();
    }

    function postData() {
        $postdata = file_get_contents("php://input");
        return json_decode($postdata);
    }

    function checkUserStatus() {
        if($this->user->isLoggedIn()){
            echo 'yes';
        }
        else {
            echo 'no';
        }
    }
    function addNewNote() {
        $data = $this->postData();

        if($this->note->addNote($data->title,$data->content)) {
            echo 'success';
        }
        else {
            echo 'error';
        }
    }
    function checkUsername() {
        $data = $this->postData();

        if($this->user->checkUsername($data->username)) {
            echo 'yes';
        }
        else {
            echo 'no';
        }
    }
    function createAccount() {
        $data = $this->postData();

        if($this->user->createAccount($data->username,$data->password1,$data->password2,$data->email1,$data->email2)) {
            echo 'success';
        }
        else {
            echo 'error';
        }
    }
    function deleteNote() {
        $data = $this->postData();

        if($this->note->deleteNote($data->id)) {
            echo 'success';
        }
        else {
            echo 'error';
        }
    }
    function getUserNotes() {
        echo json_encode($this->note->getUserNotes());
    }
    function getUserSharedNotes() {
        echo json_encode($this->note->getUserSharedNotes());
    }
    function getUserTrashedNotes() {
        echo json_encode($this->note->getUserNotes(true));
    }
    function login() {
        $data = $this->postData();

        if($this->user->logIn($data->username,$data->password)) {
            echo 'success';
        }
        else {
            echo 'error';
        }
    }
    function logout() {
        $this->user->logOut();
    }
    function restoreNote() {
        $data = $this->postData();
        $this->note->deleteNote($data->id, false);
    }
    function shareNote() {
        $data = $this->postData();

        if($this->note->shareNote($data->username,$data->noteID)) {
            echo 'success';
        }
        else {
            echo 'error';
        }
    }
    function unReadNotes() {
        if($this->note->unReadNotes() == 1) {
            echo 'yes';
        }
        else {
            echo 'no';
        }
    }
    function updateNote() {
        $data = $this->postData();

        $note = new note();

        header('Content-Type: application/json');
        echo json_encode($note->updateNote($data->id,$data->content,$data->title));
    }
}