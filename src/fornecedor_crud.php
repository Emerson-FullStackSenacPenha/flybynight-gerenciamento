<?php

/* Neste arquivo teremos todas as funções que serão usadas para manipulação (CRUD) de Fornecedores em nosso sistema e banco de dados. */


// Acessando o script de conexão ao BD
require_once "../conecta.php";

/*
Retornará um array associativo com os fornecedores
*/

function buscarFornecedores($conexao){

    // Monatmos o comando SQL para a consulta
    $sql = "SELECT * FROM fornecedores ORDER BY nome";
    
    // Executamos o comando e guardamos o resultado da consulta
    $consulta = $conexao->query($sql);

    // Retornamos o resultado em formato de Array Associativo
    return $consulta->fetchAll();

}

?>