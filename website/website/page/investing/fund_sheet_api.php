<?php
header('Content-Type: application/json');

// 🔗 ตัวอย่าง API ภายนอก (mock ตัวอย่าง)
$api_url = "https://api.example.com/funds"; // << ใส่ API จริงตรงนี้

$response = file_get_contents($api_url);

if($response === FALSE){
    echo json_encode(["error"=>"API connection failed"]);
    exit;
}

// ส่งข้อมูลต่อให้ frontend
echo $response;