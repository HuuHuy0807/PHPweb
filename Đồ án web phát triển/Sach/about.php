<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới thiệu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    h1 {
        font-size: 2.5rem;
        margin-bottom: 20px;
    }

    p {
        font-size: 1.1rem;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .video-container {
        margin-bottom: 20px;
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Trang Chủ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Đăng nhập</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Đăng ký</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Đăng xuất</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-5">Giới thiệu về chúng tôi</h1>

        <div class="video-container embed-responsive embed-responsive-16by9">

            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ETM04SQOpCo"
                allowfullscreen></iframe>
        </div>

        <p class="lead">Chúng tôi là cửa hàng sách trực tuyến cung cấp một loạt các tựa sách phong phú từ các thể loại
            khác nhau.</p>
        <p>Chúng tôi cam kết mang lại cho khách hàng những trải nghiệm mua sắm sách trực tuyến thuận lợi và hài lòng
            nhất.</p>
        <p>Hãy tham quan cửa hàng của chúng tôi và khám phá thế giới văn hóa thông qua những cuốn sách đa dạng và phong
            phú.</p>
        <p>Trân trọng cảm ơn sự quan tâm và ủng hộ của quý khách hàng!</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>