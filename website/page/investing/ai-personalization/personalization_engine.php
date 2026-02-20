<?php
function buildUserProfile($data){
    $profile = [];

    $profile['risk_tolerance'] = ($data['loss_reaction'] + $data['volatility'] + $data['risk_choice']) / 3;
    $profile['time_horizon'] = $data['years'];
    $profile['capital_power'] = $data['monthly'];
    $profile['goal_type'] = $data['goal'];

    // Personality model
    if($profile['risk_tolerance'] < 1.5){
        $profile['personality'] = 'Defensive Investor';
    }elseif($profile['risk_tolerance'] < 2.5){
        $profile['personality'] = 'Balanced Strategist';
    }else{
        $profile['personality'] = 'Growth Seeker';
    }

    return $profile;
}

function personalizeRecommendation($profile){
    $rec = [];

    if($profile['personality']=='Defensive Investor'){
        $rec['style'] = 'Capital Preservation Strategy';
        $rec['assets'] = ['Money Market'=>40,'Bond Fund'=>40,'Balanced Fund'=>15,'Gold'=>5];
    }
    elseif($profile['personality']=='Balanced Strategist'){
        $rec['style'] = 'Balanced Growth Strategy';
        $rec['assets'] = ['Equity Fund'=>35,'Bond Fund'=>30,'Mixed Fund'=>25,'REIT'=>10];
    }
    else{
        $rec['style'] = 'Aggressive Growth Strategy';
        $rec['assets'] = ['Equity Fund'=>55,'Global Fund'=>20,'ESG Fund'=>15,'Crypto'=>10];
    }

    return $rec;
}
?>