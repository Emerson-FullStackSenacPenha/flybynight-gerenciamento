<?php

require_once "../conecta.php"; 


function buscarEstoque($conexao){
     
    $sql = "SELECT
            -- Selecionar a coluna 'id' da tabela 'lojas_produtos' para fazer edição com o php
                lojas_produtos.loja_id,
            -- Selecione a coluna 'nome' da tabela 'lojas'
            -- E nomeie como 'nome_loja'
                lojas.nome AS nome_loja,
            -- Selecione a coluna 'nome' da tabela 'produto'
            -- E nomeie como 'nome_produto'
                produtos.nome AS nome_produto,
            -- Selecione a coluna 'estoque' da tabela 'lojas_produtos'
                lojas_produtos.estoque
            
            FROM lojas_produtos
            -- Da tabela 'lojas_produtos'
            JOIN lojas ON lojas.id = lojas_produtos.loja_id
            -- Acesse a tabela 'lojas' e a coluna 'id' da tabela 'lojas' conecte com coluna 'loja_id' da tabela 'lojas_produtos' 
            JOIN produtos ON produtos.id = lojas_produtos.produto_id
            -- Acesse a tabela 'produtos' e a coluna 'id' da tabela 'produtos' conecte com coluna 'produto_id' da tabela 'lojas_produtos'
            ORDER BY lojas.nome
            -- Order cresente por padrão do SQL pela coluna 'nome' da tabela 'lojas'
            ";
            
    $consulta = $conexao->query($sql); 
    return $consulta->fetchAll(); 
      
} 

function inserirEstoque ($conexao,$lojaId, $produtoId, $estoque){

    $sql = "INSERT INTO lojas_produtos (loja_id, produto_id, estoque) 
            VALUES(:loja_id, :produto_id, :estoque)

            /*Se o banco de dados detectar que a combinação de Loja/Produto já existe, ele não falha, mas executa o comando UPDATE.*/
            ON DUPLICATE KEY UPDATE 
            
            /*O banco pega o valor atual do estoque e soma a ele o novo valor enviado pelo formulário.*/
            estoque = estoque + VALUES(estoque)";

    $consulta = $conexao->prepare($sql);

    $consulta->bindValue(":loja_id", $lojaId);
    $consulta->bindValue(":produto_id", $produtoId);
    $consulta->bindValue(":estoque", $estoque);

    $consulta->execute();
    
}

function buscarEstoquePorId($conexao, $id) {

    $sql = "SELECT * FROM lojas_produtos WHERE loja_id = :loja_id";
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":loja_id", $id);
    $consulta->execute();
    return $consulta->fetch();

}

function atualizarEstoque ($conexao, $lojaId, $estoque){

    $sql = "UPDATE lojas_produtos SET 

            estoque = :estoque
        
        WHERE loja_id = :loja_id";

    $consulta = $conexao->prepare($sql);    

    $consulta->bindValue(":estoque", $estoque);
    $consulta->bindValue(":loja_id", $lojaId);

    $consulta->execute();
}

?>