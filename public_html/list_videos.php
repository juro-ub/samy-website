<?php
$videos = glob("videos/samy_*.mov");
$result = [];

foreach ($videos as $videoPath) {
    $base = pathinfo($videoPath, PATHINFO_FILENAME);  // z. B. samy_15_05_2025_1_einzug
    $txtPath = "videos/{$base}.txt";

    $beschreibung = file_exists($txtPath) ? file_get_contents($txtPath) : "Keine Beschreibung vorhanden.";

    // Dateiteile extrahieren
    $teile = explode("_", $base); // ["samy", "15", "05", "2025", "1", "einzug"]
    $datum = (count($teile) >= 4) ? "{$teile[1]}.{$teile[2]}.{$teile[3]}" : "unbekannt";
    $stichwoerter = array_slice($teile, 5); // ab dem 6. Teil alles sammeln
    $stichwort_string = implode(", ", $stichwoerter);
    
    $result[] = [
        "video" => $videoPath,
        "text" => $beschreibung,
        "datum" => $datum,
        "stichwoerter" => $stichwort_string
    ];
}

header('Content-Type: application/json');
echo json_encode($result);
