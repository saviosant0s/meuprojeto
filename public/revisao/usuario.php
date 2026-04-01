<?php

require_once 'conexao.php';

class Usuario{
    private $pdo;
    private $email;
    private $nome;
    private $senha;

    public function __construct($pdo, $nome, $email, $senha){
        $this->pdo = $pdo;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha; 
    }

    public function salvar(){
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->nome, $this->email, $this->senha]);
    }

    public function listar(){
        $sql = "SELECT * FROM usuarios";
        $pedido = $this->pdo->prepare($sql);
        $pedido->execute();
        return $pedido->fetchAll(PDO::FETCH_ASSOC);

        
    }
        
}

?>