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