<?php
session_start();
if(isset($_GET['name'])) {
    $item = [
        'name' => $_GET['name'],
        'price' => $_GET['price'],
        'qty' => $_GET['qty'],
        'total' => $_GET['price'] * $_GET['qty']
    ];
    
    $_SESSION['cart'][] = $item;
    header("Location: ../View/cart.php");
}
?>