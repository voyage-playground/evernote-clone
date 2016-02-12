<?php
/**
 * Created by PhpStorm.
 * User: Jaden Lemmon
 * Date: 2/11/16
 * Time: 2:19 PM
 */

require_once '../models/note.php';

$note = new note();

if($note->addNote($data->title,$data->content)) {
    echo 'success';
}
else {
    echo 'error';
}
