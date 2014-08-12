<?php

require_once '../base/Crud.php';

class Registro extends Crud {

    protected $table = 'registros';
    protected $instance;
    protected $name;
    protected $tipo_id;

    public function __construct() {
        $this->instance = new PDO('pgsql:host=localhost;dbname=sicaes', 'sicaes', 'sicaes');
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getTipo_id() {
        return $this->tipo_id;
    }

    public function setTipo_id($tipo_id) {
        $this->tipo_id = $tipo_id;
    }

    public function listarTodos() {
        $sql = "SELECT * FROM registrotipo order by name";
        $stmt = $this->instance->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function insert() {
        $sql = "INSERT INTO $this->table (name,tipo_id) VALUES (:name, :tipo_id)";
        $stmt = $this->instance->prepare($sql);
        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':tipo_id', $this->tipo_id);
        return $stmt->execute();
    }

    public function update($id) {
        $sql = "UPDATE $this->table SET (name,tipo_id) = (:name,:tipo_id) WHERE id = :id";
        $stmt = $this->instance->prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':tipo_id', $this->tipo_id);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

}
