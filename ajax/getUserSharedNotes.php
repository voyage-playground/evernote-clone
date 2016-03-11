<?php
/**
 * Created by PhpStorm.
 * User: Jaden
 * Date: 2/12/16
 * Time: 12:21 AM
 */

use app\models\note;

$note = new note();

echo json_encode($note->getUserSharedNotes());