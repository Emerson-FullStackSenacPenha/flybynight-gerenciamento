<?php

require_once "../src/produto_crud.php";
$produtos = buscarProdutos($conexao);

echo "<pre>";

var_dump($produtos);

echo "</pre>";


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

        

            <tr>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>
                    
                    <a href="editar.php">Editar</a>
                    <a class="excluir" href="excluir.php">Excluir</a>

                </td>
            </tr>

        

    </table>

    <script src="../js/confirmar-exclusão.js" ></script>

</body>
</html>