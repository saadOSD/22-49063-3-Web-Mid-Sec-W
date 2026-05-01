<?php
session_start();

// যদি ইউজার ইতিমধ্যে লগইন করা থাকে, তাকে ড্যাশবোর্ডে পাঠিয়ে দিন
if (isset($_SESSION['role']) && $_SESSION['role'] === 'receptionist') {
    // ড্যাশবোর্ডের সঠিক পাথ এখানে দিন। যদি একই ফোল্ডারে থাকে তবে '../' সরিয়ে শুধু ফাইলের নাম দিন।
    header("Location: receptionistdashboard.php"); 
    exit();
}

$error = "";

// ফর্ম সাবমিট হলে
if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // --- MOCK LOGIN LOGIC (TESTING ER JONNO) ---
    // টেস্ট করার জন্য ইমেইল: test@medlink.com
    // পাসওয়ার্ড: 1234
    if ($email === 'test@medlink.com' && $password === '1234') {
        
        // সেশন ভেরিয়েবল সেট করা
        $_SESSION['id'] = 101; 
        $_SESSION['name'] = "Fatima Akter"; // রিসেপশনিস্টের নাম
        $_SESSION['role'] = "receptionist"; // *গুরুত্বপূর্ণ*

        // ড্যাশবোর্ডে রিডাইরেক্ট
        // নোট: ড্যাশবোর্ড ফাইলটি যদি অন্য ফোল্ডারে থাকে তবে পাথ ঠিক করে নিন (যেমন: ../dashboard/receptionistdashboard.php)
        header("Location: receptionistdashboard.php"); 
        exit();

    } else {
        $error = "Invalid Email or Password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receptionist Login - MedLink</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 350px;
            text-align: center;
        }
        .login-container h2 {
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; 
        }
        .btn-login {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        .btn-login:hover {
            background-color: #0056b3;
        }
        .error-msg {
            color: red;
            margin-bottom: 10px;
            font-size: 14px;
        }
        .hint {
            margin-top: 20px;
            font-size: 12px;
            color: #888;
            background: #eee;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>MedLink Reception</h2>
        
        <?php if($error): ?>
            <div class="error-msg"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" required placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required placeholder="Enter password">
            </div>

            <button type="submit" name="login_btn" class="btn-login">Login</button>
        </form>

        <div class="hint">
            <strong>Test Credentials:</strong><br>
            Email: test@medlink.com<br>
            Pass: 1234
        </div>
    </div>

</body>
</html>