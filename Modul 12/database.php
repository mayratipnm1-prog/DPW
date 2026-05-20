<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = ""; 
    private $database = "db_praktik";
    public $con;

    public function __construct() {
        $this->con = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->con->connect_error) {
            die("Koneksi Database Gagal: " . $this->con->connect_error);
        }
    }

    public function closeConnection() {
        $this->con->close();
    }
}
?>