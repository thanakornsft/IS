<?php
require 'quiz_engine.php';

$data = $_POST['answers'] ?? [];
$result = analyzeQuiz($data);

echo json_encode($result);
?>