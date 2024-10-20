<?php
spl_autoload_register(function ($class) {
    $class = str_replace('App\\', '', $class);
    $path = __DIR__ . '/app/' . str_replace('\\', '/', $class) . '.php';

    if (file_exists($path)) {

        require_once $path;
    } else {
        echo "Fayl topilmadi: " . $path;
    }
});
