<?php

require_once "../src/estoque_crud.php";
$estoque = buscarEstoque($conexao);

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

    <div id="links">
    <a class="option" href="inserir.php">+ Adicionar</a>
    <a class="option" href="../index.php">Voltar</a>
    </div>

    <table>
        <caption>Relação de Estoque</caption>

        <tr>
            <th>Loja</th>
            <th>Produto</th>
            <th>Estoque</th>
            <th>Ações</th>
        </tr>

        <?php foreach($estoque as $etq){ ?>

            <tr>
                <td> <?=$etq['nome_loja']?> </td>
                <td> <?=$etq['nome_produto']?> </td>
                <td> <?=$etq['estoque']?> </td>
                <td>
                    <a href="editar.php?id=<?=$etq['loja_id']?>">Editar</a>
                    <a href="">Excluir</a>
                </td>
            </tr>

        <?php } ?>    

    </table>

</body>
</html>