<?php
session_start();

// ตรวจสอบ login
if(!isset($_SESSION['user_id'])){
    header("Location: ../login/login.php");
    exit();
}

// รับ POST จากฟอร์มแก้ไข profile
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // อัปเดตรูปโปรไฟล์
    if(isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0){
        $targetDir = '../uploads/';
        if(!is_dir($targetDir)) mkdir($targetDir, 0777, true);
        $avatar_path = $targetDir . basename($_FILES['avatar']['name']);
        move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar_path);
        $_SESSION['avatar'] = $avatar_path; // session ชั่วคราว
    }

    // อัปเดต session
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;

    $success = "แก้ไขโปรไฟล์เรียบร้อย!";
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>ปรับแต่งโปรไฟล์</title>
<link rel="stylesheet" href="profile.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="logo">Education For Investment</div>
    <ul class="menu">
        <li><a href="../home/home.php">หน้าแรก</a></li>
    </ul>
    <button id="darkModeBtn" class="dark-mode-toggle">🌙</button>
</nav>

<!-- Profile Container -->
<div class="profile-container">
    <h1>ปรับแต่งโปรไฟล์</h1>

    <?php if(isset($success)): ?>
        <div class="success"><?= $success ?></div>
    <?php endif; ?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="avatar-section">
            <img id="avatarPreview" src="<?= $_SESSION['avatar'] ?? 'default-avatar.png' ?>" class="avatar-preview">
            <input type="file" name="avatar" accept="image/*" onchange="previewAvatar(event)">
        </div>

        <label>ชื่อผู้ใช้</label>
        <input type="text" name="username" value="<?= $_SESSION['username'] ?>" required>

        <label>อีเมล</label>
        <input type="email" name="email" value="<?= $_SESSION['email'] ?? '' ?>" required>

        <label>รหัสผ่านใหม่</label>
        <input type="password" name="password" placeholder="กรอกรหัสผ่านใหม่">

        <button type="submit">บันทึก</button>
    </form>
</div>

<script>
// Avatar live preview
function previewAvatar(event){
    const reader = new FileReader();
    reader.onload = function(){
        document.getElementById('avatarPreview').src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

// Dark Mode Toggle
const darkModeBtn = document.getElementById("darkModeBtn");
darkModeBtn.addEventListener("click", ()=>{
    document.body.classList.toggle("dark");
    darkModeBtn.textContent = document.body.classList.contains("dark") ? "☀️" : "🌙";
    localStorage.setItem("theme", document.body.classList.contains("dark") ? "dark" : "light");
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
