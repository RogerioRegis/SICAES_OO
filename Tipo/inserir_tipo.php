<?php
require_once '../Tipo/Tipo.php';

$obj_tipo = new Tipo();

if (isset($_POST['inserir'])) {

    $tipo = $_POST['tipo'];
    
    $obj_tipo->setTipo($tipo);
    $obj_tipo->insert();

    header('location: ./listar_tipo.php');
}

include_once '../top/header.php';
include_once '../top/menu.php';
?>

<title>Inserir Usuário</title>

Inserir Novo Tipo
<form method="post" action="">
    <div class="input-prepend">
        <span class="add-on"><i class="icon-book"></i></span>
        <input type="text" name="tipo" placeholder="Novo Tipo" required />
    </div>
    <br />
    <input type="submit" name="inserir" class="btn btn-primary" value="Inserir">
    <a href="./listar_tipo.php"><button class="btn btn-default" type="button">Cancelar</button ></a>
</form>


<?php

include_once '../top/footer.php';
