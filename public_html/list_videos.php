<?php
$videos = glob("videos/samy_*.mov");
$result = [];

foreach ($videos as $videoPath) {
    $base = pathinfo($videoPath, PATHINFO_FILENAME); // samy_1
    $txtPath = "videos/{$base}.txt";

    $beschreibung = file_exists($txtPath) ? file_get_contents($txtPath) : "Keine Beschreibung vorhanden.";

    $result[] = [
        "video" => $videoPath,
        "text" => $beschreibung
    ];
}

header('Content-Type: application/json');
echo json_encode($result);
