<?php 

    require_once "../src/estoque_crud.php";

    $loja_id = $_GET['loja_id'];
    $produto_id = $_GET['produto_id'];
    
    $loja_produto = buscarEstoquePorId($conexao, $loja_id, $produto_id);
    

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
        $estoque = $_POST['estoque'];
        

        atualizarEstoque ($conexao, $estoque, $loja_id, $produto_id);

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
    
    <h1>Estoque - (Lojas x Produtos)</h1>

    <form action="" method="post">

        <input type="hidden" name="loja_id" value="<?= $loja_id ?>">
        <input type="hidden" name="produto_id" value="<?= $produto_id ?>">

        <div>
            <label for="estoque">Quantidade:</label>
            <input value="<?=$loja_produto['estoque']?>" type="number" name="estoque" id="estoque" required min="0">
        </div>

        <button type="submit">Atualizar</button>

    </form>

    <div id="links">
    <a class="option" href="">+ Adicionar</a>
    <a class="option" href="listar.php">Voltar</a>
    </div>

    
    

</body>
</html>