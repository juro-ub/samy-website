<?php
// Standard-Titel, falls keiner gesetzt ist
if (!isset($pageTitle)) {
    $pageTitle = "Samys Seite";
}

// CSS-Dateien vorbereiten
$mainCss = "css/main.css";
$mainCssVersion = filemtime($mainCss);

// Optionales Zusatz-CSS pro Seite (z. B. texte.css, bilder.css)
$extraCssLink = "";
if (isset($cssFile) && file_exists($cssFile)) {
    $extraCssVersion = filemtime($cssFile);
    $extraCssLink = '<link rel="stylesheet" href="' . $cssFile . '?v=' . $extraCssVersion . '">' . PHP_EOL;
}
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <title><?= htmlspecialchars($pageTitle) ?></title>
        <link rel="stylesheet" href="<?= $mainCss ?>?v=<?= $mainCssVersion ?>">
        <?= $extraCssLink ?>
    </head>
    <body>
