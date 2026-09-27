<?php
    $localConfig = dirname(__DIR__) . '/src/config.local.php';
    if (file_exists($localConfig)) {
        require_once $localConfig;
    }

    $https = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $host = $_SERVER['HTTP_HOST'] ?? '127.0.0.1:8000';
    $baseURL = "$https://$host";