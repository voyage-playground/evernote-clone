<?php
/**
 * Created by PhpStorm.
 * User: Jaden Lemmon
 * Date: 2/11/16
 * Time: 2:19 PM
 */

use app\models\note;

$note = new note();

if($note->addNote($data->title,$data->content)) {
    echo 'success';
}
else {
    echo 'error';
}
