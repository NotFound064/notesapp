<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);


$heading = 'Note';
$currentUserId = 1;

//find the corresponding note
$note = $db->query('select * from notesapp.notes where id = :id', [
    'id' => $_POST['id']
    ])->findOrFail();

//authorize that the user can edit the note
authorize($note['user_id'] == $currentUserId);

// validate form
$errors = [];


if (! Validator::string($_POST['body'], 1, 3000)){
    $errors['body'] = 'A body of no more than 3000 characters is required';
}

//if no validation errors, update the record in the notes database table
if (count($errors)){
    return view('notes/edit.view.php', [
        'heading' => 'Edit',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query("update notes set body = :body where id = :id", [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

//redirect the user
header('location: /notes');
die();