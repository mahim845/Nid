<?php

header('Content-Type: application/json; charset=utf-8');

$number = trim($_GET['number'] ?? '');

if ($number === '') {
    http_response_code(400);

    echo json_encode([
        "success" => false,
        "error" => "Number parameter required"
    ], JSON_PRETTY_PRINT);

    exit;
}

$file = __DIR__ . '/data.json';

$data = json_decode(file_get_contents($file), true);

if (!is_array($data)) {
    http_response_code(500);
    echo json_encode(["error" => "Invalid database"]);
    exit;
}

foreach ($data as $row) {

    if (($row['number'] ?? '') === $number) {

        echo json_encode([
            "success" => true,
            "data" => $row
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        exit;
    }
}

http_response_code(404);

echo json_encode([
    "success" => false,
    "error" => "No record found"
], JSON_PRETTY_PRINT);

?>
