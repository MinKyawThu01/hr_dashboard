<?php

define('VIEW_PATH', __DIR__ . '/../resources/view/');

$routes = [];


function route($method, $path, $callback) {
    global $routes;
    $routes[$method][$path] = $callback;
}

function dispatch($url, $method) {
    global $routes;

    if (isset($routes[$method][$url])) {
        $callback = $routes[$method][$url];
        $callback();
    } else {
        echo "<h1>404 Not Found</h1>";
    }
}


route('GET', '/', function() {
    session_start();
    require_once(VIEW_PATH . 'index.php');
});

route('GET', '/login', function() {
    session_start();
    require_once('app/classes/Authentication.php');
    if (isset($_COOKIE['remember_token'])) {
        $auth = new Authentication();
        $auth->checkRemember();
    }
    require_once(VIEW_PATH . 'auth/login.php');
});

route('POST', '/login/submit', function() {
    session_start();
    require_once('app/classes/Authentication.php');
    $auth = new Authentication();
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST['sign_in'])) {
            $auth->login($_POST);
        }
    }
});

route('GET', '/register', function() {
    require_once(VIEW_PATH . 'auth/register.php');
});

route('GET', '/2FA', function() {
    require_once(VIEW_PATH . 'auth/2FA.php');
});

route('GET', '/passwor-reset', function() {
    require_once(VIEW_PATH . 'auth/password_reset.php');
});

$currentURL = $_SERVER['REQUEST_URI'];
$currentMethod = $_SERVER['REQUEST_METHOD'];
dispatch($currentURL, $currentMethod);