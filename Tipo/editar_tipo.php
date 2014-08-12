<?php
require_once '../Tipo/Tipo.php';

$obj_tipo = new Tipo();

if (isset($_POST['atualizar'])) {

    $id = $_POST['id'];
    $tipo = $_POST['tipo'];
    
    $obj_tipo->setTipo($tipo);
    $obj_tipo->update($id);

    header('location: ./listar_tipo.php');
}

include_once '../top/header.php';
include_once '../top/menu.php';
?>

<title>Editar Usuário</title>

<?php
if (isset($_GET['acao']) && ($_GET['acao']) == 'editar') :
    $id = (int) $_GET['id'];
    $resultado = $obj_tipo->listar($id);
    ?>
    Formulario de Edição.
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $resultado['id']; ?>">
        <div class="input-prepend">
            <span class="add-on"><i class="icon-retweet"></i></span>
            <input type="text" name="tipo" value="<?php echo $resultado['tipo']; ?>" placeholder="Novo Tipo" />
        </div>
        <br />
        <input type="submit" name="atualizar" class="btn btn-primary" value="atualizar">
        <a href="./listar_tipo.php"><button class="btn btn-default" type="button">Cancelar</button ></a>
    </form>
<?php endif; ?>

<table class="table table-hover">

    <thead>
        <tr>
            <th>#</th>
            <th>Tipo</th>
            <th>Editar</th>
            <th>Deletar</th>
        </tr>
    </thead>

    <?php foreach ($obj_tipo->listarTodos() as $key => $value) : ?>
        <tbody>
            <tr>
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['tipo']; ?></td>
                <td>
                    <?php echo "<a href='./editar_tipo.php?acao=editar&id=" . $value['id'] . "'>Editar</a>"; ?>
                </td>
                <td>
                    <?php echo "<a href='./listar_tipo.php?acao=deletar&id=" . $value['id'] . "'onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
                </td>
            </tr>
        </tbody>

    <?php endforeach; ?>

</table> 

<?php
include_once '../top/footer.php';
