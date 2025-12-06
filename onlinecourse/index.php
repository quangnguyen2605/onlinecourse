<?php
session_start();

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

// Check if user is accessing auth pages
if (isset($_GET['controller']) && $_GET['controller'] === 'Auth') {
    $controllerName = 'AuthController';
    $actionName = isset($_GET['action']) ? $_GET['action'] : 'login';
} else {
    // Default to showing the main Coursera interface
    if (!isset($_GET['controller'])) {
        // Show the main Coursera interface
        include __DIR__ . '/views/coursera/index.php';
        exit;
    }
    $controllerName = isset($_GET['controller']) ? $_GET['controller'] . 'Controller' : 'HomeController';
    $actionName = isset($_GET['action']) ? $_GET['action'] : 'index';
}

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

$controller->{$actionName}();
