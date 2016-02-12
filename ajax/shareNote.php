<?php
/**
 * Created by PhpStorm.
 * User: Jaden
 * Date: 2/11/16
 * Time: 11:47 PM
 */

require_once '../models/note.php';

$note = new note();

if($note->shareNote($data->username,$data->noteID)) {
    echo 'success';
}
else {
    echo 'error';
}