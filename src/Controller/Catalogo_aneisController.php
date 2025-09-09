<?php 
namespace App\Controller;
class Catalogo_aneisController implements Controller
{
    public function render(): void
    {
        $produtos_aneis = [
        ["id" => 1, "nome" => "Anel Aparador Unitário Meia Aliança Zircônia ", "preco" => "129,00", "imagem" => "img\Anel Aparador Unitário Meia Aliança Zircônia.jpg", "descricao" => "Um clássico atemporal, perfeito para todas as ocasiões."],
        ["id" => 2, "nome" => "Anel Aparador Unitário Vazado com Zircônias", "preco" => "129,00", "imagem" => "img/Anel Aparador Unitário Vazado com Zircônias.jpg", "descricao" => "Delicadeza e brilho para complementar sua aliança ou outros anéis."],
        ["id" => 3, "nome" => "Anel Chuveirinho Cravejado Zircônias", "preco" => "135,00", "imagem" => "img/Anel Chuveirinho Cravejado Zircônias.jpg", "descricao" => "Romântico e moderno, um toque de amor em seus dedos."],
        ["id" => 4, "nome" => "Anel Cristal Triangular Zircônias Laterais", "preco" => "387,00", "imagem" => "img/Anel Cristal Triangular Zircônias Laterais.jpg", "descricao" => "Estilo e atitude para um look contemporâneo."],
        ["id" => 5, "nome" => "Anel Dedinho Coração Liso Falange", "preco" => "177,00", "imagem" => "img/Anel Dedinho Coração Liso Falange.jpg", "descricao" => "Cor intensa e vibrante para um visual marcante."],
        ["id" => 6, "nome" => "Anel Meio Torcido Redondo", "preco" => "99,00", "imagem" => "img/Anel Meio Torcido Redondo.png", "descricao" => "Design inspirado na natureza, ajustável e confortável."],
        ["id" => 7, "nome" => "Anel Orgânico com Pérola Regulável", "preco" => "219,00", "imagem" => "img/Anel Orgânico com Pérola Regulável.jpg", "descricao" => "Elegância e sofisticação em um design tradicional."],
        ["id" => 8, "nome" => "Anel Solitário Master Zircônia Grande", "preco" => "129,00", "imagem" => "img/Anel Solitário Master Zircônia Grande.jpg", "descricao" => "Para quem ama linhas limpas e estilo moderno."]
    ];
        include __DIR__ . '/../View/includes/header.php';
        include __DIR__ . '/../View/pages/catalogo_aneis.php';
        include __DIR__ . '/../View/includes/footer.php';
    }
}