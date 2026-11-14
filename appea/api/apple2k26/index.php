<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/' || $uri === '') {
    require __DIR__ . '/../index.php';
    exit;
}

$file = __DIR__ . '/..' . $uri;

if (file_exists($file) && !is_dir($file)) {
    if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
        chdir(dirname($file));
        require $file;
        exit;
    }
    return false;
}

require __DIR__ . '/../index.php';
