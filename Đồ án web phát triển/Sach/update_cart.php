<?php
session_start();

if (isset($_POST['book_id']) && isset($_POST['quantity'])) {
    $book_id = $_POST['book_id'];
    $quantity = $_POST['quantity'];

    if ($quantity > 0) {
        $_SESSION['cart'][$book_id] = $quantity;
    } else {
        unset($_SESSION['cart'][$book_id]);
    }
}

header('Location: cart.php');
