<?php
// Includes
include('../desafio1/includes/functions.php');

// Valores padrões
$nome = '';
$descricao = '';
$preco = '';

// Variáveis de controle de erro
$nomeOk = true;
$descricaoOk = true;
$precoOk = true;
// Verificar se o usuário enviou o formulário
if ($_POST) {

    // Guardando o nome em $nome
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    // Verificar se $_FILES está vindo
    if ($_FILES) {

        // Separando informações uteiis do $_FILES
        $tmpName = $_FILES['foto']['tmp_name'];
        $fileName = uniqid() . '-' . $_FILES['foto']['name'];
        $error = $_FILES['foto']['error'];

        // Salvar o arquivo numa pasta do meu sistema
        move_uploaded_file($tmpName, '../desafio1/img/produtos/' . $fileName);

        // Salvar o nome do arquivo em $imagem
        $imagem = '../desafio1/img/produtos/' . $fileName;
    } else {
        $imagem = null;
    }

    // Validando o nome
    if (strlen($_POST['nome']) < 15) {
        $nomeOk = false;
    }

    // Validando a descrição
    if (strlen($_POST['descricao']) < 6) {
        $descricaoOk = false;
    }
    // Validando o preço deve ser numerico
    if (!is_numeric($_POST['preco'])) {
        $precoOk = false;
    }
    // Validando senha
    //if (strlen($senha) < 5 || $senha != $confirmacao) {
    // $senhaOk = false;
    //}

    // Se tudo estiver ok, salva o usuário e redireciona para 
    // um dado endereço
    if ($nomeOk && $descricaoOk && $precoOk) {

        // Salvando o produto
        addProduto($nome, $descricao, $preco, $imagem);

        // Redirecionando usuário para a lista de produtos
        header('location: ../desafio1/produto.php');
    }
}
?>

<!DOCTYPE html>


<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
    <div class="menu">
        <div class="menuint">
            <ul>
                <li><a href="./indexProdutos.php" class="ativo">Home</a></li>
                <li><a href="./createProduto.php">Produtos</a></li>
                <li><a href="./Usuarios/createUsuario.php">Usuarios</a></li>
                <li><a href="./login/login.php">login</a></li>
            </ul>
        </div>
    </div>
    <link rel="stylesheet" href="css/form-produto.css">
    <form id="form-produto" method="POST" enctype="multipart/form-data">
        <label>
            Nome do Produto:
            <input type="text" name="nome" id="nome" placeholder="Digite o nome do produto" value="<?= $nome ?>">
            <?= ($nomeOk ? '' : '<span class="erro">Preencha o campo com um nome válido</span>');  ?>
        </label>
        <label>
            Descricão do Produto:
            <input type="text" name="descricao" id="descricao" placeholder="Digite a descrição do produto">
        </label>
        <label>
            Preço:
            <input type="text" name="preco" id="preco" placeholder="R$ 0,00" value="<?= $preco ?>">
            <?= ($precoOk ? '' : '<span class="erro">Preencha o campo com preço válido</span>');  ?>

        </label>
        <label>
            <img src="../img/no-image.png" id="foto-carregada">
            <div>Clique para selecionar a foto</div>
            <input type="file" name="foto" id="foto" accept=".jpg,.jpeg,.png,.gif">
        </label>
        <div class="controles">
            <button type="reset" class="secondary">Limpar</button>
            <button type="submit" class="primary">Salvar</button>
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