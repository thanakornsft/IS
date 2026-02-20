<?php
/* user_profile.php */

session_start();

/* ===== User Profile Builder ===== */

function createUserProfile($data){
    return [
        'user_id' => uniqid('INV_'),
        'goal' => $data['goal'] ?? 'growth',
        'risk_level' => $data['risk'] ?? 'medium',
        'investment_years' => intval($data['years'] ?? 5),
        'monthly_investment' => floatval($data['monthly'] ?? 0),
        'behavior' => [
            'loss_reaction' => $data['loss_reaction'] ?? 'hold',
            'volatility_tolerance' => $data['volatility'] ?? 'medium',
            'risk_attitude' => $data['risk_choice'] ?? 'medium'
        ],
        'created_at' => date('Y-m-d H:i:s')
    ];
}

/* ===== Investor DNA Engine ===== */

function buildInvestorDNA($profile){
    $dna = [];

    // Risk DNA
    if($profile['risk_level']=='low'){
        $dna['risk_type'] = 'Defensive DNA';
        $dna['risk_score'] = 20;
    }elseif($profile['risk_level']=='medium'){
        $dna['risk_type'] = 'Balanced DNA';
        $dna['risk_score'] = 50;
    }else{
        $dna['risk_type'] = 'Aggressive DNA';
        $dna['risk_score'] = 80;
    }

    // Time DNA
    if($profile['investment_years'] >= 10){
        $dna['time_type'] = 'Long-term Investor';
    }elseif($profile['investment_years'] >= 3){
        $dna['time_type'] = 'Mid-term Investor';
    }else{
        $dna['time_type'] = 'Short-term Investor';
    }

    // Capital DNA
    if($profile['monthly_investment'] >= 10000){
        $dna['capital_type'] = 'High Capital Power';
    }elseif($profile['monthly_investment'] >= 3000){
        $dna['capital_type'] = 'Medium Capital Power';
    }else{
        $dna['capital_type'] = 'Low Capital Power';
    }

    return $dna;
}

/* ===== Profile Storage ===== */

function saveProfile($profile,$dna){
    $_SESSION['investor_profile'] = [
        'profile'=>$profile,
        'dna'=>$dna
    ];
}

/* ===== Profile Loader ===== */

function loadProfile(){
    return $_SESSION['investor_profile'] ?? null;
}

/* ===== API MODE ===== */

if($_SERVER['REQUEST_METHOD']==='POST'){
    $profile = createUserProfile($_POST);
    $dna = buildInvestorDNA($profile);
    saveProfile($profile,$dna);

    echo json_encode([
        'status'=>'success',
        'profile'=>$profile,
        'dna'=>$dna
    ]);
}
?>