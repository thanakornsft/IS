<?php
require 'personalization_engine.php';

$data = $_POST;

$profile = buildUserProfile($data);
$recommendation = personalizeRecommendation($profile);

echo json_encode([
    'profile'=>$profile,
    'recommendation'=>$recommendation
]);
?>