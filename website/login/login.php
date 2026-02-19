<?php
session_start(); // ✅ ต้องมี

include "../config/db.php";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // ✅ ดึง id และ username มาด้วย
    $stmt = $conn->prepare(
        "SELECT id, username, password FROM users WHERE username = ?"
    );
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {

        if (password_verify($password, $row['password'])) {

            // ✅ สร้าง session
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            // ✅ เด้งไปหน้า Home
            header("Location: ../website/Home/index.html");
            exit();

        } else {
            $error = "รหัสผ่านไม่ถูกต้อง";
        }

    } else {
        $error = "ไม่พบ Username นี้";
    }
}
?>


<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<div class="login-card">
    <h1>WELCOME BACK!</h1>
    <p>เข้าสู่ระบบเพื่อใช้งาน</p>

    <!-- แสดง error -->
    <?php if ($error): ?>
        <p style="color:red; margin-bottom:10px;">
            <?= $error ?>
        </p>
    <?php endif; ?>

    <!-- แสดง success -->
    <?php if ($success): ?>
        <p style="color:green; margin-bottom:10px;">
            <?= $success ?>
        </p>
    <?php endif; ?>

    <form method="post">
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>

    <div class="signup">
        ยังไม่มีบัญชี?
        <a href="../register/register.php">สมัครสมาชิก</a>
    </div>
</div>

</body>
</html>