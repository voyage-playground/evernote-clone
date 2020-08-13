<?php
/**
 * Handles all the routing
 */

use app\controllers\router;
use app\controllers\ajax;

router::route('/',function() {
    require_once 'home.php';
});

//Ajax below
router::route('ajax/checkUserStatus',function() {
    $ajax = new ajax();
    $ajax->checkUserStatus();
});

router::route('ajax/addNewNote',function() {
    $ajax = new ajax();
    $ajax->addNewNote();
});

router::route('ajax/checkUsername',function() {
    $ajax = new ajax();
    $ajax->checkUsername();
});

router::route('ajax/createAccount',function() {
    $ajax = new ajax();
    $ajax->createAccount();
});

router::route('ajax/deleteNote',function() {
    $ajax = new ajax();
    $ajax->deleteNote();
});

router::route('ajax/getUserNotes',function() {
    $ajax = new ajax();
    $ajax->getUserNotes();
});

router::route('ajax/getUserSharedNotes',function() {
    $ajax = new ajax();
    $ajax->getUserSharedNotes();
});

router::route('ajax/getUserTrashedNotes',function() {
    $ajax = new ajax();
    $ajax->getUserTrashedNotes();
});

router::route('ajax/login',function() {
    $ajax = new ajax();
    $ajax->login();
});

router::route('ajax/logout',function() {
    $ajax = new ajax();
    $ajax->logout();
});

router::route('ajax/restoreNote',function() {
    $ajax = new ajax();
    $ajax->restoreNote();
});

router::route('ajax/shareNote',function() {
    $ajax = new ajax();
    $ajax->shareNote();
});

router::route('ajax/unReadNotes',function() {
    $ajax = new ajax();
    $ajax->unReadNotes();
});

router::route('ajax/updateNote',function() {
    $ajax = new ajax();
    $ajax->updateNote();
});