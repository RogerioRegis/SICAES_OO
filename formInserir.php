<?php

require_once './classes/Usuarios.php';

$usuario = new Usuarios();

if (isset($_POST['cadastrar'])) {

    $login = $_POST['login'];
    $senha = md5($_POST['senha']);

    if ($senha == '') {
        return error_log($message);
    }
    
    $usuario->setLogin($login);
    $usuario->setSenha($senha);
    
    # Insert
    if ($usuario->insert()) {
        echo "Inserido com sucesso!";
    }

    header('location: index.php');
}

include_once './header.php';
?>
<title>Inserir Usuário</title>

Formulario de Cadastro.
<form method="post" action="">
    <div class="input-prepend">
        <span class="add-on"><i class="icon-envelope"></i></span>
        <input type="email" name="login" placeholder="Email" required />
    </div>
    <div class="input-prepend">
        <span class="add-on"><i class="icon-lock"></i></span>
        <input type="password" name="senha" placeholder="Senha" required />
    </div>
    <br />
    <input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar">
    <a href="index.php"><button class="btn btn-default" type="button">Cancelar</button ></a>
</form>


<?php

include_once './footer.php';
