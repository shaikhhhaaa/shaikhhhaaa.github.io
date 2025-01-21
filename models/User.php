<?php
class User {

    // Get a single user by username
    public static function getUserByUsername($username) {
        $pdo = self::getPDO();  // Get PDO instance
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get all users from the database
    public static function getAllUsers() {
        $pdo = self::getPDO();  // Get PDO instance
        $sql = "SELECT * FROM users";  // SQL to select all users
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Return all users as an array
    }

    // Get PDO instance for connecting to the database
    private static function getPDO() {
        try {
            // Update with the correct path to the database
            $pdo = new PDO('sqlite:' . __DIR__ . '/../spat.db');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Enable error handling
            return $pdo;
        } catch (PDOException $e) {
            die("Could not connect to the database: " . $e->getMessage());
        }
    }
}
?>
