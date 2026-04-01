<?php

$host = "localhost";
$db = "loja_virtual";
$usuario = "savio";
$pass = "1234" ;

$endereco = "mysql:host=$host;dbname=$db";

try{
    $pdo = new PDO($endereco, $usuario, $pass);
}catch(PDOException $erro){
    echo "Erro ao fazer a conexao" . $erro->getMessage();
}

?>