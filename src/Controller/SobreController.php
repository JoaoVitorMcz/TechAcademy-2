<?php
namespace App\Controller;
class SobreController implements Controller
{
    public function render(): void
    {
        require __DIR__ . '/../../View/includes/header.php';
        require __DIR__ . '/../../View/pages/sobre.php';
        require __DIR__ . '/../../View/includes/footer.php';
    }
}