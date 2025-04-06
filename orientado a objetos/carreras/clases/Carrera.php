<?php
class Carrera {
    private $db;
    private $id;
    private $CarreraCodigo;
    private $CarreraNombre;
    private $CarreraAbreviacion;

    public function __construct($db) {
        $this->db = $db;
    }

    // Getters y Setters
    public function getId() { return $this->id; }
    public function getCarreraCodigo() { return $this->CarreraCodigo; }
    public function getCarreraNombre() { return $this->CarreraNombre; }
    public function getCarreraAbreviacion() { return $this->CarreraAbreviacion; }

    public function setId($id) { $this->id = $id; }
    public function setCarreraCodigo($CarreraCodigo) { $this->CarreraCodigo = $CarreraCodigo; }
    public function setCarreraNombre($CarreraNombre) { $this->CarreraNombre = $CarreraNombre; }
    public function setCarreraAbreviacion($CarreraAbreviacion) { $this->CarreraAbreviacion = $CarreraAbreviacion; }

    // Métodos CRUD
    public function getAll() {
        $sql = "SELECT * FROM carreras";
        $result = $this->db->getConnection()->query($sql);
        return $result;
    }

    public function getById($id) {
        $sql = "SELECT * FROM carreras WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function create($data) {
        $sql = "INSERT INTO carreras (id, CarreraCodigo, CarreraNombre, CarreraAbreviacion) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("isss", $data['id'], $data['CarreraCodigo'], $data['CarreraNombre'], $data['CarreraAbreviacion']);
        return $stmt->execute();
    }

    public function update($id, $data) {
        $sql = "UPDATE carreras SET CarreraCodigo = ?, CarreraNombre = ?, CarreraAbreviacion = ? WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("sssi", $data['CarreraCodigo'], $data['CarreraNombre'], $data['CarreraAbreviacion'], $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM carreras WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}