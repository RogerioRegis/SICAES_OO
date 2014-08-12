<?php

abstract class Crud {

    protected $table;

    abstract public function insert();

    public function listar($id) {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->instance->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function listarTodos() {
        $sql = "SELECT * FROM $this->table order by name";
        $stmt = $this->instance->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function delete($id) {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->instance->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

}
