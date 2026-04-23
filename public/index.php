<?php

declare(strict_types=1);

require_once dirname(__DIR__, 1).'/src/config.php';

$request = $_SERVER['REQUEST_URI'] ?? '/';
$viewDir = dirname(__DIR__, 1).'/src/views';

switch ($request) {
    case '':
    case '/':
        require $viewDir . '/pages/home/home.php';
        break;
    case '/more-projects':
        require $viewDir . '/pages/more-projects/more-projects.php';
        break;
    case (bool) preg_match('#^/project/([\w-]+)$#', $request, $matches):
        $_GET['slug'] = $matches[1];

        $projects = json_decode(file_get_contents(dirname(__DIR__, 1).'/src/data/projects.json'), true);

        if (array_key_exists($matches[1], $projects)) {
            require $viewDir . '/pages/project-detail/project-detail.php';
        } else {
            echo ' 404 - Seite nicht gefunden';
        }
        break;
    case '/impressum':
        require $viewDir . '/pages/impressum/impressum.php';
        break;
    case '/datenschutz':
        require $viewDir . '/pages/datenschutz/datenschutz.php';
        break;
    default:
        echo ' 404 - Seite nicht gefunden';
        break;
}