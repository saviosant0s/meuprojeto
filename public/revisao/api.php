<?php

require_once '../revisao/conexao.php';

$sql = "SELECT * FROM usuarios";
$stmt = $pdo->query($sql);

$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($usuarios);
?>