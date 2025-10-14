<?php

require_once "../src/produto_crud.php";
$produtos = buscarProdutos($conexao);

/* Testando o código
echo "<pre>";
var_dump($produtos);
echo "</pre>";
*/

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Produtos</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <h1>Produtos</h1>
    <a href="../produtos/inserir.php">Novo produto</a>
    <a href="../index.php">Voltar</a>
    
    <!-- Estruturando uma tabela HTML para exibir os dados -->

    <table>
        <caption>Relação de Produtos</caption>
        
        <tr>
            <th>Nome</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>fornecedor</th>
            <th>Ações</th>
        </tr>

        <!-- As linhas (tr/td) abaixo serão geradas dinamicamente, ou seja, usando um loop (foreach) no array ($fornecedores) -->

        <?php foreach($produtos as $produto){ ?>

            <tr>
                <td> <?=$produto['nome_produto']?> </td>
                <td> <?=$produto['preco']?> </td>
                <td> <?=$produto['quantidade']?> </td>
                <td> <?=$produto['nome_fornecedor']?> </td>
                
                <td>
                    <!-- ?id= (parametro de URL chamado id) -->
                    <a href="editar.php?id=<?=$produto['id']?>">Editar</a>
                    <a class="excluir" href="excluir.php?id=<?=$produto['id']?>">Excluir</a>
                    <!-- Criado link dinâmico, dentro do URL ele indica qual o id do produto selecionado -->

                </td>
            </tr>

        <?php } ?>


    </table>

    <script src="../js/confirmar-exclusão.js" ></script>

</body>
</html>