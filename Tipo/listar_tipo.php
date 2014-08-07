<?php
require_once '../classes/Tipo.php';

$obj_tipo = new Tipo();

if (isset($_GET['acao']) && $_GET['acao'] == 'deletar'):
    $id = (int) $_GET['id'];
    $obj_tipo->delete($id);
endif;

include_once '../top/header.php';
include_once '../top/menu.php';
?>

<title>Principal</title>

<a href="./inserir_tipo.php"><button class="btn btn-success " type="submit">Novo Tipo<i class="glyphicon glyphicon-ok"></i> </button ></a>

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
                    <?php echo "<a href='./listar_tipo.php?acao=deletar&id=" . $value['id'] . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
                </td>
            </tr>
        </tbody>
    <?php endforeach; ?>
</table> 

<?php
include_once '../footer.php';