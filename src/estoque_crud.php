<?php

require_once "../conecta.php"; 

function buscarEstoque($conexao){
     
    $sql = "SELECT
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

?>