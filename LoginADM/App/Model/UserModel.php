<?php
class UserModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Model para criar Users
    public function criarUser($nome, $cpf, $telefone, $senha, $tipo_usuario) {
        $sql = "INSERT INTO cadastro (nome, cpf, telefone, senha, tipo_usuario) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $cpf, $telefone, $senha, $tipo_usuario]);
    }

    // Model para listar Users
    public function listarUsers() {
        $sql = "SELECT * FROM cadastro";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Model para atualizar Users
    public function atualizarUser($id, $nome, $cpf, $telefone, $senha, $tipo_usuario){
        $sql = "UPDATE cadastro SET nome = ?, cpf = ?, telefone = ?, senha = ?, tipo_usuario = ?, WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $cpf, $telefone, $senha, $tipo_usuario, $id]);
    }
    
    // Model para deletar User
    public function excluirUser($id) {
        $sql = "DELETE FROM cadastro WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }
    
}
?>