<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && $password === $user['password']) { // Kiểm tra mật khẩu
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: index.php");
        exit;
    } else {
        $error_message = "Tên đăng nhập hoặc mật khẩu không đúng";
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Đăng nhập</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 400px;
        margin: 100px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
    }

    form {
        margin-top: 20px;
    }

    form input {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box;
    }

    form button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
    }

    form button:hover {
        background-color: #0056b3;
    }

    .error {
        color: red;
        margin-top: 10px;
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Đăng nhập</h2>
        <?php if (isset($error_message)) : ?>
        <div class="error"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form method="post">
            <input type="text" name="username" placeholder="Tên đăng nhập" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <button type="submit">Đăng nhập</button>
            <input type="button" value="Quay lại" onclick="returnToHomePage()">
        </form>
    </div>
    <script>
    function returnToHomePage() {
        window.location.href = "index.php";
    }
    </script>
</body>

</html>