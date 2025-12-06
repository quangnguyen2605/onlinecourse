<?php
session_start();

// Load config/Database.php first
require_once __DIR__ . '/config/Database.php';

spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/controllers/' . $class . '.php',
        __DIR__ . '/models/' . $class . '.php',
        __DIR__ . '/config/' . $class . '.php',
    ];

    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});

$controllerName = isset($_GET['controller']) ? $_GET['controller'] . 'Controller' : 'HomeController';
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

if (!class_exists($controllerName)) {
    http_response_code(404);
    echo "Controller not found";
    exit;
}

$controller = new $controllerName();

if (!method_exists($controller, $actionName)) {
    http_response_code(404);
    echo "Action not found";
    exit;
}

// Handle route parameters
$params = [];
if (isset($_GET['id'])) $params['id'] = $_GET['id'];
if (isset($_GET['courseId'])) $params['courseId'] = $_GET['courseId'];
if (isset($_GET['lessonId'])) $params['lessonId'] = $_GET['lessonId'];
if (isset($_GET['userId'])) $params['userId'] = $_GET['userId'];

// Call the action with parameters
if (!empty($params)) {
    call_user_func_array([$controller, $actionName], array_values($params));
} else {
    $controller->{$actionName}();
}
