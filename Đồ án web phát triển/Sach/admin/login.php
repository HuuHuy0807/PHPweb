<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: admin.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'config.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        header("Location: admin.php");
        exit();
    } else {
        $error = "Tên đăng nhập hoặc mật khẩu không đúng.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập - Trang Admin</title>
</head>

<body>
    <h2>Đăng nhập - Trang Admin</h2>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <form method="post">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" id="password" required><br>
        <button type="submit">Đăng nhập</button>
    </form>
</body>

</html>