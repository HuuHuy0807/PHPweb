<?php
include 'db.php';
session_start();

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
    .card {
        margin-bottom: 20px;
        border: 1px solid #dee2e6;
    }

    .card-title {
        margin-bottom: 0.75rem;
        font-size: 1.25rem;
        font-weight: 500;
    }

    .card-text {
        margin-bottom: 0.5rem;
    }

    .btn-danger {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Giỏ hàng của bạn</h2>
        <div class="row">
            <?php if (!empty($cart) && is_array($cart)) : ?>
            <?php foreach ($cart as $book_id => $book) : ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($book['title'] ?? ''); ?></h5>
                        <p class="card-text"><strong>Giá:</strong> <?php echo htmlspecialchars($book['price'] ?? ''); ?>
                            VND
                        </p>
                        <p class="card-text"><strong>Số lượng:</strong>
                            <span
                                id="quantity-<?php echo $book_id; ?>"><?php echo htmlspecialchars($book['quantity'] ?? ''); ?></span>
                            <!-- Thêm nút thay đổi số lượng -->
                            <button class="btn btn-primary btn-sm ml-2"
                                onclick="changeQuantity(<?php echo $book_id; ?>, 'increase')">+</button>
                            <button class="btn btn-primary btn-sm ml-2"
                                onclick="changeQuantity(<?php echo $book_id; ?>, 'decrease')">-</button>
                        </p>
                        <form method="post" action="remove_from_cart.php">
                            <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else : ?>
            <p>Giỏ hàng của bạn đang trống.</p>
            <?php endif; ?>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <a href="index.php" class="btn btn-primary">Tiếp tục mua hàng</a>
                <a href="checkout.php" class="btn btn-success">Thanh toán</a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
    function changeQuantity(bookId, action) {
        var quantityElement = document.getElementById('quantity-' + bookId);
        var currentQuantity = parseInt(quantityElement.innerHTML);
        var newQuantity;
        if (action === 'increase') {
            newQuantity = currentQuantity + 1;
        } else if (action === 'decrease') {
            newQuantity = Math.max(currentQuantity - 1, 0);
        }
        quantityElement.innerHTML = newQuantity;
    }
    </script>
</body>

</html>