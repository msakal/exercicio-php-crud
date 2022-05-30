# Criando Tabelas


## Criando DataBase
```sql
CREATE DATABASE crud_escola_marcellosa CHARACTER SET utf8mb4;
USE DATABASE crud_escola_marcellosa;
```

### Criar Tabelas
```sql
CREATE TABLE alunos(
    id SMALLINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    primeira DECIMAL(3, 1) NOT NULL,
    segunda DECIMAL(3, 1) NOT NULL,
    media DECIMAL(3, 1) NOT NULL,
    situacao VARCHAR(15) NOT NULL
);

```


# CRUD

```sql
INSERT INTO alunos (nome, primeira, segunda, media, situacao) VALUES(
    'Marcello S. Antunes',
    10,
    8,
    9,
    'Aprovado'
);

```