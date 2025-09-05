<?php
namespace App\Controller;

class LoginController implements Controller
{
    public function render(): void
    {
        require __DIR__ . '/../../View/includes/header.php';
        require __DIR__ . '/../../View/pages/login.php';
        require __DIR__ . '/../../View/includes/footer.php';
    }
}