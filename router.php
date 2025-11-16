<?php

if (php_sapi_name() === 'cli-server') {
    $uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $file = __DIR__.'/public'.$uri;

    if ($uri !== '/' && file_exists($file)) {
        return false;
    }
}

require_once __DIR__.'/public/index.php';
