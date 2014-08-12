<?php
require_once './Usuarios/Usuarios.php';

$logar = new Usuarios();

$login = $_POST['login'];
$senha = md5($_POST['senha']);

if (isset($_POST['entrar'])) {

    $logar->setLogin($login);
    $logar->setSenha($senha);
    $logar->logar();
}

include_once './top/header.php';
?>

<header class="masthead">
    <h2 class="muted">SICAES</h2>
    <nav class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <form method="POST">
                    <br />
                    <h4>Formulario de Login.</h4>
                    <div class="input-prepend">
                        <span class="add-on"><i class="input-group-addon">@</span>
                        <input type="email" name="login" placeholder="Email" required />
                    </div>
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-lock"></i></span>
                        <input required type="password" name="senha" placeholder="Senha" />
                    </div>
                    <br />
                    <input type="submit" name="entrar" class="btn btn-primary" value="Entrar">
                    <a href="Usuarios/listar_usuarios.php"><button class="btn btn-default" type="button">Acesso Público</button ></a>
                    <br /><br />
                </form>
            </div>
        </div>
    </nav>
</header>

<a href="#"onclick="return confirm('Entre em contato com rog_reg@hotmail.com\n\npara alterar sua senha.')">Esqueceu sua senha?</a>

<?php
include_once './top/footer.php';
