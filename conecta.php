<?php

/* Script de conexão ao servidor de banco de dados
Este arquivo é o responsável por emitir a comunicação entre
seu site/projeto e o servidor MySQL.
*/

$servidor = "localhost"; // Padrão no XAMPP
$banco = "flybynight_emerson";
$usuario = "root"; // Padrão do XAMPP;
$senha = ''; // Padrão do XAMPP;

/*
try/catch
Bloco condicional relacionando a verificação de erro
*/

try {

    // Criando um objeto de conex]ao usando a classe PDO (driver de acesso a BD)
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco;charset=utf8",$usuario, $senha);

    // Habilitando a exibição de erros
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Configurando o modo de busca de dados para o formato ARRAY ASSOCIATIVO
    $conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch(PDOException $erro){

    // Catch = caçar
    // DIR = Morrer e aparecer a mensagem "Erro ao conectar" + o erro
    die("Erro ao conectar: ".$erro->getMessage());

}


?>