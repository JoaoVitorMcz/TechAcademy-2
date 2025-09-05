<?php
namespace App\Controller;

class HomeController implements Controller
{
    public function render(): void
    {
        require __DIR__ . '/../../View/includes/header.php';
        require __DIR__ . '/../../View/pages/home.php';
        require __DIR__ . '/../../View/includes/footer.php';
    }
}