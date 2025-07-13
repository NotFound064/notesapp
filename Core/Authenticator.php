<?php

namespace Core; 

$auth = new Authenticator();

class Authenticator{
    public function attempt($email, $password){
        $user = App::resolve(Database::class)->query('select * from users where email = :email', [
    'email' => $email
])->find();

    // No code is needed here. Remove this line.
    // The attempt method should not call itself recursively.

    // if yes, redirect to login page
if ($user){
    if (password_verify($password, $user['password'])){
        $this->login([
            'email' => $email
        ]);


    return true;
        }
    }


 return false;

}




function login($user){
  $_SESSION['user'] = [
    'email' => $user['email']
  ];

  session_regenerate_id(true);
}

function logout(){
    Session::destroy();
}

}

// return view;




