<?php
class DocentePDO {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM docentes";
        $stmt = $this->db->getConnection()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM docentes WHERE id = :id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO docentes (id, DocenteCodigo, DocenteCarnetIdentidad, DocenteNombres, DocenteFechaNacimiento, DocenteDireccion, DocenteCelular) VALUES (:id, :DocenteCodigo, :DocenteCarnetIdentidad, :DocenteNombres, :DocenteFechaNacimiento, :DocenteDireccion, :DocenteCelular)";
        $stmt = $this->db->getConnection()->prepare($sql);

        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':DocenteCodigo', $data['DocenteCodigo']);
        $stmt->bindParam(':DocenteCarnetIdentidad', $data['DocenteCarnetIdentidad']);
        $stmt->bindParam(':DocenteNombres', $data['DocenteNombres']);
        $stmt->bindParam(':DocenteFechaNacimiento', $data['DocenteFechaNacimiento']);
        $stmt->bindParam(':DocenteDireccion', $data['DocenteDireccion']);
        $stmt->bindParam(':DocenteCelular', $data['DocenteCelular']);

        return $stmt->execute();
    }

    public function update($id, $data) {
        $sql = "UPDATE docentes SET DocenteCodigo = :DocenteCodigo, DocenteCarnetIdentidad = :DocenteCarnetIdentidad, DocenteNombres = :DocenteNombres, DocenteFechaNacimiento = :DocenteFechaNacimiento, DocenteDireccion = :DocenteDireccion, DocenteCelular = :DocenteCelular WHERE id = :id";
        $stmt = $this->db->getConnection()->prepare($sql);

        $stmt->bindParam(':DocenteCodigo', $data['DocenteCodigo']);
        $stmt->bindParam(':DocenteCarnetIdentidad', $data['DocenteCarnetIdentidad']);
        $stmt->bindParam(':DocenteNombres', $data['DocenteNombres']);
        $stmt->bindParam(':DocenteFechaNacimiento', $data['DocenteFechaNacimiento']);
        $stmt->bindParam(':DocenteDireccion', $data['DocenteDireccion']);
        $stmt->bindParam(':DocenteCelular', $data['DocenteCelular']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM docentes WHERE id = :id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}