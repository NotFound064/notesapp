<?php

use Core\App;
use Core\Database;


$db = App::resolve(Database::class);


$heading = 'Note';
$currentUserId = 1;

$note = $db->query('select * from notesapp.notes where id = :id', [
    'id' => $_GET['id']
    ])->findOrFail();

    authorize($note['user_id'] == $currentUserId);




view('notes/edit.view.php', [
    'heading' => 'Edit',
    'errors' => [],
    'note' => $note
]);