<?php
/**
 * Created by PhpStorm.
 * User: epsokc
 * Date: 2/11/16
 * Time: 12:43 PM
 */

require_once dirname(dirname(__FILE__)).'/models/note.php';

$note = new note();

echo json_encode($note->getUserNotes());