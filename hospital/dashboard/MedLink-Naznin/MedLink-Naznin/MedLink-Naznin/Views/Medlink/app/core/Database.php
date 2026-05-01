<?php
class Database {

    private static $connection = null;

    public static function connect() {

        if (self::$connection === null) {

            self::$connection = new mysqli(
                "localhost",  // host
                "root",       // username
                "",           // password
                "medlink"     // database name
            );

            if (self::$connection->connect_error) {
                die("Database connection failed");
            }
        }

        return self::$connection;
    }
}
