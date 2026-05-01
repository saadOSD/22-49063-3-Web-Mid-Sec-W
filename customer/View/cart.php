<?php 
session_start();
$cart = $_SESSION['cart'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Shopping Cart</title>
    <style>
        :root {
            --primary-color: #2ecc71;
            --secondary-color: #34495e;
            --bg-color: #f4f7f6;
            --text-color: #2c3e50;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            display: flex;
            justify-content: center;
            padding: 40px 20px;
        }

        .cart-container {
            width: 100%;
            max-width: 800px;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        h2 {
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 10px;
            margin-bottom: 20px;
            color: var(--secondary-color);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th {
            background-color: var(--secondary-color);
            color: white;
            text-align: left;
            padding: 12px;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            transition: transform 0.2s, background 0.3s;
        }

        button:hover {
            background-color: #27ae60;
            transform: translateY(-2px);
        }

        .continue-link {
            text-decoration: none;
            color: #7f8c8d;
            font-size: 14px;
            transition: color 0.2s;
        }

        .continue-link:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        
        .empty-msg {
            text-align: center;
            padding: 40px;
            color: #95a5a6;
        }
    </style>
</head>
<body>

<div class="cart-container">
    <h2>Your Shopping Cart</h2>

    <?php if(empty($cart)): ?>
        <p class="empty-msg">Your cart is currently empty.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($cart as $item): ?>
                <tr>
                    <td><strong><?php echo htmlspecialchars($item['name']); ?></strong></td>
                    <td><?php echo (int)$item['qty']; ?></td>
                    <td><?php echo number_format($item['total'], 2); ?> BDT</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <div class="actions">
        <a href="product_page.php" class="continue-link">← Continue Shopping</a>
        
        <?php if(!empty($cart)): ?>
        <form action="../Controller/checkout.php" method="post" style="margin: 0;">
            <button type="submit">Confirm Order (Checkout)</button>
        </form>
        <?php endif; ?>
    </div>
</div>

</body>
</html>