<?php

/**
 * Application configuration.
 *
 * Holds the settings every request depends on: where the application lives on
 * disk and which public path it is served from. The content itself is kept in the
 * model data files, so there is no database and no credential to store here.
 */

// Absolute path to the project root, used to include views and model data files.
define('ROOT_PATH', dirname(__DIR__));

// Public base path, without a trailing slash, worked out from the location of the
// front controller. The application therefore runs unchanged from a domain root
// (empty string) and from a sub-directory, for example "/miramarguest".
if (PHP_SAPI === 'cli-server') {
    // The PHP development server fills SCRIPT_NAME and SCRIPT_FILENAME with the
    // path being requested rather than the path of the script handling it, so
    // neither says where the application lives. Asking for /assets/css/main.css
    // would even set the base path to "/assets/css". The project folder and the
    // folder the server is serving are both known, and one relative to the other
    // is the answer.
    $project_dir = str_replace('\\', '/', dirname(__DIR__));
    $document_root = rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT'] ?? ''), '/');

    // stripos() rather than strpos(): on Windows the drive letter can differ in
    // case between the two.
    $base_path = $document_root !== '' && stripos($project_dir, $document_root) === 0
        ? substr($project_dir, strlen($document_root))
        : '';
} else {
    // Under Apache the rewrite sends every request to this file, so SCRIPT_NAME
    // is a reliable pointer to where the application is installed.
    // dirname() answers with a backslash for a root path on Windows, which is why
    // the separator is normalised before the test rather than after.
    $base_path = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/'));
    $base_path = $base_path === '/' ? '' : $base_path;
}

define('BASE_PATH', rtrim($base_path, '/'));

// Absolute URL of the application, used by the Open Graph tags and the canonical
// link. Behind a proxy the request is only HTTPS once it has been forwarded.
$is_https = ($_SERVER['HTTPS'] ?? '') === 'on'
    || ($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https';
define('BASE_URL', ($is_https ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . BASE_PATH);

// Name of the hotel group, printed in the page title and in the footer.
define('APP_NAME', 'Hotéis Miramar');

// Environment: "local" prints the PHP errors while the directory is being
// edited, "production" hides them from the guest.
define('APP_ENV', 'local');

if (APP_ENV === 'local') {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    error_reporting(E_ALL & ~E_DEPRECATED);
    ini_set('display_errors', '0');
}

// The guests and the staff editing the content are all in Portugal, whatever
// timezone the host happens to run on. This has to come before APP_YEAR below:
// date() reads the timezone in force at the moment it is called, and a server
// set to, say, America/New_York would otherwise still report the old year for
// the first hours of the 1st of January in Lisbon.
date_default_timezone_set('Europe/Lisbon');

// Copyright year shown in the footer, read from the clock at each request so the
// notice never goes stale and nobody has to remember to edit it every January.
define('APP_YEAR', date('Y'));
