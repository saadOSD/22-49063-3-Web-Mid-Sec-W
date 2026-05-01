<?php 
require_once __DIR__ . '/../Models/DatabaseConnection.php';

class AuthController {
    private $db;
    private $table = "users";

    public function __construct() {
        $this->db = new DatabaseConnection();
    }

    public function handleSignUp($username, $password) {
        $conn = $this->db->openConnection();[cite: 2]
        $check = $this->db->checkExistingUserByUsername($conn, $this->table, $username);[cite: 2]
        
        if($check->num_rows > 0) {
            return "Username already taken.";
        }

        $result = $this->db->CreateUser($conn, $this->table, $username, $password);[cite: 2]
        $conn->close();
        return $result;
    }

    public function handleSignIn($username, $password) {
        $conn = $this->db->openConnection();[cite: 2]
        $result = $this->db->Login($conn, $this->table, $username, $password);[cite: 2]
        
        if($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $conn->close();
            return true;
        }
        $conn->close();
        return false;
    }
}
?>