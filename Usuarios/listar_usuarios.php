<?php
require_once '../classes/Usuarios.php';

$usuario = new Usuarios();

if (isset($_GET['acao']) && $_GET['acao'] == 'deletar'):
    $id = (int) $_GET['id'];
    $usuario->delete($id);
endif;

include_once '../top/header.php';
include_once '../top/menu.php';
?>

<title>Principal</title>

<a href="./inserir_usuario.php"><button class="btn btn-success " type="submit">Novo Usuário</button ></a>

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
                    <?php echo "<a href='./editar_usuario.php?acao=editar&id=" . $value['id'] . "'>Editar</a>"; ?>
                </td>
                <td>
                    <?php echo "<a href='./listar_usuarios.php?acao=deletar&id=" . $value['id'] . "'onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
                </td>
            </tr>
        </tbody>
    <?php endforeach; ?>
</table> 

<?php
include_once '../top/footer.php';
