<?php

/**
 * Shared page header.
 *
 * Opens the document, prints everything the <head> needs and opens the mobile
 * application container that every page is drawn inside.
 *
 * @var string $page_title       Title of the page, shown in the browser tab.
 * @var string $meta_description Summary used by the search engines and by the
 *                               link previews, when the view provides one.
 */

// The name of the group follows the page title, unless the page already carries
// it, which keeps the tab readable and the title unambiguous in the results.
$document_title = $page_title === APP_NAME ? $page_title : $page_title . ' · ' . APP_NAME;

// Canonical address of the page. The route is rebuilt from the request so that a
// stray trailing slash or a different letter case never gives the search engines
// two addresses for one page.
$canonical_route = trim((string) ($_GET['route'] ?? 'selection'), '/');

?>
<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO -->
    <title><?= e($document_title) ?></title>
    <?php if (!empty($meta_description)) : ?>
        <meta name="description" content="<?= e($meta_description) ?>">
    <?php endif; ?>
    <link rel="canonical" href="<?= e(BASE_URL . '/' . $canonical_route) ?>">

    <!-- Link previews -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?= e(APP_NAME) ?>">
    <meta property="og:url" content="<?= e(BASE_URL . '/' . $canonical_route) ?>">
    <meta property="og:title" content="<?= e($page_title) ?>">
    <?php if (!empty($meta_description)) : ?>
        <meta property="og:description" content="<?= e($meta_description) ?>">
    <?php endif; ?>

    <!-- The directory is used on a phone, held in one hand: the accent colour
         also tints the browser bar on Android. -->
    <meta name="theme-color" content="#b59b5e">

    <!-- CSS Vendor: Bootstrap and the Bootstrap icons, from the CDN. -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS Main -->
    <link rel="stylesheet" href="<?= e(asset('css/main.css')) ?>">
</head>

<body>

    <!-- Application container: on a desktop screen it draws a phone-sized column
         in the middle of the light grey page, and on a phone it fills the width. -->
    <div class="app">
