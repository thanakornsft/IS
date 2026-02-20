<?php
// จำลองข้อมูลการลงทุน
$investments = [
    ["type"=>"หุ้น", "name"=>"บริษัท A", "symbol"=>"A", "value"=>1250.50, "change"=>"+2.3%"],
    ["type"=>"คริปโต", "name"=>"Bitcoin", "symbol"=>"BTC", "value"=>28000.75, "change"=>"-1.2%"],
    ["type"=>"กองทุน", "name"=>"กองทุน ABC", "symbol"=>"ABC", "value"=>105.20, "change"=>"+0.8%"],
    ["type"=>"ETF", "name"=>"ETF XYZ", "symbol"=>"XYZ", "value"=>500.00, "change"=>"+1.5%"]
];
?>
<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Investment Dashboard</title>
<link rel="stylesheet" href="investments.css">
</head>
<body>
    <header>
        <h1>💹 Investment Dashboard</h1>
        <nav>
            <a href="#">หน้าแรก</a>
            <a href="#">โปรไฟล์</a>
            <a href="#">Logout</a>
        </nav>
    </header>

    <main>
        <h2>รายการการลงทุนของคุณ</h2>
        <div class="cards-container">
            <?php foreach($investments as $inv): ?>
            <div class="card">
                <div class="card-header">
                    <span class="type"><?php echo $inv['type']; ?></span>
                    <span class="symbol"><?php echo $inv['symbol']; ?></span>
                </div>
                <h3><?php echo $inv['name']; ?></h3>
                <p class="value">มูลค่า: ฿<?php echo number_format($inv['value'], 2); ?></p>
                <p class="change <?php echo ($inv['change'][0] == '+') ? 'up' : 'down'; ?>">
                    <?php echo $inv['change']; ?>
                </p>
                <button>ดูรายละเอียด</button>
            </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>