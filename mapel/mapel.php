<?php
class Mapel {
    private $conn;
    private $table = 'mapel'; // Variabel untuk nama tabel

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function create($nama_mapel) {
        $query = "INSERT INTO " . $this->table . " (nama_mapel) VALUES ('$nama_mapel')";
        return $this->conn->query($query);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id_mapel = $id";
        return $this->conn->query($query)->fetch_assoc();
    }

    public function update($id, $nama_mapel) {
        $query = "UPDATE " . $this->table . " SET nama_mapel = '$nama_mapel' WHERE id_mapel = $id";
        return $this->conn->query($query);
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id_mapel = $id";
        return $this->conn->query($query);
    }
}
?>
