<?php

/**
 * Front controller.
 *
 * Every request reaches this file through .htaccess, which hands the requested
 * path over in the "route" argument. The path is matched against the route table
 * below and given to the matching controller, which is the only layer allowed to
 * talk to the models and to the views.
 */

// Version floor. The models declare typed properties, which PHP 7.4 introduced.
// Without this check an older host answers with a parse error buried in a file the
// guest never asked for; here it says plainly what has to change.
if (PHP_VERSION_ID < 70400) {
    http_response_code(500);
    exit('Este diretório requer PHP 7.4 ou superior. Versão instalada: ' . PHP_VERSION . '.');
}

// Configuration and view helpers.
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/helpers.php';

// Class autoloader. Controllers and models are loaded on demand from their own
// folder, so a new class never has to be registered anywhere.
spl_autoload_register(static function (string $class): void {
    foreach (['controllers', 'models'] as $folder) {
        $file = ROOT_PATH . '/' . $folder . '/' . $class . '.php';

        if (is_file($file)) {
            require_once $file;

            return;
        }
    }
});

// Path of the request, without its query string.
$request_path = (string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);

// The requested route normally arrives in the "route" argument that .htaccess
// sets, already stripped of the base path. Where PHP runs without a rewrite - the
// development server, for one - it is read from the request path instead, which
// still carries that base path.
$route = (string) ($_GET['route'] ?? $request_path);

// strpos() rather than str_starts_with(): the latter only exists from PHP 8.0 and
// shared hosts are often still on 7.4. BASE_PATH always starts with a slash and a
// route set by .htaccess never does, so the two can never be confused.
if (BASE_PATH !== '' && strpos($route, BASE_PATH) === 0) {
    $route = substr($route, strlen(BASE_PATH));
}

// Under the PHP development server this file doubles as its router. Real files
// have to be handed back untouched, otherwise the stylesheet and the scripts
// would be answered with the selection page. The test uses the path relative to
// the application, so it holds whether the server points at the project folder or
// at its parent.
if (PHP_SAPI === 'cli-server' && $route !== '/' && is_file(__DIR__ . $route)) {
    return false;
}

// Normalised: no surrounding slash and lower case, so that "/Miramar-SPA/" and
// "miramar-spa" are the same page and never two URLs for one piece of content.
$route = strtolower(trim($route, '/'));

// The bare domain root has no content of its own: it sends the guest to the
// property selection page, which is the only meaningful landing page.
if ($route === '') {
    header('Location: ' . url('selection'), true, 302);
    exit;
}

// Route table: requested path => [controller, action].
// The action always receives the route, which the hotel controller reads as the
// property slug and the home controller simply ignores.
$routes = [
    'selection' => ['HomeController', 'index'],
];

// Every property registered in the model gets its own friendly URL, so publishing
// the directory of a new hotel is a matter of adding it to models/data/hotels.php.
foreach ((new Hotel())->slugs() as $slug) {
    $routes[$slug] = ['HotelController', 'show'];
}

// An unknown path answers with a real 404 instead of quietly falling back to the
// home page, which would hide broken links from the search engines.
if (!isset($routes[$route])) {
    (new ErrorController())->notFound();
    exit;
}

[$controller, $action] = $routes[$route];

// The controller does the rest: it reads the model and renders the view.
(new $controller())->$action($route);
