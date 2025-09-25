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

```