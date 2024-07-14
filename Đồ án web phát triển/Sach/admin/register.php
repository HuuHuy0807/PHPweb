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
    $email = $_POST['email'];

    // Kiểm tra xem tên người dùng đã được sử dụng chưa
    $sql_check_username = "SELECT id FROM users WHERE username = '$username'";
    $result_check_username = $conn->query($sql_check_username);
    if ($result_check_username->num_rows > 0) {
        $error = "Tên người dùng đã tồn tại.";
    } else {
        // Chèn dữ liệu vào cơ sở dữ liệu
        $sql_insert_user = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
        if ($conn->query($sql_insert_user) === TRUE) {
            $_SESSION['user_id'] = $conn->insert_id;
            header("Location: admin.php");
            exit();
        } else {
            $error = "Đã xảy ra lỗi. Vui lòng thử lại sau.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Đăng ký - Trang Admin</title>
</head>

<body>
    <h2>Đăng ký - Trang Admin</h2>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <form method="post">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" id="password" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        <button type="submit">Đăng ký</button>
    </form>
</body>

</html>