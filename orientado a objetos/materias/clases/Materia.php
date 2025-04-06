<?php
class Materia {
    private $db;
    private $id;
    private $MateriaCodigo;
    private $MateriaNombre;
    private $MateriaHoraAcademica;
    private $MateriaTipo;
    private $MateriaPensum;

    public function __construct($db) {
        $this->db = $db;
    }

    // Getters y Setters
    public function getId() { return $this->id; }
    public function getMateriaCodigo() { return $this->MateriaCodigo; }
    public function getMateriaNombre() { return $this->MateriaNombre; }
    public function getMateriaHoraAcademica() { return $this->MateriaHoraAcademica; }
    public function getMateriaTipo() { return $this->MateriaTipo; }
    public function getMateriaPensum() { return $this->MateriaPensum; }

    public function setId($id) { $this->id = $id; }
    public function setMateriaCodigo($MateriaCodigo) { $this->MateriaCodigo = $MateriaCodigo; }
    public function setMateriaNombre($MateriaNombre) { $this->MateriaNombre = $MateriaNombre; }
    public function setMateriaHoraAcademica($MateriaHoraAcademica) { $this->MateriaHoraAcademica = $MateriaHoraAcademica; }
    public function setMateriaTipo($MateriaTipo) { $this->MateriaTipo = $MateriaTipo; }
    public function setMateriaPensum($MateriaPensum) { $this->MateriaPensum = $MateriaPensum; }

    // Métodos CRUD
    public function getAll() {
        $sql = "SELECT * FROM materias";
        $result = $this->db->getConnection()->query($sql);
        return $result;
    }

    public function getById($id) {
        $sql = "SELECT * FROM materias WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function create($data) {
        $sql = "INSERT INTO materias (id, MateriaCodigo, MateriaNombre, MateriaHoraAcademica, MateriaTipo, MateriaPensum) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("isssis", $data['id'], $data['MateriaCodigo'], $data['MateriaNombre'], $data['MateriaHoraAcademica'], $data['MateriaTipo'], $data['MateriaPensum']);
        return $stmt->execute();
    }

    public function update($id, $data) {
        $sql = "UPDATE materias SET MateriaCodigo = ?, MateriaNombre = ?, MateriaHoraAcademica = ?, MateriaTipo = ?, MateriaPensum = ? WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("sssisi", $data['MateriaCodigo'], $data['MateriaNombre'], $data['MateriaHoraAcademica'], $data['MateriaTipo'], $data['MateriaPensum'], $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM materias WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}