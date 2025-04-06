<?php
class MateriaPDO {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM materias";
        $stmt = $this->db->getConnection()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM materias WHERE id = :id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO materias (id, MateriaCodigo, MateriaNombre, MateriaHoraAcademica, MateriaTipo, MateriaPensum) VALUES (:id, :MateriaCodigo, :MateriaNombre, :MateriaHoraAcademica, :MateriaTipo, :MateriaPensum)";
        $stmt = $this->db->getConnection()->prepare($sql);

        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':MateriaCodigo', $data['MateriaCodigo']);
        $stmt->bindParam(':MateriaNombre', $data['MateriaNombre']);
        $stmt->bindParam(':MateriaHoraAcademica', $data['MateriaHoraAcademica']);
        $stmt->bindParam(':MateriaTipo', $data['MateriaTipo']);
        $stmt->bindParam(':MateriaPensum', $data['MateriaPensum']);

        return $stmt->execute();
    }

    public function update($id, $data) {
        $sql = "UPDATE materias SET MateriaCodigo = :MateriaCodigo, MateriaNombre = :MateriaNombre, MateriaHoraAcademica = :MateriaHoraAcademica, MateriaTipo = :MateriaTipo, MateriaPensum = :MateriaPensum WHERE id = :id";
        $stmt = $this->db->getConnection()->prepare($sql);

        $stmt->bindParam(':MateriaCodigo', $data['MateriaCodigo']);
        $stmt->bindParam(':MateriaNombre', $data['MateriaNombre']);
        $stmt->bindParam(':MateriaHoraAcademica', $data['MateriaHoraAcademica']);
        $stmt->bindParam(':MateriaTipo', $data['MateriaTipo']);
        $stmt->bindParam(':MateriaPensum', $data['MateriaPensum']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM materias WHERE id = :id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}