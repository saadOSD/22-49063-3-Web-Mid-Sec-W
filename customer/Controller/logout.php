<?php
session_start();
session_unset(); // সব সেশন ডেটা মুছে ফেলে
session_destroy(); // সেশনটি পুরোপুরি ধ্বংস করে

// সেশন ডিলিট করার পর লগইন পেজে পাঠিয়ে দেওয়া
header("Location: ../View/customer_login.php");
exit();
?>