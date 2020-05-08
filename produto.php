<?php

// Iniciar a session
session_start();

// Testar se tem session para esse visitante
if (!$_SESSION) {

    // Visitante não tem session.
    // Redirecionando para página de login
    header('location: ../login/login.php');
}

// Includes
include('../includes/functions.php');

// Carregando produtos
$produtos = carregaProdutos();

// Mostrar produtos


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
</head>

<body>
    <h1>Seja bem vind(o), <?= $_SESSION['nome'] ?></h1>
    <?php
    echo "<pre>";
    print_r($produtos);
    echo "</pre>";
    ?>
</body>

</html>