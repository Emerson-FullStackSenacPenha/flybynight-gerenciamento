<?php

require_once "../conecta.php";

function buscarLojas($conexao){

    // Monatmos o comando SQL para a consulta
    $sql = "SELECT * FROM lojas ORDER BY nome";
    
    // Executamos o comando e guardamos o resultado da consulta
    $consulta = $conexao->query($sql);

    // Retornamos o resultado em formato de Array Associativo
    return $consulta->fetchAll();

}

function inserirLojas($conexao, $nome){

    /*
     Montando o comanado SQL de INSERT e aplicando um "named parameter (Parâmetro Nomeado)". Um parâmetro nomeado nada mais é do que reservar um espaço para atribuit um valor.
    */

    $sql = "INSERT INTO lojas (nome) VALUES(:nome)";

    // Prepare o comando acima ANTES de executar no BD
    $consulta = $conexao->prepare($sql);

    // Anexar/atrelar/colocar um valor
    $consulta->bindValue(":nome", $nome);

    // Executamos a consulta com o comando e o valor
    $consulta->execute();

}

function buscarLojasPorId($conexao, $id){

    $sql = "SELECT * FROM lojas WHERE id = :id";
    $consulta = $conexao->prepare($sql); // prepare: coloca o comando sql em memórioa
    $consulta->bindValue(':id', $id); // bindValue: ligar o valor ($id) ao parâmetro (:id)
    $consulta->execute(); // execute: roda a query/consulta no banco
    return $consulta->fetch(); // retorna o resultado da consulta como um array (vetor)

}

function atualizarLojas($conexao, $nome, $id){

    $sql = "UPDATE lojas SET nome = :nome WHERE id = :id";
    $consulta = $conexao->prepare($sql);
    
    // Vincular os valores aos parâmetros
    $consulta->bindValue(":nome", $nome);
    $consulta->bindValue(":id", $id);

    $consulta->execute();

}

function excluirLojas($conexao, $id){

    $sql = "DELETE FROM fornecedores WHERE id = :id";
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":id", $id);
    $consulta->execute();

}

?>