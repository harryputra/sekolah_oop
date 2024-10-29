<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'sekolah_oop';
    private $username = 'root';
    private $password = '';
    public $conn;

    // Method untuk membuat koneksi ke database
    public function getConnection() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        return $this->conn;
    }
}
?>
