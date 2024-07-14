<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book_id']) && isset($_POST['book_title']) && isset($_POST['book_price'])) {

    $book_id = $_POST['book_id'];
    $book_title = $_POST['book_title'];
    $book_price = $_POST['book_price'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$book_id])) {

        $_SESSION['cart'][$book_id]['quantity']++;
    } else {

        $_SESSION['cart'][$book_id] = [
            'title' => $book_title,
            'price' => $book_price,
            'quantity' => 1
        ];
    }


    header('Location: cart.php');
    exit();
} else {

    header('Location: index.php');
    exit();
}
