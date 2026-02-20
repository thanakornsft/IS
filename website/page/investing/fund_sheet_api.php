<?php
header('Content-Type: application/json');

// ============================
// CONFIG
// ============================
$API_URL = "https://api.example.com/funds"; 
// 👆 เปลี่ยนตรงนี้เป็น API จริงที่คุณมี
// เช่น Finnhub / RapidAPI / Internal API

$USE_EXTERNAL_API = false;  
// false = ใช้ mock data
// true  = ใช้ API ภายนอกจริง

// ============================
// DATA SOURCE
// ============================

if($USE_EXTERNAL_API === true){

    // ===== REAL API MODE =====
    $ch = curl_init($API_URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($ch);

    if(curl_errno($ch)){
        echo json_encode([
            "error"=>"API connection failed",
            "detail"=>curl_error($ch)
        ]);
        curl_close($ch);
        exit;
    }

    curl_close($ch);

    if(!$response){
        echo json_encode(["error"=>"Empty API response"]);
        exit;
    }

    // ส่งข้อมูล API จริงกลับไป
    echo $response;
    exit;

}else{

    // ===== MOCK DATA MODE (Realtime Simulation) =====
    $funds = [
        [
            "code"=>"ESG-001",
            "name"=>"ESG Future Fund",
            "type"=>"ESG Equity",
            "roi"=>rand(10,15),
            "risk"=>"Low-Medium",
            "aum"=>"$".rand(400,800)."M",
            "nav"=>number_format(rand(900,1400)/100,2),
            "expense"=>round(rand(40,90)/100,2),
            "pdf"=>"https://example.com/factsheet/esg.pdf"
        ],
        [
            "code"=>"GEQ-101",
            "name"=>"Global Equity Fund",
            "type"=>"Global Equity",
            "roi"=>rand(12,18),
            "risk"=>"High",
            "aum"=>"$".rand(900,1500)."M",
            "nav"=>number_format(rand(1200,2000)/100,2),
            "expense"=>round(rand(80,120)/100,2),
            "pdf"=>"https://example.com/factsheet/global.pdf"
        ],
        [
            "code"=>"BND-210",
            "name"=>"Bond Stability Fund",
            "type"=>"Fixed Income",
            "roi"=>rand(5,8),
            "risk"=>"Low",
            "aum"=>"$".rand(600,1200)."M",
            "nav"=>number_format(rand(800,1200)/100,2),
            "expense"=>round(rand(30,60)/100,2),
            "pdf"=>"https://example.com/factsheet/bond.pdf"
        ],
        [
            "code"=>"ASG-330",
            "name"=>"Asia Growth Fund",
            "type"=>"Asia Equity",
            "roi"=>rand(11,17),
            "risk"=>"Medium-High",
            "aum"=>"$".rand(500,1100)."M",
            "nav"=>number_format(rand(1000,1800)/100,2),
            "expense"=>round(rand(70,110)/100,2),
            "pdf"=>"https://example.com/factsheet/asia.pdf"
        ]
    ];

    echo json_encode($funds);
    exit;
}