<?php

$host = "localhost";
$db = "loja_virtual";
$user = "savio";
$pass = "1234";

try{
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    echo "Conectado com sucesso!";
} catch (PDOException $e){
    echo "Erro: " . $e->getMessage();
}