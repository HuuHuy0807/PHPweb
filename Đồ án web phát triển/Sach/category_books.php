<?php
include 'db.php';

if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    $sql = "SELECT * FROM books WHERE category_id = :category_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->execute();
    $books = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục sách</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .category-title {
            display: flex;
            align-items: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .category-title i {
            margin-right: 10px;
        }

        .category-table {
            width: 100%;
            border-collapse: collapse;
        }

        .category-table td {
            padding: 15px;
            text-align: center;
            vertical-align: top;
        }

        .category-table img {
            width: 100px;
            height: auto;
        }

        .category-name {
            margin-top: 10px;
            font-size: 16px;
        }

        .category-table img {
            width: 100%;
            height: auto;
        }

        .card {
            height: 100%;
        }

        .card-body {
            padding: 10px;
        }

        .card-title,
        .card-text {
            margin-bottom: 5px;
            font-size: 16px;
        }

        .container {
            margin-top: 20px;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        .col-md-4 {
            padding: 0 15px;
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
    </style>

</head>

<body>

    <div class=" header">
        <div class="logo">
            <a href="index.php">
                <img src="logo.png" alt="Logo">
            </a>
        </div>

        <div class="search-bar">
            <form action="search.php" method="GET">
                <input type="text" name="query" placeholder="Tìm kiếm...">
                <button type="submit">Tìm kiếm</button>
            </form>
        </div>

        <div class="nav">
            <a href="index.php">Trang chủ</a> |
            <a href="categories.php">Danh mục sách</a> |
            <a href="contact.php">Liên hệ</a> |
            <a href="about.php">Giới thiệu</a> |
            <?php if (isset($_SESSION['user_id'])) : ?>
                <a href="logout.php">Đăng xuất</a>
            <?php else : ?>
                <a href="login.php">Đăng nhập</a> | <a href="register.php">Đăng ký</a>
            <?php endif; ?>
            <a href="cart.php">
                <img src="shopping-cart-icon.jpg" alt="Giỏ hàng" style="height: 30px;">
            </a>
        </div>
    </div>
    <div class="container mt-5">
        <h2>Danh sách sách trong danh mục</h2>
        <div class="row">
            <?php foreach ($books as $book) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="<?php echo $book['image']; ?>" class="card-img-top" alt="<?php echo $book['title']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $book['title']; ?></h5>
                            <p class="card-text"><strong>Tác giả:</strong> <?php echo $book['author']; ?></p>
                            <p class="card-text"><strong>Giá:</strong> <?php echo $book['price']; ?> VND</p>
                            <a href="#" class="btn btn-primary add-to-cart" data-book-id="<?php echo $book['id']; ?>">Thêm
                                vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>