<?php

require_once 'conexao.php';
require_once 'usuario.php';

// $nome = $_POST["nome"] ?? "";
// $email = $_POST["email"] ?? "";
// $senha = $_POST["senha"] ?? "";

$erros = [];

if ($_SERVER["REQUEST_METHOD"] == "POST"){    
    $nome = $_POST["nome"] ?? "";
    $email = $_POST["email"] ?? "";
    $idade = $_POST["idade"] ?? "";
    $nascimento = $_POST["data_nascimento"] ?? "";
    $estado = $_POST["estado"] ?? "";
    $mensagem = $_POST["mensagem"] ?? "";
    $senha = $_POST["senha"] ?? "";

    if ($nome == ""){
        $erros[] = "Nome é obrigatorio";
    }
    if ($email == ""){
        $erros[] = "Email é obrigatorio";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $erros[] = "email inalido";
    }

    if (strlen($senha) < 6){
        $erros[] = "senha deve ter no minimo 6 caracter";
    }

    if (empty($erros)){
        $usuario = new Usuario($pdo, $nome, $email, $senha);
        $usuario->salvar();
        echo "usuario cadastrado";
    }else{
        foreach ($erros as $erro){
            echo $erro . "<br>";
        }
    }

}

?>