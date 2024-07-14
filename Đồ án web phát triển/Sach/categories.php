<?php
include 'db.php';
session_start();

// Truy vấn danh sách các danh mục sách từ cơ sở dữ liệu
$sql = "SELECT * FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll();

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

    .footer {
        background-color: #333;
        color: white;
        padding: 30px 0;
    }

    .footer .container {
        width: 80%;
        margin: 0 auto;
    }

    .footer h3 {
        color: white;
    }

    .footer p {
        color: #ccc;
    }

    .footer .logo img {
        height: 50px;
    }

    .social-icons {
        margin-top: 20px;
    }

    .social-icon {
        margin-right: 15px;
        color: white;
    }

    .social-icon:hover {
        color: #ccc;
    }

    .category-table img {
        width: 100%;
        height: auto;
        max-height: 150px;
        object-fit: cover;
    }

    .footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
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
            <!-- Thanh tìm kiếm -->
            <form action="search.php" method="GET">
                <input type="text" name="query" placeholder="Tìm kiếm...">
                <button type="submit">Tìm kiếm</button>
            </form>
        </div>

        <div class="nav">
            <a href="index.php">Trang chủ</a> |
            <a href="categories.php">Danh mục sách</a> |
            <a href="DS/index.php">Sửa sách</a> |
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
        <div class="category-title">
            <i class="fas fa-th-large"></i>
            <span>Danh mục sản phẩm</span>
        </div>
        <table class="category-table">
            <tr>
                <?php foreach ($categories as $category) : ?>
                <td>
                    <a href="category_books.php?category_id=<?php echo $category['id']; ?>">
                        <img src="<?php echo $category['image_url']; ?>" alt="<?php echo $category['name']; ?>">
                        <div class="category-name"><?php echo $category['name']; ?></div>
                    </a>
                </td>
                <?php endforeach; ?>
            </tr>
        </table>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>Về chúng tôi</h3>
                    <p>Cửa hàng sách cung cấp một loạt các tựa sách phong phú về nhiều lĩnh vực khác nhau. Chúng tôi cam
                        kết
                        mang lại cho khách hàng những trải nghiệm mua sắm sách trực tuyến thuận lợi và hài lòng nhất.
                    </p>
                    <div class="social-icons">
                        <a href="https://www.facebook.com" target="_blank" class="social-icon">
                            <i class="fab fa-facebook-f" style="font-size: 40px;"></i>
                        </a>
                        <a href="https://www.instagram.com" target="_blank" class="social-icon">
                            <i class="fab fa-instagram" style="font-size: 40px;"></i>
                        </a>
                        <a href="https://www.youtube.com" target="_blank" class="social-icon">
                            <i class="fab fa-youtube" style="font-size: 40px;"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>Liên hệ</h3>
                    <p>Địa chỉ: đường Ấp Bắc, Thành phố Mỹ Tho, tỉnh Tiền Giang</p>
                    <p>Email: huuhuy08072003@gmail.com</p>
                    <p>Điện thoại: 0947 910 501</p>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>