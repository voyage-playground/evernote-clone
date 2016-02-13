<?php
/**
 * Created by PhpStorm.
 * User: Jaden Lemmon
 * Date: 2/11/16
 * Time: 3:54 PM
 */

require_once dirname(dirname(__FILE__)).'/models/note.php';

$note = new note();

if($note->deleteNote($data->id)) {
    echo 'success';
}
else {
    echo 'error';
}