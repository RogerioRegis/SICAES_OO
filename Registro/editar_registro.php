<?php
require_once './Registro.php';

$registro = new Registro();

if (isset($_POST['atualizar'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $tipo_id = $_POST['tipo_id'];

    $registro->setName($name);
    $registro->setTipo_id($tipo_id);

    $registro->update($id);

    header('location: ./listar_registro.php');
}

include_once '../top/header.php';
include_once '../top/menu.php';
?>

<title>Editar Usuário</title>

<?php
if (isset($_GET['acao']) && ($_GET['acao']) == 'editar') :
    $id = (int) $_GET['id'];
    $resultado = $registro->listar($id);
    ?>
    Alterar Registro
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $resultado['id']; ?>">
        <div class="input-prepend">
            <span class="add-on"><i class="icon-user"></i></span>
            <input type="text" name="name" value="<?php echo $resultado['name']; ?>">
        </div>

        <div class="input-prepend">
            <label class="control-label"><i class="icon-share-alt"></i>
                <select class = "form-control" name = "tipo_id">
                    <?php
                    include '../Tipo/Tipo.php';
                    $obj_tipo = new Tipo();
                    foreach ($obj_tipo->listarTodos() as $key => $value) :
                        ?>
                    <option <?php if($value['id'] == $resultado['tipo_id']) echo 'selected'; ;?> value="<?= $value['id']; ?>"><?= $value['tipo']; ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>
        <br />
        <input type="submit" name="atualizar" class="btn btn-primary" value="atualizar">
        <a href="./listar_registro.php"><button class="btn btn-default" type="button">Cancelar</button ></a>
    </form>
<?php endif; ?>

<table class="table table-hover">

    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Editar</th>
            <th>Deletar</th>
        </tr>
    </thead>

    <?php foreach ($registro->listarTodos() as $key => $value) : ?>
        <tbody>
            <tr>
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['tipo']; ?></td>
                <td>
                    <?php echo "<a href='./editar_registro.php?acao=editar&id=" . $value['id'] . "'>Editar</a>"; ?>
                </td>
                <td>
                    <?php echo "<a href='./listar_registro.php?acao=deletar&id=" . $value['id'] . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
                </td>
            </tr>
        </tbody>

    <?php endforeach; ?>

</table> 

<?php
include_once '../top/footer.php';
