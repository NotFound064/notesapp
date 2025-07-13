<?php

function dd($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] == $value; 
}

function abort($code = 404){
    http_response_code($code);
    require basePath("views/{$code}.php");
    die();
}

function authorize($condition, $status = \Core\Response::FORBIDDEN){
    if (! $condition){
        abort($status);
    }
}

function basePath($path){
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require basePath("views/{$path}");
}

function redirect($path){
    header("Location: {$path}");
    exit();
}

function logout() {
    $_SESSION = [];
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
    session_destroy();
}

function old($key, $default = ''){
  return Core\Session::get('old')[$key] ?? $default;
}

?>