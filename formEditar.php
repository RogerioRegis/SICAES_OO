<?php
require_once './classes/Usuarios.php';

$usuario = new Usuarios();

if (isset($_POST['atualizar'])) {

    $id = $_POST['id'];
    $login = $_POST['login'];
    $senha = md5($_POST['senha']);

    $usuario->setLogin($login);
    $usuario->setSenha($senha);

    $usuario->update($id);

    header('location: index.php');
}

include_once './header.php';
?>

<title>Editar Usuário</title>

<?php
if (isset($_GET['acao']) && ($_GET['acao']) == 'editar') :
    $id = (int) $_GET['id'];
    $resultado = $usuario->listar($id);
    ?>
    Formulario de Edição.
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $resultado['id']; ?>">
        <div class="input-prepend">
            <span class="add-on"><i class="icon-envelope"></i></span>
            <input type="email" name="login" value="<?php echo $resultado['login']; ?>" placeholder="Novo email" />
        </div>
        <div class="input-prepend">
            <span class="add-on"><i class="icon-lock"></i></span>
            <input type="password" name="senha" value="<?php echo $resultado['senha']; ?>" placeholder="Nova senha" />
        </div>
        <br />
        <input type="submit" name="atualizar" class="btn btn-primary" value="Atualizar">
        <a href="index.php"><button class="btn btn-default" type="button">Cancelar</button ></a>
    </form>
<?php endif; ?>

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
