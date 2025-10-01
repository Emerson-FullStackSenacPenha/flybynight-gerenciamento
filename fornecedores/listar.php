<?php


// Importando o arquivo de funções CRUD para Fornecedores
require_once "../src/fornecedor_crud.php";

// Chama a função (passando a conexão) e recebe um array associativo com os dados
$fornecedores = buscarFornecedores($conexao);

// Testando a exibição dos dados, só para programadores

/*
echo "<pre>";
var_dump($fornecedores);
echo "</pre>";
*/

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Fornecedores</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <h1>Fornecedores</h1>
    <a href="../fornecedores/inserir.php">Novo fornecedor</a>
    <a href="../index.php">Voltar</a>
    
    <!-- Estruturando uma tabela HTML para exibir os dados -->

    <table>
        <caption>Relação de Fornecedores</caption>
        
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>

        <!-- As linhas (tr/td) abaixo serão geradas dinamicamente, ou seja, usando um loop (foreach) no array ($fornecedores) -->

        <?php foreach($fornecedores as $fornecedor) { // ou : ?>

            <tr>
                <td> <?=$fornecedor['id']?> </td>
                <td> <?=$fornecedor['nome']?> </td>
                <td>
                    <!-- Link dinâmico, ou seja, a url/endereço utiliza parâmetro(s) e valor(es) dinâmico(s) -->
                    <a href="editar.php?id=<?=$fornecedor['id']?>">Editar</a>
                    <a href="">Excluir</a>

                </td>
            </tr>

        <?php } // ou endforeach; ?>        

    </table>


</body>
</html>