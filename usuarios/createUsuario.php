<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <link rel="stylesheet" href="../css/form-usuario.css">
    <form id="form-usuario" method="POST" enctype="multipart/form-data">
        <label>
            Nome:
            <input type="text" name="nome" id="nome" placeholder="Digite seu nome">
            
        </label>
            E-mail:
            <input type="email" name="email" id="email" placeholder="Digite seu email">
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
            <button type="submit" class="primary">Cadastrar-se!</button>
        </div>
    </form>
    
    </body>

</html>