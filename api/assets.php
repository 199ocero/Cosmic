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

if ($_GET['type'] === 'css') {
    header("Content-type: text/css; charset: UTF-8");
    echo require __DIR__ . '/../public/css/' . basename($_GET['file']);
} else if ($_GET['type'] === 'js') {
    header('Content-Type: application/javascript; charset: UTF-8');
    echo require __DIR__ . '/../public/js/' . basename($_GET['file']);
}
