# CRUD com PHP e MySQL
Projeto de cadastro de usuário (CRUD) em PHP, com MySQL e Bootstrap

# Sobre o projeto

Esta aplicação consiste em:
- Criar um usuário (nome, email, data de nascimento e senha)
- Imprimir um usuário
- Editar (atualizar) as informações de um usuário
- Excluir um usuário

# Tecnologias utilizadas
- PHP
- MySQL
- BootStrap

## Script SQL 
```bash
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
```

## Instruções
- Crie o banco
- Crie a tabela com o script
- Rode o código no terminal
```bash
php -S localhost:8000
```


