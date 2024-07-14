<?php
include 'db.php';
session_start();

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

if (empty($cart)) {
    header('Location: cart.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Xác nhận đơn hàng</h2>
        <?php if (empty($cart)) : ?>
            <div class="alert alert-warning" role="alert">
                Giỏ hàng của bạn đang trống. <a href="cart.php" class="alert-link">Quay lại giỏ hàng</a> để thêm sản phẩm.
            </div>
        <?php else : ?>
            <div class="row">
                <?php foreach ($cart as $book) : ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($book['title']); ?></h5>
                                <p class="card-text"><strong>Giá:</strong> <?php echo htmlspecialchars($book['price']); ?> VND
                                </p>
                                <p class="card-text"><strong>Số lượng:</strong>
                                    <?php echo htmlspecialchars($book['quantity']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <form action="place_order.php" method="post">
                <button type="submit" class="btn btn-primary">Đặt hàng</button>
            </form>
        <?php endif; ?>
    </div>
</body>

</html>