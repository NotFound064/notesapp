<?php

use Core\App;
use Core\Database;


$db = App::resolve(Database::class);


$heading = 'Note';
$currentUserId = 1;


$note = $db->query('select * from notesapp.notes where id = :id', [
    'id' => $_POST['id']
]) -> findOrFail();

authorize($note['user_id'] == $currentUserId);

$db->query('delete from notesapp.notes where id = :id', [
    'id' => $_POST['id']
]);


header('location: /notes');
die();
