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
<link rel="stylesheet" href="home.css">
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

<!-- ตัวอย่าง content , text -->
<div class="content">
    <h1>WELCOME TO EDUCATION FOR INVESTMENT</h1>
    <h3>เว็ปไซน์นี้จัดทําขึ้นเพื่อวัตถุประสงค์ของนักลงทุนที่ต้องการศึกษาวิธีการลงทุนตั้งแต่พื้นฐานของการลงทุนจนไปถึงการลงทุนในรูปแบบ โดยเว็ปไซน์นี้ได้รวบรวมการลงทุนในทุกรูปแบบโดยไม่ต้องไปนั่งหาจากแหล่งอื่นให้ยุ่งยากตอบโจทย์นักลงทุนเป็นอย่างมาก เราขอขอบคุณผู้ใช้บริการทุกคน</h3>
    <h2>THANK YOU</h2>

</div>

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

</body>
</html>
