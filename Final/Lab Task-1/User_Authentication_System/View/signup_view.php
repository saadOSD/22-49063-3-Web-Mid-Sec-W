<?php 
require_once __DIR__ . '/../Controllers/AuthController.php';
$auth = new AuthController();

if(isset($_POST['register'])) {
    $res = $auth->handleSignUp($_POST['username'], $_POST['password']);
    if($res === true) {
        echo "Success! <a href='signin_view.php'>Login</a>";
    } else {
        echo $res;
    }
}
?>
<h2>Sign Up</h2>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit" name="register">Register</button>
</form>