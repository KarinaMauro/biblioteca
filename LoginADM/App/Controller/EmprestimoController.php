<?php
require_once 'App\Model\EmprestimoModel.php';

class EmprestimoController {
    private $emprestimoModel;

    public function __construct($pdo) {
        $this->emprestimoModel = new EmprestimoModel($pdo);
    }

    public function listarEmprestimo() {
        return $this->emprestimoModel->listarEmprestimo();
    }
    public function listarHistorico() {
        return $this->emprestimoModel->listarHistorico();
    }
    
}
?>
