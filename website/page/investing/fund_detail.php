<?php
$type = $_GET['type'] ?? 'money';

$data = [
  'money' => [
    'title' => 'กองทุนตลาดเงิน',
    'desc' => 'กองทุนความเสี่ยงต่ำ เหมาะสำหรับพักเงินและสภาพคล่อง',
    'use' => 'ใช้สำหรับเก็บเงินระยะสั้น/เงินฉุกเฉิน',
    'guide' => 'ลงทุนสม่ำเสมอ เน้นความปลอดภัย ไม่เน้นผลตอบแทนสูง',
    'risk' => 'ต่ำมาก',
    'strategy' => 'เน้นรักษาเงินต้น'
  ],
  'bond' => [
    'title' => 'กองทุนตราสารหนี้',
    'desc' => 'สร้างรายได้ประจำ เสถียรภาพสูง',
    'use' => 'เหมาะสำหรับรายได้ประจำ',
    'guide' => 'ลงทุนระยะกลาง',
    'risk' => 'ต่ำ-กลาง',
    'strategy' => 'เน้นกระแสเงินสด'
  ],
  'stock' => [
    'title' => 'กองทุนหุ้น',
    'desc' => 'เติบโตสูง ระยะยาว',
    'use' => 'สร้างความมั่งคั่ง',
    'guide' => 'ลงทุน DCA ระยะยาว',
    'risk' => 'สูง',
    'strategy' => 'Growth Investing'
  ],
  'mixed' => [
    'title' => 'กองทุนรวมผสม',
    'desc' => 'สมดุลความเสี่ยงและผลตอบแทน',
    'use' => 'พอร์ตสมดุล',
    'guide' => 'กระจายสินทรัพย์',
    'risk' => 'กลาง',
    'strategy' => 'Balanced Portfolio'
  ],
  'esg' => [
    'title' => 'กองทุน ESG',
    'desc' => 'ลงทุนอย่างยั่งยืนระดับโลก',
    'use' => 'การลงทุนระยะยาว',
    'guide' => 'เลือกกองทุนคุณภาพ',
    'risk' => 'กลาง',
    'strategy' => 'Sustainable Growth'
  ],
  'global' => [
    'title' => 'กองทุนต่างประเทศ',
    'desc' => 'โอกาสเติบโตระดับโลก',
    'use' => 'กระจายความเสี่ยง',
    'guide' => 'ลงทุนหลายภูมิภาค',
    'risk' => 'กลาง-สูง',
    'strategy' => 'Global Allocation'
  ]
];

$f = $data[$type];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?= $f['title'] ?></title>
<link rel="stylesheet" href="fund_detail.css">
</head>
<body>

<div class="detail-container">
  <h1><?= $f['title'] ?></h1>
  <p class="desc"><?= $f['desc'] ?></p>

  <div class="detail-grid">
    <div class="box"><h3>วิธีใช้งาน</h3><p><?= $f['use'] ?></p></div>
    <div class="box"><h3>แนวทางการลงทุน</h3><p><?= $f['guide'] ?></p></div>
    <div class="box"><h3>ความเสี่ยง</h3><p><?= $f['risk'] ?></p></div>
    <div class="box"><h3>กลยุทธ์</h3><p><?= $f['strategy'] ?></p></div>
  </div>

  <a href="mutual_fund.php" class="back-btn">← กลับหน้ากองทุนรวม</a>
</div>

</body>
</html>