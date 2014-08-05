<?php

class Usuarios {

    protected $table = 'users';
    protected $instance;
    protected $login;
    protected $senha;

    public function __construct() {
        $this->instance = new PDO('pgsql:host=localhost;dbname=sicaes', 'sicaes', 'sicaes');
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function listar($id) {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->instance->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function listarTodos() {
        $sql = "SELECT * FROM $this->table order by id";
        $stmt = $this->instance->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function insert() {
        $sql = "INSERT INTO $this->table (login,senha) VALUES (:login, :senha)";
        $stmt = $this->instance->prepare($sql);
        $stmt->bindValue(':login', $this->login);
        $stmt->bindValue(':senha', $this->senha);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->instance->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update($id) {
        $sql = "UPDATE $this->table SET (login,senha) = (:login,:senha) WHERE id = :id";
        $stmt = $this->instance->prepare($sql);
        $stmt->bindParam(':login', $this->login);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

}