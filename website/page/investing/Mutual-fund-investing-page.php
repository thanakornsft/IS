<?php /* mutual_fund.php */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Mutual Fund Investment</title>
<link rel="stylesheet" href="Mutual-fund-investing-page.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body>
<div class="mf-hero">
  <div class="overlay"></div>
  <div class="hero-content">
    <h1>Mutual Fund Investment</h1>
    <p>ระบบการลงทุนกองทุนรวมแบบมืออาชีพ</p>
  </div>
</div>
<div>
  <nav class="navbar">
    <a href="../start/start.php" class="btn-back">← ย้อนกลับ</a>
</nav>
</div>
<section class="mf-section">
  <div class="mf-grid">

    <div class="mf-card" onclick="location.href='fund_detail.php?type=money'">
      <h2>กองทุนตลาดเงิน</h2>
      <p>ความเสี่ยงต่ำ เหมาะสำหรับพักเงิน</p>
      <ul>
        <li>สภาพคล่องสูง</li>
        <li>ความผันผวนต่ำ</li>
        <li>เหมาะมือใหม่</li>
      </ul>
    </div>

    <div class="mf-card" onclick="location.href='fund_detail.php?type=bond'">
      <h2>กองทุนตราสารหนี้</h2>
      <p>รายได้สม่ำเสมอ ความเสี่ยงปานกลาง</p>
      <ul>
        <li>ดอกเบี้ยสม่ำเสมอ</li>
        <li>เสถียรภาพสูง</li>
        <li>กระจายความเสี่ยง</li>
      </ul>
    </div>

    <div class="mf-card" onclick="location.href='fund_detail.php?type=stock'">
      <h2>กองทุนหุ้น</h2>
      <p>โอกาสเติบโตสูง ระยะยาว</p>
      <ul>
        <li>Capital Gain</li>
        <li>Dividend</li>
        <li>Growth Fund</li>
      </ul>
    </div>

    <div class="mf-card" onclick="location.href='fund_detail.php?type=mixed'">
      <h2>กองทุนรวมผสม</h2>
      <p>สมดุลความเสี่ยงและผลตอบแทน</p>
      <ul>
        <li>Balanced Fund</li>
        <li>Asset Allocation</li>
        <li>Stability</li>
      </ul>
    </div>

    <div class="mf-card" onclick="location.href='fund_detail.php?type=esg'">
      <h2>กองทุน ESG</h2>
      <p>ลงทุนอย่างยั่งยืนระดับโลก</p>
      <ul>
        <li>Environment</li>
        <li>Social</li>
        <li>Governance</li>
      </ul>
    </div>

    <div class="mf-card" onclick="location.href='fund_detail.php?type=global'">
      <h2>กองทุนต่างประเทศ</h2>
      <p>โอกาสเติบโตระดับ Global</p>
      <ul>
        <li>US / EU / Asia</li>
        <li>Global Market</li>
        <li>Currency Diversify</li>
      </ul>
    </div>

  </div>
</section>
</body>
</html>
