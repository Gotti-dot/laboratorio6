<?php
class CarreraPDO {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM carreras";
        $stmt = $this->db->getConnection()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM carreras WHERE id = :id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO carreras (id, CarreraCodigo, CarreraNombre, CarreraAbreviacion) VALUES (:id, :CarreraCodigo, :CarreraNombre, :CarreraAbreviacion)";
        $stmt = $this->db->getConnection()->prepare($sql);

        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':CarreraCodigo', $data['CarreraCodigo']);
        $stmt->bindParam(':CarreraNombre', $data['CarreraNombre']);
        $stmt->bindParam(':CarreraAbreviacion', $data['CarreraAbreviacion']);

        return $stmt->execute();
    }

    public function update($id, $data) {
        $sql = "UPDATE carreras SET CarreraCodigo = :CarreraCodigo, CarreraNombre = :CarreraNombre, CarreraAbreviacion = :CarreraAbreviacion WHERE id = :id";
        $stmt = $this->db->getConnection()->prepare($sql);

        $stmt->bindParam(':CarreraCodigo', $data['CarreraCodigo']);
        $stmt->bindParam(':CarreraNombre', $data['CarreraNombre']);
        $stmt->bindParam(':CarreraAbreviacion', $data['CarreraAbreviacion']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM carreras WHERE id = :id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}