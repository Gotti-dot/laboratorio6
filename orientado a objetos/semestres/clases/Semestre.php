<?php
class Semestre {
    private $db;
    private $id;
    private $SemestreCodigo;
    private $SemestreNumeral;
    private $SemestreLiteral;

    public function __construct($db) {
        $this->db = $db;
    }

    // Getters y Setters
    public function getId() { return $this->id; }
    public function getSemestreCodigo() { return $this->SemestreCodigo; }
    public function getSemestreNumeral() { return $this->SemestreNumeral; }
    public function getSemestreLiteral() { return $this->SemestreLiteral; }

    public function setId($id) { $this->id = $id; }
    public function setSemestreCodigo($SemestreCodigo) { $this->SemestreCodigo = $SemestreCodigo; }
    public function setSemestreNumeral($SemestreNumeral) { $this->SemestreNumeral = $SemestreNumeral; }
    public function setSemestreLiteral($SemestreLiteral) { $this->SemestreLiteral = $SemestreLiteral; }

    // Métodos CRUD
    public function getAll() {
        $sql = "SELECT * FROM semestres";
        $result = $this->db->getConnection()->query($sql);
        return $result;
    }

    public function getById($id) {
        $sql = "SELECT * FROM semestres WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function create($data) {
        $sql = "INSERT INTO semestres (id, SemestreCodigo, SemestreNumeral, SemestreLiteral) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("issi", $data['id'], $data['SemestreCodigo'], $data['SemestreNumeral'], $data['SemestreLiteral']);
        return $stmt->execute();
    }

    public function update($id, $data) {
        $sql = "UPDATE semestres SET SemestreCodigo = ?, SemestreNumeral = ?, SemestreLiteral = ? WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("issi", $data['SemestreCodigo'], $data['SemestreNumeral'], $data['SemestreLiteral'], $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM semestres WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}