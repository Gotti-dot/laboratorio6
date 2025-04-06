<?php
class Docente {
    private $db;
    private $id;
    private $DocenteCodigo;
    private $DocenteCarnetIdentidad;
    private $DocenteNombres;
    private $DocenteFechaNacimiento;
    private $DocenteDireccion;
    private $DocenteCelular;

    public function __construct($db) {
        $this->db = $db;
    }

    // Getters y Setters
    public function getId() { return $this->id; }
    public function getDocenteCodigo() { return $this->DocenteCodigo; }
    public function getDocenteCarnetIdentidad() { return $this->DocenteCarnetIdentidad; }
    public function getDocenteNombres() { return $this->DocenteNombres; }
    public function getDocenteFechaNacimiento() { return $this->DocenteFechaNacimiento; }
    public function getDocenteDireccion() { return $this->DocenteDireccion; }
    public function getDocenteCelular() { return $this->DocenteCelular; }

    public function setId($id) { $this->id = $id; }
    public function setDocenteCodigo($DocenteCodigo) { $this->DocenteCodigo = $DocenteCodigo; }
    public function setDocenteCarnetIdentidad($DocenteCarnetIdentidad) { $this->DocenteCarnetIdentidad = $DocenteCarnetIdentidad; }
    public function setDocenteNombres($DocenteNombres) { $this->DocenteNombres = $DocenteNombres; }
    public function setDocenteFechaNacimiento($DocenteFechaNacimiento) { $this->DocenteFechaNacimiento = $DocenteFechaNacimiento; }
    public function setDocenteDireccion($DocenteDireccion) { $this->DocenteDireccion = $DocenteDireccion; }
    public function setDocenteCelular($DocenteCelular) { $this->DocenteCelular = $DocenteCelular; }

    // Métodos CRUD
    public function getAll() {
        $sql = "SELECT * FROM docentes";
        $result = $this->db->getConnection()->query($sql);
        return $result;
    }

    public function getById($id) {
        $sql = "SELECT * FROM docentes WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function create($data) {
        $sql = "INSERT INTO docentes (id, DocenteCodigo, DocenteCarnetIdentidad, DocenteNombres, DocenteFechaNacimiento, DocenteDireccion, DocenteCelular) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("issssss", $data['id'], $data['DocenteCodigo'], $data['DocenteCarnetIdentidad'], $data['DocenteNombres'], $data['DocenteFechaNacimiento'], $data['DocenteDireccion'], $data['DocenteCelular']);
        return $stmt->execute();
    }

    public function update($id, $data) {
        $sql = "UPDATE docentes SET DocenteCodigo = ?, DocenteCarnetIdentidad = ?, DocenteNombres = ?, DocenteFechaNacimiento = ?, DocenteDireccion = ?, DocenteCelular = ? WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("ssssssi", $data['DocenteCodigo'], $data['DocenteCarnetIdentidad'], $data['DocenteNombres'], $data['DocenteFechaNacimiento'], $data['DocenteDireccion'], $data['DocenteCelular'], $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM docentes WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}