<?php
/**
 * Created by PhpStorm.
 * User: Jaden Lemmon
 * Date: 2/11/16
 * Time: 5:26 PM
 */

require_once dirname(dirname(__FILE__)).'/models/note.php';

$note = new note();

echo json_encode($note->getUserNotes(true));