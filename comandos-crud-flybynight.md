# Comandos CRUD para o projeto Fly by Night

```sql
-- Inserindo dados dentro da tabela "Fornecedores" no campo "Nome"
INSERT INTO fornecedores (nome) VALUES ('Eletrônicos Tabajara');

INSERT INTO fornecedores (nome) VALUES 
('Games ABCD'),
('Supermercado Tem de Tudo'),
('Livraria Demais da Conta');

```

## Inserindo produtos

```sql

INSERT INTO produtos (nome, descricao, preco, quantidade, fornecedor_id)
VALUES(

    'Smartpgone Galaxy S23',
    'Equipamento com sistema Android e câmera Full HD',
    1599.50,
    20,
    1

);

INSERT INTO produtos (nome, descricao, preco, quantidade, fornecedor_id)
VALUES(

    'Tv Led',
    'Tela de 50 polegadas, resolução 4k, 4 entradas HDMI e etc e tal',
    3420,
    12,
    1

);

INSERT INTO produtos (nome, descricao, preco, quantidade, fornecedor_id)
VALUES(

    'Senhor dos Anéis: As Duas Torres',
    'Volume 2 da série de livros criados pelo autor J.R.R. Tolkien',
    80.99,
    100,
    4

);

```
## Inserindo lojas

```sql

INSERT INTO lojas (nome) VALUES 
('Casas Bahia'),
('Shopping Zona Leste'),
('Bazar das Coias'),
('Americanas');

```

## Inserindo estoque de produtos para cada loja

```sql

INSERT INTO lojas_produtos(loja_id, produto_id, estoque) VALUES
(4, 2, 3),
(4, 3, 30),
(1, 2, 10),
(4, 1, 5);

```

## Atualizando registros

```sql

UPDATE fornecedores SET nome = 'Distribuidora XYZ' WHERE id = 3;

UPDATE produtos SET preco = 2600.77, quantidade = 15 WHERE id = 1;

-- Alterando o valor de todos os livros do Fornecedor 4
UPDATE produtos SET preco = 125 WHERE fornecedor_id = 4;

UPDATE lojas_produtos SET estoque = 7 WHERE loja_id = 4 AND produto_id = 1;

```

## Excluindo registros

```sql

DELETE FROM produtos WHERE id = 4;

```

## Realizando consultas para visualização de dados

```sql

-- Contando quantos registros existem na tabela produtos
-- O * representa todas as linhas/registros
SELECT COUNT(*) FROM produtos;

```