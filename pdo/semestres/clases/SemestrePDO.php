<?php
class SemestrePDO {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM semestres";
        $stmt = $this->db->getConnection()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM semestres WHERE id = :id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO semestres (id, SemestreCodigo, SemestreNumeral, SemestreLiteral) VALUES (:id, :SemestreCodigo, :SemestreNumeral, :SemestreLiteral)";
        $stmt = $this->db->getConnection()->prepare($sql);

        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':SemestreCodigo', $data['SemestreCodigo']);
        $stmt->bindParam(':SemestreNumeral', $data['SemestreNumeral'], PDO::PARAM_BOOL);
        $stmt->bindParam(':SemestreLiteral', $data['SemestreLiteral']);

        return $stmt->execute();
    }

    public function update($id, $data) {
        $sql = "UPDATE semestres SET SemestreCodigo = :SemestreCodigo, SemestreNumeral = :SemestreNumeral, SemestreLiteral = :SemestreLiteral WHERE id = :id";
        $stmt = $this->db->getConnection()->prepare($sql);

        $stmt->bindParam(':SemestreCodigo', $data['SemestreCodigo']);
        $stmt->bindParam(':SemestreNumeral', $data['SemestreNumeral'], PDO::PARAM_BOOL);
        $stmt->bindParam(':SemestreLiteral', $data['SemestreLiteral']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM semestres WHERE id = :id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}