<?php

require_once "../src/estoque_crud.php";

$loja_id = $_GET['loja_id'];
$produto_id = $_GET['produto_id'];

$loja_produto = buscarEstoquePorId($conexao, $loja_id, $produto_id);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $estoque = $_POST['estoque'];


    atualizarEstoque($conexao, $estoque, $loja_id, $produto_id);

    header("location:listar.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Listar Estoque</title>
</head>

<body>

    <h2>Editar Estoque</h2>
    
    <form action="" method="post">
        
        <p><strong>Loja:</strong> <?= $loja_produto['nome_loja'] ?></p>
        <input type="hidden" name="loja_id" value="<?= $loja_id ?>">
        <!-- Input = formulário / hidden = oculto -->
        <!-- name = nome / O id da loja que ira pro PHP como $_POST -->
        <!-- value = valor do id da loja que veio do PHP via GET (ex: loja_id=3 na URL) -->

        <br>

        <p><strong>Produto:</strong> <?= $loja_produto['nome_produto'] ?></p>
        <input type="hidden" name="produto_id" value="<?= $produto_id ?>">

        <br>

        <div>
            <label for="estoque">Quantidade:</label>
            <input value="<?= $loja_produto['estoque'] ?>" type="number" name="estoque" id="estoque" required min="0">
        </div>

        <button type="submit">Atualizar</button>

    </form>

    <div id="links">
        <a class="option" href="">+ Adicionar</a>
        <a class="option" href="listar.php">Voltar</a>
    </div>




</body>

</html>