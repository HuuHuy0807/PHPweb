<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

// Code để hiển thị, thêm, sửa và xóa danh mục sách sẽ được đặt ở đây
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Trang Admin - Quản lý danh mục sách</title>
</head>

<body>
    <h2>Trang Admin - Quản lý danh mục sách</h2>
    <!-- Code HTML để hiển thị và quản lý danh mục sách -->
    <a href="logout.php">Đăng xuất</a>
</body>

</html>