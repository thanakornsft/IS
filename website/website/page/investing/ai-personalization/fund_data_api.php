<?php
// fund_data_api.php
header('Content-Type: application/json');

// ห้ามมี echo อื่น
// ห้ามมี HTML
// ห้ามมี space ก่อน <?php

$funds = [
    [
        "name"=>"Global Equity Fund",
        "roi"=>rand(10,20),
        "risk"=>rand(3,7),
        "esg"=>rand(6,10),
        "aum"=>rand(500,1500)
    ],
    [
        "name"=>"Asia Growth Fund",
        "roi"=>rand(8,18),
        "risk"=>rand(3,7),
        "esg"=>rand(5,9),
        "aum"=>rand(300,1200)
    ],
    [
        "name"=>"Bond Stability Fund",
        "roi"=>rand(4,9),
        "risk"=>rand(1,4),
        "esg"=>rand(6,9),
        "aum"=>rand(800,2000)
    ],
    [
        "name"=>"ESG Future Fund",
        "roi"=>rand(7,15),
        "risk"=>rand(2,5),
        "esg"=>rand(8,10),
        "aum"=>rand(400,1000)
    ]
];

echo json_encode($funds, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);