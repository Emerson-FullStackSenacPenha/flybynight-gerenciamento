<?php


// Importando o arquivo de funções CRUD para Fornecedores
require_once "../src/loja_crud.php";

// Chama a função (passando a conexão) e recebe um array associativo com os dados
$lojas = buscarLojas($conexao);

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
    <title>Listar Lojas</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <h1>Lojas</h1>

    <div id="links">

    <a class="option" href="../lojas/inserir.php">+ Adicionar</a>
    <a class="option" href="../index.php">Voltar</a>
    
    </div>

    
    
    <!-- Estruturando uma tabela HTML para exibir os dados -->

    <table>
        <caption>Relação de Lojas</caption>
        
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>

        <!-- As linhas (tr/td) abaixo serão geradas dinamicamente, ou seja, usando um loop (foreach) no array ($fornecedores) -->

        <?php foreach($lojas as $loja) { // ou : ?>

            <tr>
                <td> <?=$loja['id']?> </td>
                <td> <?=$loja['nome']?> </td>
                <td>
                    <!-- Link dinâmico, ou seja, a url/endereço utiliza parâmetro(s) e valor(es) dinâmico(s) -->
                    <a href="editar.php?id=<?=$loja['id']?>">Editar</a>
                    <a class="excluir" href="excluir.php?id=<?=$loja['id']?>">Excluir</a>

                </td>
            </tr>

        <?php } // ou endforeach; ?>        

    </table>

    <script src="../js/confirmar-exclusão.js" ></script>

</body>
</html>