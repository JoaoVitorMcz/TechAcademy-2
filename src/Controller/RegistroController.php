<?php
namespace App\Controller;
use App\Model\Cliente;

class RegistroController implements Controller
{
    public function render(): void
    {
        if ($_POST) {
            $cliente = new Cliente(
                nome: $_POST['nomeRegistro'],
                email: $_POST['emailRegistro'],
                telefone: $_POST['telefoneRegistro'],
                senha: $_POST['senhaRegistro']
            );
            $cliente->save();

            // Redireciona para a home após salvar
            header("Location: /home");
            exit;
        }
        
        include __DIR__ . '/../View/includes/header.php';
        include __DIR__ . '/../View/pages/registro.php';
        include __DIR__ . '/../View/includes/footer.php';
    }
}
