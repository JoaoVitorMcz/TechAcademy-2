<?php
namespace App\Controller;
class SobreController implements Controller
{
    public function render(): void
    {
        include __DIR__ . '/../View/includes/header.php';
        include __DIR__ . '/../View/pages/sobre.php';
        include __DIR__ . '/../View/includes/footer.php';
    }
}