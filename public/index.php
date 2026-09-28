<?php
declare(strict_types=1);

// Route on the path only, so shared links with ?utm_source=… or ?fbclid=… still resolve.
$request = explode('?', $_SERVER['REQUEST_URI'] ?? '/', 2)[0];
$viewDir = dirname(__DIR__, 1).'/src/views';

switch ($request) {
    case '':
    case '/':
        require $viewDir . '/pages/home/home.php';
        break;
    case (bool) preg_match('#^/project/([\w-]+)$#', $request, $matches):
        $_GET['slug'] = $matches[1];

        $projects = json_decode(file_get_contents(dirname(__DIR__, 1).'/src/data/projects.json'), true);

        // Unpublished projects (visibility other than "1") stay offline, even by direct link.
        if (($projects[$matches[1]]['visibility'] ?? '0') === '1') {
            require $viewDir . '/pages/project-detail/project-detail.php';
        } else {
            http_response_code(404);
            require $viewDir . '/pages/404/404.php';
        }
        break;
    case '/impressum':
        require $viewDir . '/pages/impressum/impressum.php';
        break;
    case '/datenschutz':
        require $viewDir . '/pages/datenschutz/datenschutz.php';
        break;
    default:
        http_response_code(404);
        require $viewDir . '/pages/404/404.php';
        break;
}