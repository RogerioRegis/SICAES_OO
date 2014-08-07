<?php

class Registro {

    protected $table = 'registro';
    protected $instance;
    protected $name;
    protected $tipo;

    public function __construct() {
        $this->instance = new PDO('pgsql:host=localhost;dbname=sicaes', 'sicaes', 'sicaes');
    }

    public function getName() {
        return $this->name;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function listar($id) {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->instance->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function listarTodos() {
        $sql = "SELECT * FROM registrotipo order by name";
        $stmt = $this->instance->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function insert() {
        $sql = "INSERT INTO $this->table (name,tipo) VALUES (:name, :tipo)";
        $stmt = $this->instance->prepare($sql);
        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':tipo', $this->tipo);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->instance->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update($id) {
        $sql = "UPDATE $this->table SET (name,tipo_id) = (:name,:tipo_id) WHERE id = :id";
        $stmt = $this->instance->prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':tipo_id', $this->tipo);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

}