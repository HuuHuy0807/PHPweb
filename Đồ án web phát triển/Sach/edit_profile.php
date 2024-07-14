<?php

include 'db.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newName = $_POST['name'];
    $newEmail = $_POST['email'];
    $updateQuery = "UPDATE users SET name = '$newName', email = '$newEmail' WHERE username = '$username'";
    $updateResult = mysqli_query($con, $updateQuery);
    if ($updateResult) {
        $message = "Thông tin đã được cập nhật thành công.";
    } else {
        $error = "Có lỗi xảy ra, vui lòng thử lại sau.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay đổi thông tin</title>
</head>

<body>
    <h2>Thay đổi thông tin</h2>
    <?php if (isset($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <?php if (isset($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div>
            <label for="name">Họ và tên:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
        </div>
        <div>
            <button type="submit">Cập nhật</button>
        </div>
    </form>
</body>

</html>