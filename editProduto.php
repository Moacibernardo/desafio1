<?php
/**
 * 
 * Fazer com que o script editProduto.php capture o id de uma maquina pelo
 * $_GET e exiba as informações da maquina desse id. 
 * 
 */
	// Incluir os scripts auxiliares
	include("includes/showProduto.php");
	include("includes/functions.php");

	// Capturar o id pedido
	$id = $_GET['id'];

	// Carregar a maquina que tem esse id
	$maquina = maquinaPorId($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Maquinas Avançadas</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" 
rel="stylesheet">
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<link rel="stylesheet" href="css/produto.css">
	<main>
		<h1><?= $maquina['nome'] ?></h1>
		<h2>R$ <?= $maquina['preco'] ?></h2>
		<img src="<?= $maquina['img'] ?>" alt="<?= $maquina['nome'] ?>">
		<div>Descrição: <?= implode("", $maquina["descricao"])  ?></div>
		<button> Editar</button>
		<a href="#" class="prev">&lt;</a>
		<a href="#" class="next">&gt;</a>
	</main>
</body>
</html>