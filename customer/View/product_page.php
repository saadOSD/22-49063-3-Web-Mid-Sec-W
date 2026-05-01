<?php 
session_start();
if(!isset($_SESSION["isLoggedIn"]) || $_SESSION["role"] !== "customer"){
    header("Location: customer_login.php");
    exit();
}
?>
<html>
<head><title>Products</title></head>
<body>
    <h2>Available Fuel & Products</h2>
    <style>
    table { border-collapse: collapse; width: 50%; margin-top: 20px; }
    th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
    th { background-color: #f2f2f2; }
    button { cursor: pointer; background-color: #4CAF50; color: white; border: none; padding: 5px 10px; }
</style>
    <table border="1" id="productTable">
        <tr>
            <th>Fuel Type</th>
            <th>Price (per Liter)</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>Octane</td>
            <td id="price_1">135</td>
            <td><input type="number" id="qty_1" min="1" value="1" oninput="calculate(1)"></td>
            <td>
                <button onclick="addToCart('Octane', 135, 1)">Add to Cart</button>
            </td>
        </tr>
        <tr>
            <td>Diesel</td>
            <td id="price_2">106</td>
            <td><input type="number" id="qty_2" min="1" value="1" oninput="calculate(2)"></td>
            <td>
                <button onclick="addToCart('Diesel', 106, 2)">Add to Cart</button>
            </td>
        </tr>
    </table>
    <p id="totalDisplay">Total: 0 BDT</p>
    <a href="cart.php">View Cart</a> | <a href="../Controller/logout.php">Logout</a>

    <script>
        
        function calculate(id) {
            let price = document.getElementById('price_'+id).innerText;
            let qty = document.getElementById('qty_'+id).value;
            document.getElementById('totalDisplay').innerText = "Estimated: " + (price * qty) + " BDT";
        }

        function addToCart(name, price, id) {
            let qty = document.getElementById('qty_'+id).value;
           
            window.location.href = `../Controller/addToCart.php?name=${name}&price=${price}&qty=${qty}`;
        }
    </script>
</body>
</html>