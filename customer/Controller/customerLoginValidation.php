<?php
include "../Model/DatabaseConnection.php";
session_start();

$username = $_POST["username"]; 
$password = $_POST["password"]; 

$hasUsernameError = empty($username);
$hasPasswordError = empty($password);

if($hasUsernameError || $hasPasswordError){
    $_SESSION["usernameError"] = $hasUsernameError ? "Username is required" : "";
    $_SESSION["passwordError"] = $hasPasswordError ? "Password is required" : "";
    $_SESSION["username"] = $username;
    
    // ভুল ইনপুট দিলে লগইন পেজেই ফেরত পাঠাতে হবে
    header("Location: ../View/customer_login.php"); 
    exit();
} else {
    $db = new DatabaseConnection();
    $connection = $db->openConnection(); //
    
    $result = $db->signIn($connection, "users", $username, $password); //

    if($result && $result->num_rows == 1){
        $row = $result->fetch_assoc();
        
        // রোল কাস্টমার হলে তবেই প্রোডাক্ট পেজে যাবে
        if($row["role"] == "customer"){ 
            $_SESSION["isLoggedIn"] = true;
            $_SESSION["id"] = $row["id"];
            $_SESSION["loggedInUser"] = $row["username"];
            $_SESSION["role"] = "customer";
            
            header("Location: ../View/product_page.php");
            exit();
        } else {
            $_SESSION["loggingError"] = "Access Denied! You are not a customer.";
        }
    } else {
        $_SESSION["loggingError"] = "Invalid Customer Credentials!";
    }
    
    $_SESSION["username"] = $username;
    header("Location: ../View/customer_login.php");
    exit();
}
?>