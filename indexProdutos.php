 <?php
    include("includes/showProduto.php");
    include("includes/functions.php");
    // Testando se há alguma coisa no $_GE
    // Testando se há alguma coisa no $_GET;
    if ($_GET) {
        // Usuário está querendo buscar algo!
        // Capturando o trecho digitado pelo usuário
        $trecho = $_GET['busca'];
        // Capturar as maquinas que contém o $trecho no nome
        $maquinas = buscaMaquina($trecho);
    }


    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <title>Produtos</title>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="css/styles.css" rel="stylesheet">
     <link rel="stylesheet" href="./css/index.css">
 </head>

 </html>

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
     <form id="form-busca" method="GET">
         <input type="text" name="busca" placeholder="O que você procura?" autocomplete="off">
         <button type="submit">Buscar</button>
     </form>

     <main>
         <?php foreach ($maquinas as $maquina) : ?>
             <article>
                 <img src="<?= $maquina['img'] ?>" alt="<?= $maquina['nome'] ?>">
                 <a href="editProduto.php?id=<?= $maquina['id'] ?>">Ver Mais</a>
                 <button>+ Add</button>
                 <div><?= $maquina['nome'] ?></div>
                 <span>R$ <?= number_format($maquina["preco"], 2, ',', '.')  ?></span>
             </article>
         <?php endforeach; ?>
     </main>

 </body>

 </html>