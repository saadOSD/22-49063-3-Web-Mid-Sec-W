<?php 
session_start();

$usernameError = $_SESSION["usernameError"] ?? "";
$passwordError = $_SESSION["passwordError"] ?? "";
$username = $_SESSION["username"] ?? "";
$loggingError = $_SESSION["loggingError"] ?? "";
$isLoggedIn = $_SESSION["isLoggedIn"] ?? false;

if($isLoggedIn){
    header("Location: product_page.php"); 
    exit();
}

unset($_SESSION["usernameError"]);
unset($_SESSION["passwordError"]);
unset($_SESSION["username"]);
unset($_SESSION["loggingError"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login | Filling Station</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #2c3e50, #34495e);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #fff;
        }
        .login-container {
            background: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 400px;
            color: #333;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
            font-size: 28px;
            border-bottom: 2px solid #3498db;
            display: inline-block;
            width: 100%;
            padding-bottom: 10px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box; /* ইনপুট বক্সের সাইজ ঠিক রাখে */
            transition: border-color 0.3s;
        }
        .form-group input:focus {
            border-color: #3498db;
            outline: none;
        }
        .error {
            color: #e74c3c;
            font-size: 13px;
            margin-top: 5px;
        }
        .btn-login {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 10px;
        }
        .btn-login:hover {
            background-color: #2980b9;
        }
        .register-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
        .register-link a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }
        .logging-error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Customer Login</h2>

        <?php if($loggingError): ?>
            <div class="logging-error"><?php echo $loggingError; ?></div>
        <?php endif; ?>

        <form method="post" action="../Controller/customerLoginValidation.php">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Enter your username">
                <div class="error"><?php echo $usernameError; ?></div>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password">
                <div class="error"><?php echo $passwordError; ?></div>
            </div>

            <button type="submit" name="submit" class="btn-login">Login</button>
        </form>

        <div class="register-link">
            Don't have an account? <a href="registration.php">Register here</a>
        </div>
    </div>

</body>
</html>