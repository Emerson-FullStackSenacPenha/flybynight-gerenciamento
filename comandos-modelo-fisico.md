# Referencia de coamandos SQL para Modelangem Física

## Projeto: Fly By Night - Gerenciamento de Estoque

```sql
-- Criação do banco de dados usando UTF8
CREATE DATABASE flybynight_emerson CHARACTER SET utf8mb4;
```

```sql
-- Criação da tabela de Fornecedores
CREATE TABLE fornecedores(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL
);
```

```sql
CREATE TABLE produtos(
    
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2) NOT NULL,
    quantidade INT NOT NULL,

    -- Aqui, criamos fornecedores_id como uma coluna/campo comum
    fornecedor_id INT NOT NULL,

    -- E aqui, transformamos fornecedor_id em uma CHAVE ESTRANGEIRA
    -- que faz REFERÊNCIA à CHAVE PRIMARIA (id) de outra tabela
    -- (fornecedores)
    FOREIGN KEY (fornecedor_id) REFERENCES fornecedores(id)

);
```

```sql
-- Criação da tabela de Lojas
CREATE TABLE lojas(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL
);
```

```sql
CREATE TABLE lojas_produtos(

    loja_id INT NOT NULL,
    produto_id INT NOT NULL,
    estoque_id INT NOT NULL,

-- Criando uma CHAVE PRIMARIA COMPOSTA, ou seja
-- baseada em mais de uma coluna/campo
    PRIMARY KEY( loja_id, produto_id ),

-- Se na tabela de lojas, uma loja for excluida,
-- aqui na tabela lojas_produtos TODOS OS REGISTROS de estoque
-- desta loja escluida, TAMBÉM SERÃO EXCLUIDOS.
    FOREIGN KEY (loja_id) REFERENCES lojas(id) ON DELETE CASCADE,

-- Ao tentar exluir um produto, se este produto está sendo
-- usado em algum registro de estoque, NÃO PODEMO PERMITIR
-- a exclusão! [isso já é o padrão]
    FOREIGN KEY (produto_id) REFERENCES produtos(id) ON DELETE RESTRICT

);
```