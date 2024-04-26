<?php
// iniciar a session aqui para não precisar inicializar todas as vezes que for usar session

session_start();

// Variaveis p/ parametros

$servidor = "localhost";
$banco = "aula";
$usuario = "root";
$senha = "";

// conexão usando a PDO

try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Não foi possível conectar à base de dados " . $e->getMessage();
    exit();
}