<?php

require_once "../src/loja_crud.php";
require_once "../src/produto_crud.php";
require_once "../src/estoque_crud.php";

$lojas = buscarLojas($conexao);
$produtos = buscarProdutos($conexao);
$estoque = buscarEstoque($conexao);

if($_SERVER['REQUEST_METHOD'] === 'POST' ){

    $lojaId = $_POST['loja_id'];
    $produtoId = $_POST['produto_id'];
    $estoqueQt = $_POST['estoque'];
    
    inserirEstoque($conexao, $lojaId, $produtoId, $estoqueQt); 

    header("location:listar.php");
    exit;

}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Produto</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    
    <h1>Adicionar Estoque (Produto em uma Loja)</h1>

    <form action="" method="post">

        <div>
            <label for="loja_id">Loja:</label>
            <select name="loja_id" id="loja_id">
                <option value="">--selecione--</option>

                <?php foreach($lojas as $loja) { ?>
                    
                    <option value="<?=$loja['id']?>"><?=$loja['nome']?></option>

                <?php } ?>

            </select>
        </div>

        <div>
            <label for="produto_id">Produto:</label>
            <select name="produto_id" id="produto_id">
                <option value="">--selecione--</option>

                <?php foreach($produtos as $produto){ ?>
                    
                    <option value="<?=$produto['id']?>"><?=$produto['nome_produto']?></option>

                <?php } ?>

            </select>
        </div>

        <div>
            <label for="estoque">Quantidade:</label>
            <input type="number" name="estoque" id="estoque" required min="0">
        </div>

        <button type="submit">Salvar</button> 

    </form>        
    
    <a class="option" href="listar.php">← Voltar</a>

</body>
</html>