<?php
/**
 * Created by PhpStorm.
 * User: Jaden
 * Date: 2/12/16
 * Time: 12:21 AM
 */

require_once dirname(dirname(__FILE__)).'/models/note.php';

$note = new note();

echo json_encode($note->getUserSharedNotes());