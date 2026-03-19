<?php

$host = "localhost";
$db = "loja_virtual";
$user= "savio";
$pass = "1234";

$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

$sql = "SELECT * FROM usuarios";
$stmt = $pdo->query($sql);

$usuarios = $stmt->fetchAll();

foreach ($usuarios as $usuario){
    echo htmlspecialchars($usuario["nome"]) . "<br>";
    echo htmlspecialchars($usuario["email"]) . "<br>";
}

