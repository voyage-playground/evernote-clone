<?php
/**
 * Created by PhpStorm.
 * User: Jaden Lemmon
 * Date: 2/11/16
 * Time: 4:25 PM
 */

use models\note;

$note = new note();

header('Content-Type: application/json');
echo json_encode($note->updateNote($data->id,$data->content,$data->title));
