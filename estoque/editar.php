<?php 

    require_once "../src/loja_crud.php";
    require_once "../src/produto_crud.php";
    require_once "../src/estoque_crud.php";

    $id = $_GET['id'];
    $itemEstoque = buscarEstoquePorId($conexao, $id);
    

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
        $idEstoque = $_POST['id'];
        $novoEstoque = $_POST['estoque'];

        atualizarEstoque($conexao, $idEstoque, $novoEstoque);

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

        <input type="hidden" name="id" value="<?=$itemEstoque['id'] ?? $id ?>" >

        <div>
            <label for="loja_nome">Loja:</label>
            <input value="<?=$itemEstoque['nome_loja']?>" type="text" name="loja_nome" id="loja_nome" readonly>
        </div>
        
        <div>
            <label for="produto_nome">Produto:</label>
            <input value="<?=$itemEstoque['nome_produto']?>" type="text" name="produto_nome" id="produto_nome" readonly>
        </div>

        <div>
            <label for="estoque">Quantidade:</label>
            <input value="<?=$itemEstoque['estoque']?>" type="number" name="estoque" id="estoque" required min="0">
        </div>








        <button type="submit">Atualizar</button>

    </form>

    <div id="links">
    <a class="option" href="">+ Adicionar</a>
    <a class="option" href="listar.php">Voltar</a>
    </div>

    
    

</body>
</html>