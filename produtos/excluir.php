<?php

require_once "../src/produto_crud.php";
$id = $_GET['id'];
excluirProdutos($conexao, $id);
header("location:listar.php");
exit;

?>