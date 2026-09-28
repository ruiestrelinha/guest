<?php

/**
 * Global helper functions.
 *
 * Small, view-facing helpers shared by every template. They are plain functions
 * rather than a class because the views call them constantly and because they
 * never hold any state.
 */

if (!function_exists('e')) {
    /**
     * Escapes a value for output in HTML.
     *
     * Every value coming from the model goes through this function before it
     * reaches the page, so a stray quote in the content can never break the
     * markup or open a script tag.
     */
    function e($value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('url')) {
    /**
     * Builds an internal URL from a route.
     *
     * The base path is added here, so views never have to know whether the
     * application is served from a domain root or from a sub-directory.
     */
    function url(string $route = ''): string
    {
        return BASE_PATH . '/' . ltrim($route, '/');
    }
}

if (!function_exists('asset')) {
    /**
     * Builds a URL for a file inside /assets.
     */
    function asset(string $path): string
    {
        return BASE_PATH . '/assets/' . ltrim($path, '/');
    }
}

if (!function_exists('is_current')) {
    /**
     * Tells whether the given route is the one being displayed.
     *
     * Used by the navigation to mark the link of the current page.
     */
    function is_current(string $route): bool
    {
        return trim((string) ($_GET['route'] ?? ''), '/') === trim($route, '/');
    }
}

if (!function_exists('view_path')) {
    /**
     * Absolute path of a view file, without the .php extension.
     *
     * The views are included by the controllers, which never print HTML
     * themselves.
     */
    function view_path(string $view): string
    {
        return ROOT_PATH . '/views/' . trim($view, '/') . '.php';
    }
}

if (!function_exists('tel_link')) {
    /**
     * Turns a human readable phone number into a tel: link.
     *
     * Guests tap these numbers on a phone, so the spaces and brackets used for
     * readability have to go: the dialler only understands digits and a leading
     * plus sign.
     */
    function tel_link(string $phone): string
    {
        return 'tel:' . preg_replace('/[^0-9+]/', '', $phone);
    }
}
