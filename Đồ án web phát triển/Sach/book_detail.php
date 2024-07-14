<?php
include 'db.php';

// Lấy ID của sách từ tham số truy vấn URL
$book_id = $_GET['id'];

// Truy vấn để lấy thông tin chi tiết của cuốn sách dựa vào ID
$sql = "SELECT * FROM books WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$book_id]);
$book_detail = $stmt->fetch();

function convertToEmbedUrl($url)
{
    // Kiểm tra xem URL có phải là dạng watch hay không
    if (preg_match('/watch\?v=([a-zA-Z0-9_-]+)/', $url, $matches)) {
        return 'https://www.youtube.com/embed/' . $matches[1];
    }
    // Kiểm tra xem URL có phải là dạng youtu.be hay không
    if (preg_match('/youtu.be\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
        return 'https://www.youtube.com/embed/' . $matches[1];
    }
    // Nếu không phù hợp với bất kỳ mẫu nào, trả lại URL ban đầu
    return $url;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Thông Tin Chi Tiết Sách</title>
    <link rel="stylesheet" href="css/styles.css">

    <style>
        /* CSS styles here */
        .main-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .book-details {
            flex: 1;
            margin-right: 20px;
            min-width: 300px;
            /* Đảm bảo chiếm ít nhất 300px */
        }

        .video-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 560px;
            /* Đặt kích thước tối đa cho video */
            min-width: 300px;
            /* Đảm bảo chiếm ít nhất 300px */
        }

        .video-container iframe {
            width: 100%;
            height: 315px;
        }

        .book-image {
            max-width: 100%;
            height: auto;
        }

        .small-image {
            max-width: 300px;
            /* Kích thước tối đa cho ảnh */
            height: auto;
        }

        .card {
            margin-bottom: 20px;
        }
    </style>

</head>

<body>

    <div class="container">
        <h2>Thông tin chi tiết sách</h2>
        <div class="main-container">
            <!-- Hiển thị thông tin chi tiết sách -->
            <div class="book-details">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($book_detail['title']); ?></h5>
                        <p class="card-text"><strong>Tác giả:</strong>
                            <?php echo htmlspecialchars($book_detail['author']); ?></p>
                        <p class="card-text"><strong>Giá:</strong>
                            <?php echo htmlspecialchars($book_detail['price']); ?> VND</p>
                        <p class="card-text"><strong>Mô tả:</strong>
                            <?php echo htmlspecialchars($book_detail['description']); ?></p>
                        <img src="<?php echo htmlspecialchars($book_detail['image']); ?>" class="card-img-top book-image <?php echo ($book_detail['title'] == 'Thám tử lừng danh Conan') ? 'small-image' : ''; ?>" alt="<?php echo htmlspecialchars($book_detail['title']); ?>">

                        <!-- Nút mua hàng -->
                        <form method="post" action="add_to_cart.php">
                            <input type="hidden" name="book_id" value="<?php echo htmlspecialchars($book_detail['id']); ?>">
                            <input type="hidden" name="book_title" value="<?php echo htmlspecialchars($book_detail['title']); ?>">
                            <input type="hidden" name="book_price" value="<?php echo htmlspecialchars($book_detail['price']); ?>">
                            <button type="submit" class="btn btn-primary btn-lg">Mua ngay</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Hiển thị video -->

            <div class="video-container">
                <iframe src="<?php echo htmlspecialchars(convertToEmbedUrl($book_detail['video_url'])); ?>" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>

</body>

</html>