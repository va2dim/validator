<?php

spl_autoload_register(
    function ($className) {
        $fileName = __DIR__ . '/' . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';

        if (is_readable($fileName)) {
            require $fileName;
            return true;
        }

        return false;
    }
);
