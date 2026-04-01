<?php

$host = "localhost";
$db = "loja_virtual";
$user = "savio";
$pass = "1234";

$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

#lista de erros no formulario
$erros = [];

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // requisições do form aramazenada em variaveis
    $nome = trim($_POST["nome"] ?? "");
    //echo "Olá " . $nome . "<br>";
    $email = trim($_POST["email"] ?? "");
    //echo "Seu email é: " . $email . "<br>";
    $idade = trim($_POST["idade"]);
    //echo "sua idade " . $idade . "<br>";
    $nascimento = trim($_POST["data_nascimento"] ?? "");
    //echo $nascimento . "<br>";
    $estado = trim($_POST["estado"] ?? "");
    //echo $estado . "<br>";
    $mensagem = trim($_POST["mensagem"] ?? "");
    //echo $mensagem . "<br>";
    $senha = trim($_POST["senha"] ?? "");


    if ($nome == ""){
        $erros[] = "Nome é obrigatório";
    }
    if ($email == ""){
        $erros[] = "Email é obrigatório";
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $erros[] = "Email inválido";
    }

    if (strlen($senha) < 6){
        $erros[] = "a senha deve ter no minimo 6 caracteres";
    }


    if (empty($erros)){
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $email, $senha]);
        echo "usuario cadastrado <br>";
        echo "Nome: " . htmlspecialchars($nome) . "<br>";
        echo "Enail: " . htmlspecialchars($email); 
    }else{
        foreach ($erros as $erro){
            echo $erro . "<br>";
        }
    }
    

    
}


?>
