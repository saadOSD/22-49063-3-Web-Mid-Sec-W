<?php 
session_start();
include "../Model/DatabaseConnection.php";


if(!isset($_SESSION["isLoggedIn"]) || $_SESSION["role"] !== "customer"){
    header("Location: customer_login.php");
    exit();
}

$customer_id = $_SESSION["id"]; 

$db = new DatabaseConnection();
$conn = $db->openConnection(); 


$result = $db->getPurchaseHistory($conn, $customer_id); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Purchase Records | Filling Station</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; background: #fff; margin-top: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #2c3e50; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .success-msg { color: #155724; background-color: #d4edda; padding: 10px; border: 1px solid #c3e6cb; border-radius: 5px; display: inline-block; margin-bottom: 15px; }
        .nav-links { margin-top: 20px; }
        .nav-links a { text-decoration: none; color: #3498db; font-weight: bold; margin-right: 15px; }
    </style>
</head>
<body>

    <h2>My Purchase Records</h2>

    <?php if(isset($_GET['status']) && $_GET['status'] == 'success'): ?>
        <div class="success-msg">Your order has been placed successfully!</div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>Date & Time</th>
                <th>Fuel Type</th>
                <th>Quantity (Liters)</th>
                <th>Total Price (BDT)</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            
            if($result && mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>
                            <td>" . $row['date'] . "</td>
                            <td>" . $row['fuel_type'] . "</td>
                            <td>" . $row['quantity'] . " L</td>
                            <td>" . $row['total_price'] . " /-</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4' style='text-align:center;'>No records found in your history.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="nav-links">
        <a href="product_page.php">← Back to Products</a>
        <a href="../Controller/logout.php" style="color: #e74c3c;">Logout</a>
    </div>

</body>
</html>