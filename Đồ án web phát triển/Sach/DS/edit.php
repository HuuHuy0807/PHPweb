<!-- edit.php -->
<?php
include 'config.php';

$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $category_id = $_POST['category_id'];

    $sql = "UPDATE books SET title='$title', author='$author', description='$description', price='$price', image='$image', category_id='$category_id' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM books WHERE id='$id'";
$result = $conn->query($sql);
$book = $result->fetch_assoc();

$sql = "SELECT * FROM categories";
$categories = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa sách</title>
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

    form {
        width: 50%;
        margin: 0 auto;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"],
    textarea,
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body>
    <h1>Chỉnh sửa sách</h1>
    <form method="post">
        <label>Tiêu đề: <input type="text" name="title" value="<?php echo $book['title']; ?>" required></label>
        <label>Tác giả: <input type="text" name="author" value="<?php echo $book['author']; ?>" required></label>
        <label>Mô tả: <textarea name="description"><?php echo $book['description']; ?></textarea></label>
        <label>Giá: <input type="text" name="price" value="<?php echo $book['price']; ?>" required></label>
        <label>Hình ảnh: <input type="text" name="image" value="<?php echo $book['image']; ?>"></label>
        <label>Thể loại:
            <select name="category_id" required>
                <?php while ($row = $categories->fetch_assoc()) : ?>
                <option value="<?php echo $row['id']; ?>"
                    <?php if ($row['id'] == $book['category_id']) echo 'selected'; ?>><?php echo $row['name']; ?>
                </option>
                <?php endwhile; ?>
            </select>
        </label>
        <button type="submit">Cập nhật</button>
    </form>
</body>

</html>