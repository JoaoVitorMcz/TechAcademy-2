<?php 
namespace App\Controller;

class Catalogo_colaresController implements Controller
{
    public function render(): void
    {
        $produtos_colares = [
        ["id" => 9, "nome" => "Chocker Heart Cristal", "preco" => "399,00", "imagem" => "img/Chocker Heart Cristal.png", "descricao" => "Delicado e brilhante, perfeito para o dia a dia."],
        ["id" => 10, "nome" => "Chocker Pingente Coração", "preco" => "207,00", "imagem" => "img/Chocker Pingente Coração.jpg", "descricao" => "Um toque de sofisticação e modernidade para seu decote."],
        ["id" => 11, "nome" => "Chocker Rivieira Baguete 40cm Fecho Gaveta", "preco" => "441,00", "imagem" => "img/Chocker Rivieira Baguete 40cm Fecho Gaveta.jpg", "descricao" => "Brilho intenso e glamour para ocasiões especiais."],
        ["id" => 12, "nome" => "Colar Árvore Zircônias na Mandala", "preco" => "189,00", "imagem" => "img/Colar Árvore Zircônias na Mandala.jpg", "descricao" => "Versátil e estiloso, ideal para compor mixes de colares."],
        ["id" => 13, "nome" => "Colar Ponto de Luz Zircônia Redonda", "preco" => "117,00", "imagem" => "img/Colar Ponto de Luz Zircônia Redonda.jpg", "descricao" => "Uma peça única com significado especial para você."],
        ["id" => 14, "nome" => "Gargantilha Círculo Cravejado Zircônia", "preco" => "177,00", "imagem" => "img/Gargantilha Círculo Cravejado Zircônias.jpg", "descricao" => "Moderno e imponente, para um visual cheio de atitude."],
        ["id" => 15, "nome" => "Gargantilha Coração Pedra Esmeralda", "preco" => "159,00", "imagem" => "img/Gargantilha Coração Pedra Esmeralda.jpg", "descricao" => "Romântico e delicado, perfeito para presentear alguém especial."],
        ["id" => 16, "nome" => "Gargantilha Flor Cravejada", "preco" => "168,00", "imagem" => "img/Gargantilha Flor Cravejada.jpg", "descricao" => "Elegância atemporal com pérola sintética de alta qualidade."],
    ];
        include __DIR__ . '/../View/includes/header.php';
        include __DIR__ . '/../View/pages/catalogo_colares.php';
        include __DIR__ . '/../View/includes/footer.php';
    }
}