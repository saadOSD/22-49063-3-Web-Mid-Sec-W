<?php 
class DatabaseConnection {
    function openConnection() {
        $db_host = "localhost";
        $db_username = "root";
        $db_password = ""; 
        $db_name = "auth_system"; 
        $connection = new mysqli($db_host, $db_username, $db_password, $db_name);

        if($connection->connect_error) {
            die("Connection Error: " . $connection->connect_error);[cite: 2]
        }
        return $connection;
    }

    function CreateUser($connection, $tableName, $username, $password) {
        $sql = "INSERT INTO $tableName (username, password) VALUES('".$username."', '".$password."')";[cite: 2]
        return $connection->query($sql);
    }

    function Login($connection, $tableName, $username, $password) {
        $sql = "SELECT * FROM $tableName WHERE username = '".$username."' AND password = '".$password."'";[cite: 2]
        return $connection->query($sql);
    }

    function checkExistingUserByUsername($connection, $tableName, $username) {
        $sql = "SELECT * FROM $tableName WHERE username = '".$username."'";[cite: 2]
        return $connection->query($sql);
    }
}
?>