<?php

require_once "../conecta.php"; 


function buscarEstoque($conexao){

            // Selecionar
    $sql = "SELECT
            -- Selecionando 'loja_id' da tabela 'lojas_produtos'
                lojas_produtos.loja_id,

            -- Selecionando 'produto_id' da tabela 'lojas_produtos'
                lojas_produtos.produto_id,

            -- Selecionando 'nome' da tabela 'lojas' e nomeando como 'nome_loja'
                lojas.nome AS nome_loja,

            -- Selecionando 'nome' da tabela 'produtos' e nomeando como 'nome_produto'
                produtos.nome AS nome_produto,

            -- Selecionando 'estoque' da tabela 'lojas_produtos'
                lojas_produtos.estoque
            
            FROM lojas_produtos
            -- Da tabela 'lojas_produtos'

            -- Outra função, Conectar
            JOIN lojas ON lojas.id = lojas_produtos.loja_id
            -- Acesse a tabela 'lojas' e a coluna 'id' da tabela 'lojas'
            -- conecte com a coluna 'loja_id' da tabela 'lojas_produtos'

            -- Outra função, Conectar
            JOIN produtos ON produtos.id = lojas_produtos.produto_id
            -- Acesse a tabela 'produtos' e a coluna 'id' da tabela 'produtos'
            -- conecte com a coluna 'produto_id' da tabela 'lojas_produtos'

            ORDER BY lojas.nome
            -- Ordena em ordem crescente (padrão SQL) pela coluna 'nome' da tabela 'lojas'
            ";
            
    $consulta = $conexao->query($sql); 
    return $consulta->fetchAll(); 
    // Retorna todos os registros encontrados como um array associativo
      
}

function inserirEstoque ($conexao,$lojaId, $produtoId, $estoque){

    $sql = "INSERT INTO lojas_produtos (loja_id, produto_id, estoque) 
            VALUES(:loja_id, :produto_id, :estoque)

            /*
            Se o banco de dados detectar que a combinação de Loja/Produto já existe, ele não falha, mas executa o comando UPDATE.
            */
            ON DUPLICATE KEY UPDATE 
            
            /*
            O banco pega o valor atual do estoque e soma a ele o novo valor enviado pelo formulário.
            */
            estoque = estoque + VALUES(estoque)";
            

    $consulta = $conexao->prepare($sql);

    $consulta->bindValue(":loja_id", $lojaId);
    $consulta->bindValue(":produto_id", $produtoId);
    $consulta->bindValue(":estoque", $estoque);

    $consulta->execute();
    
}

function buscarEstoquePorId($conexao, $loja_id, $produto_id) {

    $sql = "SELECT 
                -- Seleciona o ID da loja e do produto da tabela 'lojas_produtos'
                lojas_produtos.loja_id,
                lojas_produtos.produto_id,

                -- Pega o nome da loja da tabela 'lojas'
                lojas.nome AS nome_loja,

                -- Pega o nome do produto da tabela 'produtos'
                produtos.nome AS nome_produto,

                -- E também o estoque atual
                lojas_produtos.estoque

            FROM lojas_produtos
            -- Faz um JOIN para unir os dados da tabela 'lojas_produtos' com 'lojas'
            JOIN lojas ON lojas.id = lojas_produtos.loja_id
            -- Faz um JOIN para unir os dados da tabela 'lojas_produtos' com 'produtos'
            JOIN produtos ON produtos.id = lojas_produtos.produto_id
            -- Filtra apenas o registro que corresponde à loja e ao produto informados
            WHERE lojas_produtos.loja_id = :loja_id 
              AND lojas_produtos.produto_id = :produto_id";

    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":loja_id", $loja_id);
    $consulta->bindValue(":produto_id", $produto_id);
    $consulta->execute();

    return $consulta->fetch();
}

function atualizarEstoque ($conexao, $estoque, $loja_id, $produto_id){

    $sql = "UPDATE lojas_produtos 
            SET estoque = :estoque
            WHERE loja_id = :loja_id AND produto_id = :produto_id";

    $consulta = $conexao->prepare($sql);    

    $consulta->bindValue(":estoque", $estoque);
    $consulta->bindValue(":loja_id", $loja_id);
    $consulta->bindValue(":produto_id", $produto_id);

    $consulta->execute();
}

function excluirEstoquePorLoja($conexao, $loja_id, $produto_id) {
    
    $sql = "DELETE FROM lojas_produtos 
            WHERE loja_id = :loja_id AND produto_id = :produto_id";

    $consulta = $conexao->prepare($sql);
    
    // Vincula o ID da loja fornecido como parâmetro ao placeholder :loja_id
    $consulta->bindValue(":loja_id", $loja_id);
    $consulta->bindValue(":produto_id", $produto_id);

    // Executa a exclusão.
    return $consulta->execute();
    
    
}

?>