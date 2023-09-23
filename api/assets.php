<?php

/**
 * Built assets aren't currently routeable via vercel-php
 * Manually route assets to be found
 */
if ($_GET['type'] === 'css') {
    header("Content-type: text/css; charset: UTF-8");
    readfile(__DIR__ . '/../public/css/filament/' . basename($_GET['file']));
} else if ($_GET['type'] === 'js') {
    header('Content-Type: application/javascript; charset: UTF-8');
    readfile(__DIR__ . '/../public/js/filament/' . basename($_GET['file']));
} else {
    http_response_code(404); // Handle other file types or invalid requests here
}
