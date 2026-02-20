<?php
$id = $_GET['id'] ?? '';

$data = json_decode(file_get_contents(__DIR__."/data/funds.json"), true);

$fund = null;
foreach($data as $f){
    if($f['id'] === $id){
        $fund = $f;
        break;
    }
}

if(!$fund){
    die("Fund not found");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?= $fund['name'] ?></title>
</head>

<body>

<h1><?= $fund['name'] ?></h1>
<p><?= $fund['desc'] ?></p>

<ul>
<li>ROI: <?= $fund['roi'] ?>%</li>
<li>Risk: <?= $fund['risk'] ?></li>
<li>ESG: <?= $fund['esg'] ?></li>
<li>AUM: <?= $fund['aum'] ?></li>
</ul>

<a href="fund_download.php?id=<?= $fund['id'] ?>">📥 Download Fund Sheet</a><br><br>
<a href="fund_sheet.php">⬅ Back</a>

</body>
</html>