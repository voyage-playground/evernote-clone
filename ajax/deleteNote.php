<?php
/**
 * Created by PhpStorm.
 * User: Jaden Lemmon
 * Date: 2/11/16
 * Time: 3:54 PM
 */

use app\models\note;

$note = new note();

if($note->deleteNote($data->id)) {
    echo 'success';
}
else {
    echo 'error';
}