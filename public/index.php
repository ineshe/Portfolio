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
    case '/more-projects':
        require $viewDir . '/more-projects/more-projects.php';
        break;
    case (bool) preg_match('#^/project/([\w-]+)$#', $request, $matches):
        $_GET['slug'] = $matches[1];

        include dirname(__DIR__, 1).'/src/views/project-detail/config.php';

        if (array_key_exists($matches[1], $projects)) {
            require $viewDir . '/project-detail/project-detail.php';
        } else {
            echo ' 404 - Seite nicht gefunden';
        }
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