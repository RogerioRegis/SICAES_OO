<?php

require_once '../base/Crud.php';

class Usuarios extends Crud{

    protected $table = 'users';
    protected $instance;
    protected $login;
    protected $senha;
    protected $permissao;

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

    public function getPermissao() {
        return $this->permissao;
    }

    public function setPermissao($permissao) {
        $this->permissao = $permissao;
    }

    public function insert() {
        $sql = "INSERT INTO $this->table (login,senha,permissao) VALUES (:login,:senha,:permissao)";
        $stmt = $this->instance->prepare($sql);
        $stmt->bindValue(':login', $this->login);
        $stmt->bindValue(':senha', $this->senha);
        $stmt->bindValue(':permissao', $this->permissao);
        return $stmt->execute();
    }

    public function update($id) {
        $sql = "UPDATE $this->table SET (login,senha,permissao) = (:login,:senha,:permissao) WHERE id = :id";
        $stmt = $this->instance->prepare($sql);
        $stmt->bindParam(':login', $this->login);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindValue(':permissao', $this->permissao);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function logar() {
        $sql = " SELECT * FROM $this->table WHERE login = :login AND senha = :senha ";
        $stmt = $this->instance->prepare($sql);
        $stmt->bindValue(':login', $this->login);
        $stmt->bindValue(':senha', $this->senha);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario) {
            session_start();

            $_SESSION['login'] = $$usuario->login;
            $_SESSION['permissao'] = $usuario->permissao;

            $_SESSION['logado'] = true;

            header('location: index.php');
        }
    }

}
