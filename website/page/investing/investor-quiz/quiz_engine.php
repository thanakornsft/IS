<?php
function analyzeQuiz($data){
    $score = 0;

    foreach($data as $v){
        $score += intval($v);
    }

    if($score <= 8) return ['type'=>'Conservative Investor','risk'=>'Low','portfolio'=>'Money Market 40%, Bond 40%, Equity 10%, Gold 10%'];
    if($score <= 14) return ['type'=>'Balanced Investor','risk'=>'Medium','portfolio'=>'Bond 30%, Equity 40%, REIT 20%, Gold 10%'];
    return ['type'=>'Aggressive Investor','risk'=>'High','portfolio'=>'Equity 60%, Crypto 15%, Global Fund 15%, REIT 10%'];
}
?>