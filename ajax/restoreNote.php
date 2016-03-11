<?php
/**
 * Created by PhpStorm.
 * User: Jaden Lemmon
 * Date: 2/12/16
 * Time: 1:57 PM
 */

use app\models\note;

$note = new note();

$note->deleteNote($data->id, false);