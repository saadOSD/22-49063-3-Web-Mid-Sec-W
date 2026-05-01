<?php
class DatabaseConnection {
    // ডাটাবেস ক্রেডেনশিয়ালস
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "filling_station";

    // কানেকশন ওপেন করার ফাংশন
    function openConnection() {
        $conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }

    // লগইন চেক করার ফাংশন
    function signIn($conn, $table, $username, $password) {
        // SQL Injection থেকে বাঁচতে এবং নির্ভুল ডেটা পেতে কোড
        $sql = "SELECT * FROM $table WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    // রেজিস্ট্রেশন ফাংশন
    function signUp($conn, $table, $username, $password, $image_path) {
        // ডিফল্টভাবে 'customer' রোল সেট করা হয়েছে যাতে লগইন ভ্যালিডেশন কাজ করে
        $sql = "INSERT INTO $table (username, password, image_path, role) 
                VALUES ('$username', '$password', '$image_path', 'customer')";
        return mysqli_query($conn, $sql);
    }

    // কাস্টমারের কেনাকাটা সেভ করার ফাংশন (Checkout)
    function checkout($conn, $customer_id, $fuel_name, $quantity, $total_price) {
        $sql = "INSERT INTO transactions (customer_id, fuel_type, quantity, total_price, date) 
                VALUES ('$customer_id', '$fuel_name', '$quantity', '$total_price', NOW())";
        return mysqli_query($conn, $sql);
    }

    // কেনাকাটার হিস্ট্রি দেখানোর ফাংশন
    function getPurchaseHistory($conn, $customer_id) {
        $sql = "SELECT * FROM transactions WHERE customer_id = '$customer_id' ORDER BY date DESC";
        return mysqli_query($conn, $sql);
    }
}
?>