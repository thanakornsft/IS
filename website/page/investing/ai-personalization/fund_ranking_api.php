<?php
$data = json_decode(file_get_contents("http://localhost/website/page/investing/ai-personalization/fund_data_api.php"), true);

function aiScore($f){
    return (
        $f['roi']*0.35 +
        (10-$f['risk'])*0.2 +
        $f['esg']*0.25 +
        log($f['aum'])*0.2
    );
}

foreach($data as &$f){
    $f['score'] = round(aiScore($f),2);
}

usort($data,function($a,$b){
    return $b['score'] <=> $a['score'];
});

echo json_encode($data);