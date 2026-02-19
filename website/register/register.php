<?php
include "../config/db.php";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST["username"]);
    $password = $_POST["password"];
    $confirm  = $_POST["confirm_password"];

    if (strlen($password) < 6) {
        $error = "รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร";
    } elseif ($password !== $confirm) {
        $error = "รหัสผ่านไม่ตรงกัน";
    } else {

        // เช็ค username ซ้ำ
        $check = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $check->bind_param("s", $username);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $error = "Username นี้ถูกใช้แล้ว";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare(
                "INSERT INTO users (username, password) VALUES (?, ?)"
            );
            $stmt->bind_param("ss", $username, $hash);
            $stmt->execute();

            header("Location: ../login/login.php?success=1");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>Register</title>
<link rel="stylesheet" href="register.css">
</head>
<body>

<div class="register-card">
    <h1>สมัครสมาชิก</h1>
    <p>สร้างบัญชีเพื่อเข้าใช้งานระบบ</p>

    <!-- error -->
    <?php if ($error): ?>
        <p style="color:red"><?= $error ?></p>
    <?php endif; ?>

    <form method="post">
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Confirm Password</label>
        <input type="password" name="confirm_password" required>

        <button type="submit">สมัครสมาชิก</button>
    </form>

    <p>
        มีบัญชีแล้ว?
        <a href="../login/login.php">เข้าสู่ระบบ</a>
    </p>
</div>

</body>
</html>