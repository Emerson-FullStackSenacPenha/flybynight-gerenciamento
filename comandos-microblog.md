# Comandos usados para o projeto Microblog

## Modelagem Conceitual

## Criar o banco de dados

## Criar a tabela usuarios

## Criar a tabela noticias


```sql

CREATE DATABASE microblog_emerson CHARACTER SET utf8mb4;

```

```sql

CREATE TABLE usuarios(

    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(100) NOT NULL,
    tipo ENUM("admin","editor") NOT NULL

);

```

```sql

CREATE TABLE noticias(

    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    resumo TEXT NOT NULL,
    texto TEXT NOT NULL,
    imagem VARCHAR(50) NOT NULL,
    data_publicada DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    usuario_id INT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

```