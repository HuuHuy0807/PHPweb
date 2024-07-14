<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username, $email]);
    $user = $stmt->fetch();

    if ($user) {
        $error_message = "Tên đăng nhập hoặc email đã tồn tại";
    } else {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username, $hashed_password, $email]);

        header("Location: login.php");
        exit;
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Đăng ký</title>
    <style>
        form {
            width: 300px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        select {
            width: calc(100% - 20px);
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .button-group {
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
        }

        .button-group input[type="submit"],
        .button-group input[type="button"] {
            width: calc(50% - 5px);
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            box-sizing: border-box;
        }

        .button-group input[type="button"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <form method="post">
        Tên tài khoản: <input type="text" name="username" required><br>
        Mật khẩu: <input type="password" name="password" required><br>
        Email: <input type="email" name="email" required><br>
        <div class="button-group">
            <input type="submit" value="Đăng ký" name="register">
            <input type="button" value="Quay lại" onclick="returnToHomePage()">
        </div>
    </form>

    <?php if (isset($error_message)) : ?>
        <p style="color: red; text-align: center;"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <script>
        function returnToHomePage() {
            window.location.href = "index.php";
        }
    </script>

</body>

</html>