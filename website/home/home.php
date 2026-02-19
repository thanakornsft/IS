<?php
session_start();
?>
<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>InvestPro</title>
<link rel="stylesheet" href="home.css">
</head>

<body>

<nav class="navbar">
    <div class="logo">Invest<span>Pro</span></div>

    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Market</a></li>
        <li><a href="#">Portfolio</a></li>
    </ul>

    <div class="profile-area">
        <?php if(isset($_SESSION['username'])): ?>
            <div class="profile" id="profileBtn">
                <?php echo $_SESSION['username']; ?> ▼
            </div>

            <div class="dropdown" id="dropdownMenu">
                <a href="logout.php" class="logout">ออกจากระบบ</a>
            </div>
        <?php else: ?>
            <a href="login.php" class="login-btn">Login</a>
        <?php endif; ?>
    </div>
</nav>

<section class="hero">
    <h1>ลงทุนอย่างชาญฉลาด<br>สร้างอนาคตที่มั่นคง</h1>
    <p>แพลตฟอร์มวิเคราะห์ตลาดและจัดการพอร์ตแบบมืออาชีพ</p>
    <button class="primary-btn">เริ่มลงทุน</button>
</section>

<section class="stats">
    <div class="card">
    </div>
</section>

<footer>
© 2026 InvestPro. All rights reserved.
</footer>

<script src="home.js"></script>
</body>
</html>


