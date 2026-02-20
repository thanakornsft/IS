<?php
header('Content-Type: application/json');

$path = __DIR__ . "/data/funds.json";

if(!file_exists($path)){
    echo json_encode(["error"=>"data file not found"]);
    exit;
}

$data = json_decode(file_get_contents($path), true);

echo json_encode($data);