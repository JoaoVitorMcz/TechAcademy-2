<?php 
namespace App\Controller;

class catalogo_pulseirasController implements Controller
{
    public function render(): void
    {
         $produtos_pulseiras = [
        ["id" => 17, "nome" => "Pulseira Cordão Baiano Torcido", "preco" => "135,00", "imagem" => "img/Pulseira 18cm Cordão Baiano 2.0 Torcido.png", "descricao" => "Um clássico de brilho e sofisticação para seu pulso."],
        ["id" => 18, "nome" => "Pulseira de Flor", "preco" => "168,00", "imagem" => "img/Pulseira de Flor.jpg", "descricao" => "Conte sua história com nossos berloques exclusivos."],
        ["id" => 19, "nome" => "Pulseira Dupla Corações Pérolas e Vazados", "preco" => "117,00", "imagem" => "img/Pulseira Dupla Corações Pérolas e Vazados.jpg", "descricao" => "Design minimalista e elegante para o dia a dia."],
        ["id" => 20, "nome" => "Pulseira Elos 3x1 Fina", "preco" => "159,90", "imagem" => "img/Pulseira Elos 3x1 Fina.jpg", "descricao" => "Amuleto de sorte e proteção com muito estilo."],
        ["id" => 21, "nome" => "Pulseira Elos Duplix", "preco" => "198,00", "imagem" => "img/Pulseira Elos Duplix 15cm + Extensor Fecho LV.jpg", "descricao" => "Fofura e delicadeza para as pequenas princesas."],
        ["id" => 22, "nome" => "Pulseira Esferas e Cristais", "preco" => "189,00", "imagem" => "img/Pulseira Esferas e Cristais 18cm + Extensor 5cm.png", "descricao" => "Conjunto estiloso para um look despojado e moderno."],
        ["id" => 23, "nome" => "Pulseira Rede Oca", "preco" => "135,00", "imagem" => "img/Pulseira Rede Oca.jpg", "descricao" => "Estilo robusto e moderno para homens de atitude."],
        ["id" => 24, "nome" => "Pulseira Tripla Pontos De Luz Zircônias", "preco" => "168,00", "imagem" => "img/Pulseira tripla pontos de luz zircônias.jpg", "descricao" => "Elegância atemporal com pérolas delicadas."],
    ];
        include __DIR__ . '/../../src/View/includes/header.php';
        include __DIR__ . '/../../src/View/pages/catalogo_pulseiras.php';
        include __DIR__ . '/../../src/View/includes/footer.php';
    }
}