<?php
session_start();

if (isset($_POST['book_id'])) {
    $book_id = $_POST['book_id'];

    if (isset($_SESSION['cart'][$book_id])) {
        unset($_SESSION['cart'][$book_id]);
    }

    header('Location: cart.php');
    exit();
}
