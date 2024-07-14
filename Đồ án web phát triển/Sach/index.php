<?php
include 'db.php';
session_start();

$sql = "SELECT * FROM books";
$stmt = $conn->prepare($sql);
$stmt->execute();
$books = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cửa hàng sách</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

            color: #fff;

            padding: 30px 0;

        }

        .container {
            width: 80%;

            margin: 0 auto;

        }

        .footer-content {
            display: flex;

            flex-wrap: wrap;

            justify-content: space-between;

        }

        .footer-section {
            width: 25%;

        }

        .footer-section h3 {
            margin-bottom: 10px;

        }

        .button-container {
            display: flex;
            justify-content: center;
        }

        .btn-detail {
            margin-right: 10px;
        }

        .btn-buy {
            margin-left: 10px;
        }

        .card {
            height: 100%;
        }

        .card-img-top {
            height: 200px;

            object-fit: cover;

        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 15px;
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

    <div class="banner-slide">
        <img src="/imgbanner/banner1.jpg" alt="Banner 1">
    </div>
    <div class="banner-slide">
        <img src="/imgbanner/banner2.jpg" alt="Banner 2">
    </div>
    <div class="banner-slide">
        <img src="/imgbanner/banner3.jpg" alt="Banner 3">
    </div>
    <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
    <button class="next" onclick="changeSlide(1)">&#10095;</button>
    </div>


    <div class="container">
        <h2>Sách Bán Chạy</h2>
        <div class="row">
            <?php foreach ($books as $book) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?php echo $book['image']; ?>" class="card-img-top" alt="<?php echo $book['title']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $book['title']; ?></h5>
                            <p class="card-text"><strong>Tác giả:</strong> <?php echo $book['author']; ?></p>
                            <p class="card-text"><strong>Giá:</strong> <?php echo $book['price']; ?> VND</p>
                            <div class="button-container">
                                <a href="book_detail.php?id=<?php echo $book['id']; ?>" class="btn btn-primary btn-detail">Xem chi tiết</a>
                                <form method="post" action="add_to_cart.php">
                                    <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                                    <input type="hidden" name="book_title" value="<?php echo $book['title']; ?>">
                                    <input type="hidden" name="book_price" value="<?php echo $book['price']; ?>">
                                    <button type="submit" class="btn btn-primary btn-buy">Mua hàng</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
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

    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("banner-slide");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 2000); // Thay đổi hình ảnh mỗi 2 giây
        }

        function changeSlide(n) {
            showSlides(slideIndex += n);
        }
    </script>
</body>

</html>