<?php
$files = glob("texte/samy_*.txt");
$result = [];

foreach ($files as $file) {
    $result[] = [
        "name" => basename($file),
        "content" => file_get_contents($file)
    ];
}

header('Content-Type: application/json');
echo json_encode($result);