<?php

declare(strict_types=1);

require_once dirname(__DIR__, 1).'/src/config.php';

$request = $_SERVER['REQUEST_URI'];
$viewDir = dirname(__DIR__, 1).'/src/views';

switch ($request) {
    case '':
    case '/':
        require $viewDir . '/home/home.php';
        break;
    case (bool) preg_match('#^/views/project-detail/(\d+)$#', $request, $matches):
        $_GET['id'] = intval($matches[1]);
        require $viewDir . '/project-detail/project-detail.php';
        break;
    case '/impressum':
        require $viewDir . '/impressum/impressum.php';
        break;
    case '/datenschutz':
        require $viewDir . '/datenschutz/datenschutz.php';
        break;
    default:
        echo ' 404 - Seite nicht gefunden';
        break;
}