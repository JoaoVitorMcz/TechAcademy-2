<?php
    include 'includes/header.php';

    // Produtos fictícios para pulseiras
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
?>

<div class="container section-padding">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-5">Nossas Pulseiras</h1>
            <p class="lead text-secondary-text">Adicione charme e personalidade ao seu look com nossas pulseiras.</p>
        </div>
    </div>

    <div class="row g-4">
        <?php foreach ($produtos_pulseiras as $produto): ?>
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 shadow-sm product-card">
                <img src="<?php echo htmlspecialchars($produto['imagem']); ?>" class="card-img-top img-placeholder-elegant" alt="<?php echo htmlspecialchars($produto['nome']); ?>">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?php echo htmlspecialchars($produto['nome']); ?></h5>
                    <p class="card-text text-secondary-text small flex-grow-1"><?php echo htmlspecialchars($produto['descricao']); ?></p>
                    <p class="card-text fs-5 fw-bold text-main-text mb-3">R$ <?php echo htmlspecialchars($produto['preco']); ?></p>
                     <div class="mt-auto">
                        <a href="https://wa.me/5544999692011?text=Olá%2C%20tenho%20interesse%20em%20comprar%20uma%20semijoia." class="btn btn-primary w-100 mb-2">Comprar</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
    include 'includes/footer.php';
?>
