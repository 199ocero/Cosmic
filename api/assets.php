<?php

$filePathMapping = [
    // Js Files
    'app.js' => 'js/filament/filament/',
    'echo.js' => 'js/filament/filament/',
    'color-picker.js' => 'js/filament/forms/components/',
    'date-picker.js' => 'js/filament/forms/components/',
    'file-upload.js' => 'js/filament/forms/components/',
    'key-value.js' => 'js/filament/forms/components/',
    'markdown-editor.js' => 'js/filament/forms/components/',
    'rich-editor.js' => 'js/filament/forms/components/',
    'select.js' => 'js/filament/forms/components/',
    'tags-input.js' => 'js/filament/forms/components/',
    'textarea.js' => 'js/filament/forms/components/',
    'notification.js' => 'js/filament/notifications/',
    'async-alpine.js' => 'js/filament/support/',
    'support.js' => 'js/filament/support/',
    'table.js' => 'js/filament/tables/components/',
    'stats-overview/stat/chart.js' => 'js/filament/widgets/components/stats-overview/stat/',
    'chart.js' => 'js/filament/widgets/components/',

    // Css Files
    'app.css' => 'css/filament/filament/',
    'forms.css' => 'css/filament/forms/',
    'support.css' => 'css/filament/support/',
];

if (isset($_GET['type'])) {
    $type = $_GET['type'];
    $file = $_GET['file'];

    if (array_key_exists($file, $filePathMapping)) {
        $path = $filePathMapping[$file];
        $fullPath = __DIR__ . '/../public/' . $path . $file;

        if ($type === 'css' && pathinfo($file, PATHINFO_EXTENSION) === 'css') {
            header("Content-type: text/css; charset: UTF-8");
            readfile($fullPath);
            exit;
        } elseif ($type === 'js' && pathinfo($file, PATHINFO_EXTENSION) === 'js') {
            header('Content-Type: application/javascript; charset: UTF-8');
            readfile($fullPath);
            exit;
        }
    }
}

// If the file is not found or the type is invalid, return an error message
header('HTTP/1.1 404 Not Found');
echo 'File not found';
