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

/*
Recebe o nome de um novo fornecedor e insere no BD
*/

function inserirFornecedor($conexao, $nome){

    /*
     Montando o comanado SQL de INSERT e aplicando um "named parameter (Parâmetro Nomeado)". Um parâmetro nomeado nada mais é do que reservar um espaço para atribuit um valor.
    */

    $sql = "INSERT INTO fornecedores (nome) VALUES(:nome)";

    // Prepare o comando acima ANTES de executar no BD
    $consulta = $conexao->prepare($sql);

    // Anexar/atrelar/colocar um valor
    $consulta->bindValue(":nome", $nome);

    // Executamos a consulta com o comando e o valor
    $consulta->execute();

}

/*
Recebe o id do fornecedor a ser carregado (e depois atualizado)
*/

function buscarFornecedoresPorId($conexao, $id){

    $sql = "SELECT * FROM fornecedores WHERE id = :id";
    $consulta = $conexao->prepare($sql); // prepare: coloca o comando sql em memórioa
    $consulta->bindValue(':id', $id); // bindValue: ligar o valor ($id) ao parâmetro (:id)
    $consulta->execute(); // execute: roda a query/consulta no banco
    return $consulta->fetch(); // retorna o resultado da consulta como um array (vetor)

}

/*
Recebe nome e id do fornecedor que será atualizado
*/

function atualizarFornecedor($conexao, $nome, $id){

    $sql = "UPDATE fornecedores SET nome = :nome WHERE id = :id";
    $consulta = $conexao->prepare($sql);
    
    // Vincular os valores aos parâmetros
    $consulta->bindValue(":nome", $nome);
    $consulta->bindValue(":id", $id);

    $consulta->execute();

}

/*
Receba o ID do fornecedor a ser excluido
*/

function excluirFornecedor($conexao, $id){

    $sql = "DELETE FROM fornecedores WHERE id = :id";
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":id", $id);
    $consulta->execute();

}

?>