<!-- index.php -->
<?php
include 'config.php';

$sql = "SELECT books.id, books.title, books.author, books.description, books.price, books.image, categories.name as category 
        FROM books 
        JOIN categories ON books.category_id = categories.id
        ORDER BY books.id"; // Sắp xếp theo ID thứ tự
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Danh sách sách</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    a {
        text-decoration: none;
        color: #007bff;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #007bff;
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    img {
        display: block;
        margin: 0 auto;
    }

    .actions {
        text-align: center;
    }

    .actions a {
        margin-right: 10px;
    }
    </style>
</head>

<body>
    <h1>Danh sách sách</h1>


    <div class="actions">
        <a href="create.php">Thêm sách mới</a>
        <a href="/index.php">Quay lại trang chủ</a>
    </div>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Tác giả</th>
            <th>Mô tả</th>
            <th>Giá</th>
            <th>Hình ảnh</th>
            <th>Thể loại</th>
            <th>Hành động</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><img src="<?php echo $row['image']; ?>" width="50" height="50"></td>
            <td><?php echo $row['category']; ?></td>
            <td class="actions">
                <a href="edit.php?id=<?php echo $row['id']; ?>">Sửa</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>"
                    onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">Xóa</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>