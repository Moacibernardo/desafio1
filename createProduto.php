<!DOCTYPE html>
    <html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <link rel="stylesheet" href="css/form-produto.css">
        <form id="form-produto" method="POST" enctype="multipart/form-data">
            <label>
                Nome do Produto:
                <input type="text" name="nome" id="nome" placeholder="Digite o nome do produto">
              </label>
            <label>
                Descricão do Produto :
                <input type="text" name="descricao" id="descricao" placeholder="Digite a descrição do produto">
            </label>
            <label>
                Preço:
                <input type="text" name="preco" id="preco" placeholder="R$ 0,00">
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
   </body>

</html>