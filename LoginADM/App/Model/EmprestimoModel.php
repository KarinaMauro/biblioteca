<?php
class EmprestimoModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function listarEmprestimo() {
        $sql = "SELECT * FROM emprestimos";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function listarHistorico() {
        $sql = "SELECT * FROM historico_emprestimos";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
}
?>
