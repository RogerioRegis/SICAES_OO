<?php
require_once './classes/Usuarios.php';

$usuario = new Usuarios();

include_once './header.php';

if (isset($_GET['acao']) && $_GET['acao'] == 'deletar'):
    $id = (int) $_GET['id'];
    $usuario->delete($id);
endif;
?>
<title>Principal</title>

<a href="formInserir.php"><button class="btn btn-success " type="submit">Novo usuário <i class="glyphicon glyphicon-ok"></i> </button ></a>

<table class="table table-hover">

    <thead>
        <tr>
            <th>#</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Editar</th>
            <th>Deletar</th>
        </tr>
    </thead>

    <?php foreach ($usuario->listarTodos() as $key => $value) : ?>
        <tbody>
            <tr>
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['login']; ?></td>
                <td><?php echo $value['senha']; ?></td>
                <td>
                    <?php echo "<a href='formEditar.php?acao=editar&id=" . $value['id'] . "'>Editar</a>"; ?>

                    <i class="glyphicon glyphicon-edit"></i>

                </td>
                <td>
                    <?php echo "<a href='index.php?acao=deletar&id=" . $value['id'] . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
                </td>
            </tr>
        </tbody>

    <?php endforeach; ?>

</table> 

<?php
include_once './footer.php';
