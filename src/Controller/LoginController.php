<?php
namespace App\Controller;

use App\Core\Database;
use App\Model\Cliente;

class LoginController implements Controller
{
    public function render(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $senha = $_POST['senha'] ?? '';

            $em = Database::getEntityManager();
            $cliente = $em->getRepository(Cliente::class)->findOneBy(['email' => $email]);

            if ($cliente && $senha === 'intermeiras123') {
                // login válido -> dashboard
                header("Location: /dashboard");
                exit;
            } else {
                // login inválido -> home
                header("Location: /home");
                exit;
            }
        }

        include __DIR__ . '/../View/includes/header.php';
        include __DIR__ . '/../View/pages/login.php';
        include __DIR__ . '/../View/includes/footer.php';
    }
}
