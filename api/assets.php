<?php

if (!isset($_GET['type']) || !isset($_GET['file'])) {
    http_response_code(400);
    echo "Bad Request: 'type' and 'file' parameters are required.";
    exit();
}

$fileType = $_GET['type'];
$fileName = $_GET['file'];

$allowedTypes = ['css', 'js'];

if (!in_array($fileType, $allowedTypes)) {
    http_response_code(400);
    echo "Bad Request: Unsupported file type.";
    exit();
}

$basePath = __DIR__ . '/../public/';
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

if (isset($filePathMapping[$fileName])) {
    $filePath = $filePathMapping[$fileName];
} else {
    http_response_code(404);
    echo "Not Found: File not found.";
    exit();
}

$fullPath = $basePath . $filePath . basename($fileName);

if (!file_exists($fullPath)) {
    http_response_code(404);
    echo "Not Found: File not found.";
    exit();
}

if ($fileType === 'css') {
    header("Content-type: text/css; charset: UTF-8");
} elseif ($fileType === 'js') {
    header('Content-Type: application/javascript; charset: UTF-8');
}

readfile($fullPath);
