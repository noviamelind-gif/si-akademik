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


// ==================================================
// REQUIRE DATABASE & REPOSITORY
// ==================================================

require_once __DIR__ . '/../app/Core/Database.php';
require_once __DIR__ . '/../app/Repositories/MahasiswaRepository.php';


// ==================================================
// CARI ROUTE
// ==================================================

$route = null;
$params = [];


// 1. CEK ROUTE BIASA
if (isset($routes[$method][$uri])) {

    $route = $routes[$method][$uri];

}


// 2. CEK ROUTE DENGAN PARAMETER {id}
if ($route === null) {

    foreach ($routes[$method] as $routeUri => $routeData) {

        // Ubah /mahasiswa/{id}/edit menjadi pola regex
        $pattern = preg_quote($routeUri, '#');

        $pattern = str_replace(
            '\{id\}',
            '([0-9]+)',
            $pattern
        );

        $pattern = '#^' . $pattern . '$#';

        if (preg_match($pattern, $uri, $matches)) {

            $route = $routeData;

            // Ambil nilai id
            if (isset($matches[1])) {
                $params[] = (int) $matches[1];
            }

            break;
        }
    }
}


// ==================================================
// JIKA ROUTE TIDAK DITEMUKAN
// ==================================================

if ($route === null) {

    http_response_code(404);

    echo "<h1>404 - Halaman tidak ditemukan</h1>";

    exit;
}


// ==================================================
// JALANKAN MIDDLEWARE
// ==================================================

$middlewares = $route['middleware'] ?? [];

foreach ($middlewares as $middlewareName) {

    require_once __DIR__ .
        '/../app/Core/Middleware/' .
        $middlewareName . '.php';

    $middleware = new $middlewareName();

    $middleware->handle();
}


// ==================================================
// JALANKAN CONTROLLER
// ==================================================

$controllerName = $route['controller'];
$methodName = $route['method'];

require_once __DIR__ .
    '/../app/Controllers/' .
    $controllerName . '.php';


// ==================================================
// DEPENDENCY INJECTION
// KHUSUS MAHASISWA CONTROLLER
// ==================================================

if ($controllerName === 'MahasiswaController') {

    $repository = new MahasiswaRepository(
        Database::getInstance()
    );

    $controller = new MahasiswaController($repository);

} else {

    $controller = new $controllerName();
}


// ==================================================
// JALANKAN METHOD CONTROLLER
// ==================================================

if (!empty($params)) {

    $controller->$methodName(...$params);

} else {

    $controller->$methodName();
}