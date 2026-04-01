<?php
require_once '../revisao/conexao.php';
require_once '../revisao/usuario.php';  

$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo === 'POST') {
    $dados = json_decode(file_get_contents("php://input"), true);

    $nome = $dados['nome'] ?? "";
    $email = $dados['email'] ?? "";
    $senha = $dados['senha'] ?? "";

    if (!empty($nome) && !empty($email)) {
        $usuario = new Usuario($pdo, $nome, $email , $senha);
        $usuario->salvar();
        echo json_encode(["status" => "Usuário salvo com sucesso!"]);
    } else {
        echo json_encode(["status" => "Erro: Dados incompletos"]);
    }

} elseif ($metodo === 'GET') {
    $sql = "SELECT * FROM usuarios";
    $stmt = $pdo->query($sql);
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($usuarios);
}
?>