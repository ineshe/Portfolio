<?php
    $https = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $host = $_SERVER['HTTP_HOST'] ?? '127.0.0.1:5500';
    $baseURL = "$https://$host";
    $isDevelopment = true;

