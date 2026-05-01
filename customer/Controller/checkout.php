<?php
include "../Model/DatabaseConnection.php"; 
session_start();

if(!isset($_SESSION["cart"]) || empty($_SESSION["cart"])) {
    header("Location: ../View/product_page.php");
    exit();
}

$db = new DatabaseConnection();
$conn = $db->openConnection();
$customer_id = $_SESSION['id']; 

$success = true;


foreach($_SESSION['cart'] as $item) {
    $result = $db->checkout($conn, $customer_id, $item['name'], $item['qty'], $item['total']);
    if(!$result) {
        $success = false;
    }
}

if($success) {
    unset($_SESSION['cart']); 
    
} else {
    die("Something went wrong during checkout!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Processing Order...</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .checkout-card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 400px;
        }
        .icon-box {
            width: 80px;
            height: 80px;
            background: #2ecc71;
            color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 40px;
            margin: 0 auto 20px;
        }
        h2 { color: #2c3e50; margin-bottom: 10px; }
        p { color: #7f8c8d; margin-bottom: 25px; }
        .btn {
            background-color: #3498db;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .btn:hover { background-color: #2980b9; }
        
        
        .loader {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 1s linear infinite;
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
        }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
    </style>
</head>
<body>

    <div class="checkout-card">
        <div class="icon-box">✓</div>
        <h2>Order Confirmed!</h2>
        <p>Thank you, <strong><?php echo $_SESSION['loggedInUser']; ?></strong>. Your fuel order has been placed successfully.</p>
        
        <div id="redirect-msg">
            <div class="loader"></div> Redirecting to your records...
        </div>

        <script>
            
            setTimeout(function() {
                window.location.href = "../View/record.php?status=success";
            }, 3000);
        </script>
    </div>

</body>
</html>