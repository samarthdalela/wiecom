<?php
// config/database.php

// Prevent multiple inclusions
if (!class_exists('Database')) {

class Database {
    private $host = 'localhost';
    private $port = '3308'; // ✅ Custom MySQL port
    private $db_name = 'upwiecon2025_registration';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};port={$this->port};dbname={$this->db_name}",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            die("Connection Error: " . $e->getMessage());
        }
        return $this->conn;
    }
}

} // End of class_exists check
?>