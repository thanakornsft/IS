<?php
// ตัวอย่างสมมติว่ามี session เก็บ user info
session_start();

// ข้อมูลผู้ใช้ (ในจริงคุณดึงจากฐานข้อมูล)
$_SESSION['user'] = [
    'name' => 'John Doe',
    'role' => 'Admin',
    'profile' => 'https://i.pravatar.cc/40' // หรือ path รูปจริงจาก DB
];

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SaaS Navbar PHP</title>
<style>
/* Navbar */
nav {
  position: fixed;
  top:0;
  left:0;
  width:100%;
  background: rgba(255,255,255,0.8);
  backdrop-filter: blur(10px);
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  z-index: 50;
}
.nav-container {
  max-width: 1200px;
  margin: auto;
  padding: 0 20px;
  height: 60px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.profile-btn {
  display: flex;
  align-items: center;
  cursor: pointer;
  gap: 8px;
  border: none;
  background: none;
}
.profile-btn img {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  border: 1px solid #ccc;
}
.arrow {
  width: 12px;
  height: 12px;
  border-left: 2px solid #555;
  border-bottom: 2px solid #555;
  transform: rotate(-45deg);
  transition: transform 0.3s ease;
}
.arrow.open {
  transform: rotate(135deg);
}
/* Dropdown */
.dropdown {
  position: absolute;
  right: 0;
  margin-top: 10px;
  width: 160px;
  background: #fff;
  border: 1px solid #ddd;
  border-radius: 8px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  opacity: 0;
  transform: scale(0.95);
  transform-origin: top right;
  pointer-events: none;
  transition: all 0.2s ease;
}
.dropdown.show {
  opacity: 1;
  transform: scale(1);
  pointer-events: auto;
}
.dropdown a {
  display: block;
  padding: 10px 12px;
  text-decoration: none;
  color: #333;
}
.dropdown a:hover {
  background: #f2f2f2;
}
.dropdown .logout {
  color: red;
  font-weight: bold;
}
.dropdown .role {
  font-size: 12px;
  color: #888;
  padding: 8px 12px;
}
</style>
</head>
<body style="margin:0; padding-top:70px; font-family:sans-serif; background:#f9f9f9;">

<nav>
  <div class="nav-container">
    <div class="logo" style="font-weight:bold; font-size:20px;">MySaaS</div>
    <div style="position:relative;">
      <button class="profile-btn" id="profileBtn">
        <img src="<?= $user['profile'] ?>" alt="Profile">
        <span><?= $user['name'] ?></span>
        <div class="arrow" id="arrow"></div>
      </button>
      <div class="dropdown" id="dropdownMenu">
        <div class="role"><?= $user['role'] ?></div>
        <a href="#">Profile</a>
        <a href="#">Settings</a>
        <a href="#" class="logout">Logout</a>
      </div>
    </div>
  </div>
</nav>

<div class="content" style="padding:20px; max-width:800px; margin:auto;">
  <h1>Welcome to the SaaS Dashboard</h1>
  <p>Content goes here...</p>
</div>

<script>
// Dropdown toggle
const profileBtn = document.getElementById('profileBtn');
const dropdownMenu = document.getElementById('dropdownMenu');
const arrow = document.getElementById('arrow');

let open = false;
profileBtn.addEventListener('click', (e) => {
  e.stopPropagation();
  open = !open;
  if(open) {
    dropdownMenu.classList.add('show');
    arrow.classList.add('open');
  } else {
    dropdownMenu.classList.remove('show');
    arrow.classList.remove('open');
  }
});

// ปิด dropdown เมื่อคลิกข้างนอก
document.addEventListener('click', () => {
  if(open) {
    dropdownMenu.classList.remove('show');
    arrow.classList.remove('open');
    open = false;
  }
});
</script>

</body>
</html>
