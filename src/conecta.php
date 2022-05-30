<?php
// SCRIPT DE CONEXÃO AO SERVIDOR BANCO DE DADOS

// Parâmetros
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "crud_escola_marcellosa";


try{
    // Criar a conexão com o MySQL (API/Driver de conexão)
    $conexao = new PDO(
        "mysql:host=$servidor; dbname=$banco; charset=utf8",
        $usuario,
        $senha
    );
    // Habilita a verificação de erros (em geral e execeções)
    $conexao ->setAttribute(
        PDO::ATTR_ERRMODE,      // Constante de erros em geral
        PDO::ERRMODE_EXCEPTION  // Constante de exceções de erro
    );
} catch(Exception $erro) {
    die("Erro: " .$erro->getMessage());
}

// teste .. saída de erro
// http://localhost/exercicio-php-crud/src/conecta.php  >> caminho para teste!
// var_dump($conexao);

?>