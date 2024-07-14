<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
    .contact-container {
        display: flex;
        justify-content: space-between;
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .contact-form,
    .contact-info {
        flex: 1;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        background-color: #f9f9f9;
        margin: 10px;
    }

    .contact-form {
        max-width: 48%;
    }

    .contact-info {
        max-width: 48%;
        text-align: center;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .form-group button {
        background-color: #007bff;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .form-group button:hover {
        background-color: #0056b3;
    }

    iframe {
        width: 100%;
        height: 400px;
        border: none;
    }

    .contact-details {
        margin-top: 20px;
    }

    .contact-details p {
        font-size: 16px;
    }
    </style>
</head>

<body>
    <div class="header">
        <div class="logo">
            <a href="index.php">
                <img src="logo.png" alt="Logo">
            </a>
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

    <div class="container">
        <h1>Liên hệ với chúng tôi</h1>
        <?php if (isset($_GET['message'])) : ?>
        <p style="color: green;"><?php echo htmlspecialchars($_GET['message']); ?></p>
        <?php endif; ?>
        <?php if (isset($_GET['error'])) : ?>
        <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>

        <div class="contact-container">
            <div class="contact-info">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3924.633341584368!2d106.34760907479884!3d10.371173489753993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310ab00020095893%3A0x87a144391fd4c37a!2sCo.opmart%20M%E1%BB%B9%20Tho!5e0!3m2!1svi!2s!4v1716822706489!5m2!1svi!2s"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="contact-details">
                    <h3>Thông tin liên hệ</h3>
                    <p>Địa chỉ: đường Ấp Bắc, Thành phố Mỹ Tho, tỉnh Tiền Giang</p>
                    <p>Email: huuhuy08072003@gmail.com</p>
                    <p>Điện thoại: 0947 910 501</p>
                </div>
            </div>
            <div class="contact-form">
                <p class="lead">Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi qua biểu mẫu dưới đây.</p>
                <form method="post" action="contact_process.php">
                    <div class="form-group">
                        <label for="name">Tên của bạn</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email của bạn</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Nội dung</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>