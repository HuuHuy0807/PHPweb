<?php

include 'db.php';

if (isset($_GET['query'])) {
    $search_query = $_GET['query'];


    $sql = "SELECT * FROM books WHERE title LIKE :query OR author LIKE :query";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':query', '%' . $search_query . '%');
    $stmt->execute();
    $search_results = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Kết quả tìm kiếm</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container">
        <h2>Kết quả tìm kiếm</h2>
        <?php if (isset($search_results) && count($search_results) > 0) : ?>
            <div class="row">
                <?php foreach ($search_results as $book) : ?>
                    <div class="col-md-4 mb-4">
                        <!-- Hiển thị thông tin sách -->
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $book['title']; ?></h5>
                                <p class="card-text"><strong>Tác giả:</strong> <?php echo $book['author']; ?></p>
                                <p class="card-text"><strong>Giá:</strong> <?php echo $book['price']; ?> VND</p>
                                <!-- Thêm nút mua hàng hoặc chi tiết -->
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p>Không tìm thấy kết quả phù hợp.</p>
        <?php endif; ?>
    </div>
</body>

</html>