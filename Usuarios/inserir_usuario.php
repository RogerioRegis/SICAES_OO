<?php
//include_once '../top/verificaLogado.php';

require_once '../Usuarios/Usuarios.php';

$usuario = new Usuarios();

if (isset($_POST['cadastrar'])) {

    $login = $_POST['login'];
    $senha = md5($_POST['senha']);
    $permissao = $_POST['permissao'];

    $usuario->setLogin($login);
    $usuario->setSenha($senha);
    $usuario->setPermissao($permissao);

    $usuario->insert();

    header('location: ./listar_usuarios.php');
}

include_once '../top/header.php';
include_once '../top/menu.php';
?>

<title>Inserir Usuário</title>

Formulario de Cadastro.
<form method="post" action="">
    <div class="input-prepend">
        <span class="add-on"><i class="input-group-addon">@</span>
        <input type="email" name="login" placeholder="Email" required />
    </div>
    <div class="input-prepend">
        <span class="add-on"><i class="icon-lock"></i></span>
        <input required type="password" name="senha" placeholder="Senha" />
    </div>
    <br />
    Nível de Acesso: 
    <input type="radio" name="permissao" value="1"> Administrador &nbsp;
    <input type="radio" name="permissao" value="2"> Visitante<br />
    <br />
    <input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar">
    <a href="./listar_usuarios.php"><button class="btn btn-default" type="button">Cancelar</button ></a>
</form>


<?php

include_once '../top/footer.php';
