<?php
namespace App\Controller;

class ErroController implements Controller {
    public function render(): void {
        include __DIR__ . '/../View/includes/header.php';
        include __DIR__ . '/../View/pages/erro.php';
        include __DIR__ . '/../View/includes/footer.php';
    }
}