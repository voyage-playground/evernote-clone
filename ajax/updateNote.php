<?php
/**
 * Created by PhpStorm.
 * User: Jaden Lemmon
 * Date: 2/11/16
 * Time: 4:25 PM
 */

require_once '../models/note.php';

$note = new note();

if($note->updateNote($data->id,$data->content,$data->title)) {
    echo 'success';
}
else {
    echo 'error';
}