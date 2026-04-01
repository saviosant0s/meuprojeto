<?php

require_once 'conexao.php';
require_once 'usuario.php';

try{
    $usuario = new Usuario($pdo, "", "", "");
    $usuarios = $usuario->listar();
    foreach ($usuarios as $u){
         echo htmlspecialchars($u["nome"]) . "<br>";
    }

}catch(PDOException $erro){
    echo "algum erro" . $erro->getMessage();
};


?>