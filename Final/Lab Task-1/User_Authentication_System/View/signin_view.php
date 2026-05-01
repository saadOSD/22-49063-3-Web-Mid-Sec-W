<?php 
require_once __DIR__ . '/../Controllers/AuthController.php';
$auth = new AuthController();

if(isset($_POST['login'])) {
    if($auth->handleSignIn($_POST['username'], $_POST['password'])) {
        header("Location: dashboard_view.php");
    } else {
        echo "Invalid Login.";
    }
}
?>
<h2>Login</h2>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit" name="login">Login</button>
</form>