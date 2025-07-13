<?php

$_SESSION['name'] = 'Jeffrey';


use Core\Database;

$config = require basePath('config.php');
$db = new Database($config['database']);

$notes = $db->query('select * from notesapp.notes where user_id=1')->all();

 view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
 ]);

?>