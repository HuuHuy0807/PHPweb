<!-- create.php -->
<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $category_id = $_POST['category_id'];

    $sql = "INSERT INTO books (title, author, description, price, image, category_id) VALUES ('$title', '$author', '$description', '$price', '$image', '$category_id')";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM categories";
$categories = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Thêm sách mới</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    form label {
        display: block;
        margin-bottom: 10px;
    }

    form input[type="text"],
    form textarea,
    form select {
        width: 100%;
        padding: 8px;
        margin-top: 4px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        resize: vertical;
    }

    form button[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }

    form button[type="submit"]:hover {
        background-color: #45a049;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Thêm sách mới</h1>
        <form method="post" enctype="multipart/form-data">
            <label for="title">Tiêu đề:</label>
            <input type="text" id="title" name="title" required>

            <label for="author">Tác giả:</label>
            <input type="text" id="author" name="author" required>

            <label for="description">Mô tả:</label>
            <textarea id="description" name="description"></textarea>

            <label for="price">Giá:</label>
            <input type="text" id="price" name="price" required>

            <!-- Trường input cho phép tải lên hình ảnh -->
            <label for="image">Hình ảnh:</label>
            <input type="file" id="image" name="image" accept="image/*">

            <label for="category_id">Thể loại:</label>
            <select id="category_id" name="category_id" required>
                <?php while ($row = $categories->fetch_assoc()) : ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php endwhile; ?>
            </select>

            <button type="submit" name="submit">Thêm</button>
        </form>
    </div>
</body>


</html>