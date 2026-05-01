<?php 
session_start();
if(!isset($_SESSION['user_id'])) {
    header("Location: signin_view.php");
}
echo "<h1>Welcome to Dashboard, " . htmlspecialchars($_SESSION['username']) . "!</h1>";
echo "<a href='logout_action.php'>Logout</a>";
?>