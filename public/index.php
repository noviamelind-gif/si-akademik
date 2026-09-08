<?php

$routes = require __DIR__ . '/../routes/web.php';
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$basePath = '/si-akademik/public';

if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}

if ($uri === '') {
    $uri = '/';
}

$method = $_SERVER['REQUEST_METHOD'];



// ROUTING PARAMETER /mahasiswa/{id}
$parts = explode('/', trim($uri, '/'));


if (
    $method === 'GET' &&
    count($parts) === 2 &&
    $parts[0] === 'mahasiswa' &&
    is_numeric($parts[1])
) {

    require_once __DIR__ . '/../app/Controllers/MahasiswaController.php';

    require_once __DIR__ . '/../app/Core/Middleware/AuthMiddleware.php';

    $middleware = new AuthMiddleware();
    $middleware->handle();

    $controller = new MahasiswaController();

    $controller->show($parts[1]);

    exit;
}


// ROUTING BIASA

if (isset($routes[$method][$uri])) {

    $route = $routes[$method][$uri];

    // Jalankan middleware
    $middlewares = $route['middleware'] ?? [];
    foreach ($middlewares as $middlewareName) {
        require_once __DIR__ .
            '/../app/Core/Middleware/' .
            $middlewareName . '.php';
        $middleware = new $middlewareName();
        $middleware->handle();
    }

    // Jalankan Controller
    $controllerName = $route['controller'];
    $methodName = $route['method'];
    require_once __DIR__ .
        '/../app/Controllers/' .
        $controllerName . '.php';
    $controller = new $controllerName();
    $controller->$methodName();
    
} else {

    http_response_code(404);

    echo "<h1>404 - Halaman tidak ditemukan</h1>";
}