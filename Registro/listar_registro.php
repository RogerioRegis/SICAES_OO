<?php
include_once './Registro.php';

$registro = new Registro();

include_once '../top/header.php';
include_once '../top/menu.php';

if (isset($_GET['acao']) && $_GET['acao'] == 'deletar'):
    $id = (int) $_GET['id'];
    $registro->delete($id);
endif;
?>

<title>Principal</title>

<a href="./inserir_registro.php"><button class="btn btn-success " type="submit">Novo Registro</button ></a>

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
                    <?php echo "<a href='./listar_registro.php?acao=deletar&id=" . $value['id'] . "'onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
                </td>
            </tr>
        </tbody>
    <?php endforeach; ?>
</table> 

<?php
include_once '../top/footer.php';
