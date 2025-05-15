<?php
$files = glob("images/samy_*.jpg");
$result = [];

foreach ($files as $imagePath) {
    $base = pathinfo($imagePath, PATHINFO_FILENAME);
    $txtPath = "images/{$base}.txt";

    $beschreibung = file_exists($txtPath) ? file_get_contents($txtPath) : "Keine Beschreibung vorhanden.";

    $result[] = [
        "image" => $imagePath,
        "text" => $beschreibung
    ];
}

header('Content-Type: application/json');
echo json_encode($result);
