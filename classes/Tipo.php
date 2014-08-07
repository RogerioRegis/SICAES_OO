<?php

class Tipo {

    protected $table = 'tipo';
    protected $instance;
    protected $tipo;

    public function __construct() {
        $this->instance = new PDO('pgsql:host=localhost;dbname=sicaes', 'sicaes', 'sicaes');
    }

    public function getTipo() {
        return $this->tipo;
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
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->instance->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function insert() {
        $sql = "INSERT INTO $this->table (tipo) VALUES (:tipo)";
        $stmt = $this->instance->prepare($sql);
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
        $sql = "UPDATE $this->table SET (tipo) = (:tipo) WHERE id = :id";
        $stmt = $this->instance->prepare($sql);
        $stmt->bindParam(':tipo', $this->tipo);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

}