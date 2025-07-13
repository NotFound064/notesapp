<?php
use Core\Validator;
use Core\App;

$email = $_POST['email'];
$password = $_POST['password'];

//validate form inputs
$errors = [];
if (! Validator::email($email)){
    $errors['email']= 'Please provide a valid email address.';
}

if (! Validator::string($password, 7, 255)){
    $errors['password']= 'Please provide a password of at least seven characters.';
}

if (! empty($errors)){
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

// check if the account already exists
$db = App::resolve('Core\Database');
$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if ($user) {
    return view('registration/create.view.php', [
        'errors' => ['email' => 'Email already registered.']
    ]);
}

// insert the new user
$db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT)
]);

// login the user automatically
$_SESSION['user'] = [
    'id' => $db->connection->lastInsertId(),
    'email' => $email
];

// redirect to notes page
redirect('/notes');