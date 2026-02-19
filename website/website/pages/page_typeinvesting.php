<?php
session_start();
// ตัวอย่าง session
// $_SESSION['user_id'] = 1;
// $_SESSION['username'] = 'John Doe';
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>Education For Investment</title>
<link rel="stylesheet" href="investing.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="logo">EDUCATION FOR INVESTMENT</div>

    <ul class="menu">
        <li><a href="../home/home.php">หน้าแรก</a></li>
        <li><a href="#">เกี่ยวกับเรา</a></li>
        <li><a href="#">บริการ</a></li>
        <li><a href="#">ติดต่อ</a></li>
    </ul>

    <div class="navbar-right">
        <!-- Dark Mode Toggle -->
        <button id="darkModeBtn" class="dark-mode-toggle">🌙</button>

        <!-- Profile -->
        <?php if(isset($_SESSION['user_id'])): ?>
        <div class="profile" id="profileMenu">
            <div class="profile-btn" onclick="toggleMenu()">
                <div class="avatar"><?= strtoupper(substr($_SESSION['username'],0,1)) ?></div>
                <span><?= $_SESSION['username'] ?></span>
                <span class="arrow" id="arrow">▼</span>
            </div>

            <div class="dropdown" id="dropdownMenu">
                <a href="../Home/profile.php">โปรไฟล์</a>
                <hr>
                <a href="../login/login.php" class="logout">ออกจากระบบ</a>
            </div>
        </div>
        <?php else: ?>
            <a href="../login/login.php" class="btn">Sign In</a>
        <?php endif; ?>
    </div>
</nav>

<!-- ปุ่มการลงทุนมุมขวาล่าง -->
<?php if(isset($_SESSION['user_id'])): ?>
    <button class="btn-invest-fixed" onclick="goInvestment()">การลงทุน</button>
<?php endif; ?>

<!-- type of investment -->
<?php if(isset($_SESSION['user_id'])): ?>
    <button class="btn-typeinvest-fixed" onclick="goTypeInvestment()">การลงทุนในเงินฝาก</button>
<?php endif; ?>

<!-- type of investment -->
<?php if(isset($_SESSION['user_id'])): ?>
    <button class="btn-SavingsLottery-fixed" onclick="goSavingsLottery()">การลงทุนในสลากออมทรัพย์</button>
<?php endif; ?>

<script>
// Profile Dropdown
function toggleMenu(){
    const menu = document.getElementById("dropdownMenu");
    const arrow = document.getElementById("arrow");
    menu.classList.toggle("show");
    arrow.classList.toggle("rotate");
}

window.onclick = function(e){
    if(!e.target.closest('#profileMenu')){
        document.getElementById("dropdownMenu")?.classList.remove("show");
        document.getElementById("arrow")?.classList.remove("rotate");
    }
}

// การลงทุน
function goInvestment(){
    window.location.href = "../pages/page_investing.php";
}


// Deposit account
function goTypeInvestment(){
    window.location.href = "https://www.bot.or.th/th/our-roles/financial-markets/Foreign-Exchange-Market/Fx-hedging/hedging-tools/fcd.html"
}

// Savings Lottery
function goSavingsLottery(){
    window.location.href = "https://blog.ghbank.co.th/what-is-saving-lottery/"
}

// Dark Mode
const darkModeBtn = document.getElementById("darkModeBtn");
darkModeBtn.addEventListener("click", ()=>{
    document.body.classList.toggle("dark");
    if(document.body.classList.contains("dark")){
        darkModeBtn.textContent = "☀️";
        localStorage.setItem("theme","dark");
    } else {
        darkModeBtn.textContent = "🌙";
        localStorage.setItem("theme","light");
    }
});

// โหลด theme จาก localStorage
window.addEventListener("DOMContentLoaded", ()=>{
    const theme = localStorage.getItem("theme");
    if(theme==="dark"){
        document.body.classList.add("dark");
        darkModeBtn.textContent = "☀️";
    }
});
</script>
ตูดๆๆๆๆๆๆๆๆๆๆ
</body>
</html>
