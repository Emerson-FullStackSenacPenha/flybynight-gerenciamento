<?php

// Importa o arquivo que contém as funções CRUD
require_once "../src/estoque_crud.php";

// Recupera os parâmetros da URL
// Exemplo de URL: excluir.php?loja_id=1&produto_id=5
$loja_id = $_GET['loja_id'];
$produto_id = $_GET['produto_id'];

// Chama a função de exclusão, passando os dois identificadores
excluirEstoquePorLoja($conexao, $loja_id, $produto_id);

// Redireciona de volta para a página de listagem após excluir
header("location:listar.php");
exit;

?>
