<?php

require_once "../src/loja_crud.php";
$id = $_GET['id'];
excluirLojas($conexao, $id);
header("location:listar.php");
exit;

?>