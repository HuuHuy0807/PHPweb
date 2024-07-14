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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
    .banner-container {
        width: 100%;
        margin: 0 auto;
        overflow: hidden;
        position: relative;
    }

    .banner-slide {
        display: none;
        width: 100%;
    }

    .banner-slide img {
        width: 100%;
        height: auto;
        max-height: 300px;
        /* Điều chỉnh chiều cao tối đa của ảnh */
        object-fit: cover;
    }

    .banner-content {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        color: white;
        background-color: rgba(0, 0, 0, 0.7);
        padding: 10px;
        border-radius: 5px;
    }

    .banner-content h2 {
        font-size: 20px;
        margin-bottom: 5px;
    }

    .banner-content p {
        font-size: 16px;
        margin-bottom: 10px;
    }

    .banner-content button {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .prev,
    .next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        padding: 8px;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        font-size: 16px;
        border: none;
        z-index: 100;
    }

    .prev {
        left: 0;
    }

    .next {
        right: 0;
    }


    .footer {
        background-color: #333;
        /* Màu nền */
        color: #fff;
        /* Màu chữ */
        padding: 30px 0;
        /* Khoảng cách giữa phần nội dung và biên của footer */
    }

    .container {
        width: 80%;
        /* Chiều rộng của footer */
        margin: 0 auto;
        /* Canh giữa footer */
    }

    .footer-content {
        display: flex;
        /* Chia các phần nội dung theo chiều ngang */
        flex-wrap: wrap;
        /* Cho phép các phần nội dung xuống dòng nếu không đủ không gian */
        justify-content: space-between;
        /* Canh các phần nội dung theo hai bên */
    }

    .footer-section {
        width: 25%;
        /* Chiều rộng của mỗi cột */
    }

    .footer-section h3 {
        margin-bottom: 10px;
        /* Khoảng cách giữa tiêu đề và nội dung */
    }

    .book-image {
        width: 100%;
        /* Đặt chiều rộng của hình ảnh là 100% để chúng bằng nhau */
        height: auto;
        /* Tự động tính toán chiều cao dựa trên tỷ lệ của hình ảnh */
    }
    </style>
    <style>

    </style>
</head>

<body>

    <div class="header">
        <!-- Header code here -->
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
        <h2>Danh mục sách</h2>
        <div class="row">
            <?php foreach ($categories as $category) : ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo $category['image_url']; ?>" class="card-img-top"
                        alt="<?php echo $category['name']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $category['name']; ?></h5>
                        <p class="card-text"><?php echo $category['description']; ?></p>
                        <a href="category_detail.php?id=<?php echo $category['id']; ?>" class="btn btn-primary">Xem chi
                            tiết</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <footer class="footer">
        <!-- Footer code here -->
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