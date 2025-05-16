<?php
$files = glob("images/samy_*.jpg");
$result = [];

foreach ($files as $imagePath) {
    $base = pathinfo($imagePath, PATHINFO_FILENAME);
    $txtPath = "images/{$base}.txt";

    $beschreibung = file_exists($txtPath) ? file_get_contents($txtPath) : "Keine Beschreibung vorhanden.";

    $teile = explode("_", $base); // ["samy", "15", "05", "2025", "1", "schlafen", "karton"]

    $datum = (count($teile) >= 4) ? "{$teile[1]}.{$teile[2]}.{$teile[3]}" : "unbekannt";
    $stichwoerter = array_slice($teile, 5); // ab Index 5 = Stichwörter
    $stichwort_string = implode(", ", $stichwoerter);
    
    $result[] = [
        "bild" => $imagePath,
        "text" => $beschreibung,
        "datum" => $datum,
        "stichwoerter" => $stichwort_string
    ];
}

header('Content-Type: application/json');
echo json_encode($result);
