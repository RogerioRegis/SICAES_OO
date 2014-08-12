<?php
require_once './Registro.php';

$registro = new Registro();

if (isset($_POST['cadastrar'])) {

    $name = $_POST['name'];
    $tipo = $_POST['tipo_id'];

    $registro->setName($name);
    $registro->setTipo_id($tipo);

    $registro->insert();

    header('location: ./listar_registro.php');
}

include_once '../top/header.php';
include_once '../top/menu.php';
?>
<title>Inserir Usuário</title>

Formulario de Registro.
<form method="post" action>
    <div class="input-prepend">
        <span class="add-on"><i class="icon-user"></i></span>
        <input type="text" name="name" placeholder="Nome" required />
    </div>

    <div class="input-prepend">
        <label class="control-label"><i class="icon-refresh"></i>
            <select class = "form-control" name = "tipo_id">
                <?php
                include '../Tipo/Tipo.php';
                $obj_tipo = new Tipo();
                foreach ($obj_tipo->listarTodos() as $key => $value) :
                    ?>
                    <option value="<?= $value['id']; ?>"><?= $value['tipo']; ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    </div>

    <br />
    <input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar">
    <a href="../Registro/listar_registro.php"><button class="btn btn-default" type="button">Cancelar</button ></a>
</form>

<?php
include_once '../top/footer.php';
