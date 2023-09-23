<?php

/**
 * Built assets aren't currently routeable via vercel-php
 * Manually route assets to be found
 * https://github.com/juicyfx/vercel-examples/commit/1fcbe3ff98ae34830cfd779224433cca16bb4f93
 */
if ($_GET['type'] === 'css') {
    header("Content-type: text/css; charset: UTF-8");
    $cssFile = __DIR__ . '/../public/css/' . basename($_GET['file']);

    if (file_exists($cssFile)) {
        readfile($cssFile);
    } else {
        // Handle the case where the CSS file does not exist
        // For example, you could output a default CSS or send a 404 error.
        // Example: header("HTTP/1.0 404 Not Found");
    }
} else if ($_GET['type'] === 'js') {
    header('Content-Type: application/javascript; charset: UTF-8');
    $jsFile = __DIR__ . '/../public/js/' . basename($_GET['file']);

    if (file_exists($jsFile)) {
        readfile($jsFile);
    } else {
        // Handle the case where the JS file does not exist
        // For example, you could output a default JS or send a 404 error.
        // Example: header("HTTP/1.0 404 Not Found");
    }
}
