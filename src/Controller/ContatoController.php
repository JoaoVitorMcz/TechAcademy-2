<?php 
namespace App\Controller;
class ContatoController implements Controller {
    public function render() {
        if (isset($_GET['status'])) {
    $tipo_alerta = $_GET['status'] === 'sucesso' ? 'success' : 'danger';
    $mensagem_status = $_GET['status'] === 'sucesso' ? 'Sucesso!' : 'Erro!';
    $mensagem_texto = isset($_GET['msg']) ? htmlspecialchars($_GET['msg']) : '';
    }
    include __DIR__ . '/../View/includes/header.php';
    include __DIR__ . '/../View/pages/contato.php';
    include __DIR__ . '/../View/includes/footer.php';
}
}