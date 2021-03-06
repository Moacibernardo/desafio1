<?php
// Includes
include('../includes/functions.php');

// Valores padrões
$nome = '';
$email = '';
$senha = '';
$confirmacao = '';

// Variáveis de controle de erro
$nomeOk = true;
$emailOk = true;
$senhaOk = true;

// Testando a $_FILES
// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";

// Verificar se o usuário enviou o formulário
if ($_POST) {

    // Guardando o nome em $nome
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmacao = $_POST['confirmacao'];


    // Verificar se $_FILES está vindo
    if ($_FILES) {

        // Separando informações uteiis do $_FILES
        $tmpName = $_FILES['foto']['tmp_name'];
        $fileName = uniqid() . '-' . $_FILES['foto']['name'];
        $error = $_FILES['foto']['error'];

        // Salvar o arquivo numa pasta do meu sistema
        move_uploaded_file($tmpName, '../img/usuarios/' . $fileName);

        // Salvar o nome do arquivo em $imagem
        $imagem = '../img/usuarios/' . $fileName;
    } else {
        $imagem = null;
    }

    // Validando o nome
    if (strlen($_POST['nome']) < 9) {
        $nomeOk = false;
    }

    // Validando senha
    if (strlen($senha) < 5 || $senha != $confirmacao) {
        $senhaOk = false;
    }

    // Se tudo estiver ok, salva o usuário e redireciona para 
    // um dado endereço
    if ($senhaOk && $nomeOk && $emailOk) {

        // Salvando o usuário novo
        addUsuario($nome, $email, $senha, $imagem);

        // Redirecionando usuário para a lista de usuários
        header('location: listUsuarios.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Maquinas </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="menu">
        <div class="menuint">
            <ul>
                <li><a href="../indexProdutos.php" class="ativo">Home</a></li>
                <li><a href="../createProduto.php">Produtos</a></li>
                <li><a href="../Usuarios/createUsuario.php">Usuarios</a></li>
                <li><a href="../login/login.php">login</a></li>
            </ul>
        </div>
    </div>
    <link rel="stylesheet" href="../css/form-usuario.css">
    <link rel="stylesheet" href="../css/styles.css">
    <form id="form-usuario" method="POST" enctype="multipart/form-data">
        <label>
            Nome:
            <input type="text" name="nome" id="nome" placeholder="Digite seu nome" value="<?= $nome ?>">
            <?= ($nomeOk ? '' : '<span class="erro">Preencha o campo com um nome válido</span>');  ?>

        </label>
        E-mail:
        <input type="email" name="email" id="email" placeholder="Digite seu email" value="<?=
                                                                                                $email ?>">
        <?= ($emailOk ? '' : '<span class="erro">Preencha o campo com pelo menos 15 caracteres</
span>');  ?>

        </label>
        <label>
            Senha:
            <input type="password" name="senha" id="senha" placeholder="Digite uma senha" value="<?= $senha ?>">
            <?= ($senhaOk ? '' : '<span class="erro">Senha inválido</span>');  ?>
        </label>
        <label>
            Confirmação:
            <input type="password" name="confirmacao" id="confirmacao" placeholder="Confirme a senha digitada" value="<?= $confirmacao ?>">
        </label>
        <label>
            <img src="../img/no-image.png" id="foto-carregada">
            <div>Clique para selecionar sua foto</div>
            <input type="file" name="foto" id="foto" accept=".jpg,.jpeg,.png,.gif">
        </label>
        <div class="controles">
            <button type="reset" class="secondary">Limpar</button>
            <button type="submit" class="primary">Cadastre-se aqui</button>
        </div>
    </form>
    <script>
        document.getElementById("foto").onchange = (evt) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("foto-carregada").src = e.target.result;
            };
            reader.readAsDataURL(evt.target.files[0]);
        };
    </script>
</body>

</html>