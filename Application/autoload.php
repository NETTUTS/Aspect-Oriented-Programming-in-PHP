<?php

ini_set('display_errors', true);

spl_autoload_register(function($originalClassName) {
    $className = ltrim($originalClassName, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strripos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    $resolvedFileName = stream_resolve_include_path($fileName);
    if ($resolvedFileName) {
        require_once $resolvedFileName;
    }
    return (bool) $resolvedFileName;
});