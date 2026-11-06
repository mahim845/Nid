<?php

header('Content-Type: application/json');

echo json_encode([
    "success" => true,
    "message" => "Demo API is running",
    "endpoint" => "/api.php?number=TEST-00000001"
], JSON_PRETTY_PRINT);

?>
