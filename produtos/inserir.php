<?php

require_once "../src/fornecedor_crud.php";
$fornecedores = buscarFornecedores($conexao);

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
    
    <h1>Adicionando um novo produto</h1>

    <form action="" method="post">

        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
        </div>

        <div>
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" rows="4" ></textarea>
        </div>

        <div>
            <label for="preco">Preço:</label>
            <input type="number" name="preco" id="preco" required min="0" step="0.01">
        </div>

        <div>
            <label for="quantidade">Quantidade:</label>
            <input type="number" name="quantidade" id="quantidade" required min="0">
        </div>

        <div>
            <label for="fornecedor">Fornecedor:</label>
            <select name="fornecedor" id="fornecedor">
                <option value=""></option>


                <?php foreach($fornecedores as $fornecedor): ?>
                    <option value="<?=$fornecedor['id']?>"><?=$fornecedor['nome']?></option>
                <?php endforeach; ?>

            </select>
        </div>

        <button type="submit">Salvar</button>

    </form>

    <a href="listar.php">← Voltar</a>

</body>
</html>