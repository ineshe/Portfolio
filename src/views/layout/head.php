<?php
declare(strict_types=1);

$defaultStyles = [
    '/css/normalize.css',
    '/style.css',
    '/css/header.css',
    '/css/footer.css',
    '/css/cookie-consent.css',
];

$defaultScripts = [
    '/js/navigation.js',
    '/js/c-consent.js',
];

$styles = array_values(array_unique(array_merge($defaultStyles, $pageStyles ?? [])));
$scripts = array_values(array_unique(array_merge($defaultScripts, $pageScripts ?? [])));
?>
<head>
    <title><?= htmlspecialchars($pageTitle ?? 'Ines Heilmann', ENT_QUOTES, 'UTF-8') ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php foreach ($styles as $style): ?>
        <link rel="stylesheet" href="<?= $baseURL . $style ?>">
    <?php endforeach; ?>
    <?php if ($isDevelopment === true): ?>
        <script async data-id="five-server" src="http://localhost:5500/fiveserver.js"></script>
    <?php endif; ?>
    <?php foreach ($scripts as $script): ?>
        <script src="<?= $baseURL . $script ?>" defer></script>
    <?php endforeach; ?>
</head>
