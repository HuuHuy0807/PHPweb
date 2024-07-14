<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    // Hiển thị thông báo
    echo "Failed: User is not logged in.";
    // Chuyển hướng đến trang chủ sau 3 giây
    header("refresh:3; url=index.php");
    exit();
}

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

if (!empty($cart)) {
    try {
        $conn->beginTransaction();
        $total = 0;
        foreach ($cart as $book) {
            $total += $book['price'] * $book['quantity'];
        }

        // Chèn dữ liệu vào bảng orders
        $sql = "INSERT INTO orders (user_id, total) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_SESSION['user_id'], $total]);

        // Lấy order_id vừa được chèn vào
        $order_id = $conn->lastInsertId();

        // Chèn dữ liệu vào bảng order_items
        $sql = "INSERT INTO order_items (order_id, book_id, quantity, price) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        foreach ($cart as $book_id => $book) {
            $stmt->execute([$order_id, $book_id, $book['quantity'], $book['price']]);
        }

        $conn->commit();
        unset($_SESSION['cart']);

        header('Location: thank_you.php');
        exit();
    } catch (Exception $e) {

        $conn->rollBack();
        echo "Failed: " . $e->getMessage();
    }
} else {

    header('Location: index.php');
    exit();
}
