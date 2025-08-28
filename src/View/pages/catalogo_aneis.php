<?php
    // Produtos fictícios para anéis
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
?>

<div class="container section-padding">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-5">Nossos Anéis</h1>
            <p class="lead text-secondary-text">Explore nossa coleção exclusiva de anéis, desenhados para realçar sua beleza.</p>
        </div>
    </div>

    <div class="row g-4">
        <?php foreach ($produtos_aneis as $produto): ?>
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 shadow-sm product-card bg-white">
                <img src="<?php echo htmlspecialchars($produto['imagem']); ?>" class="card-img-top img-placeholder-elegant" alt="<?php echo htmlspecialchars($produto['nome']); ?>">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?php echo htmlspecialchars($produto['nome']); ?></h5>
                    <p class="card-text text-secondary-text small flex-grow-1"><?php echo htmlspecialchars($produto['descricao']); ?></p>
                    <p class="card-text fs-5 fw-bold text-main-text mb-3">R$ <?php echo htmlspecialchars($produto['preco']); ?></p>
                    <div class="mt-auto">
                        <a href="https://wa.me/5544999692011?text=Olá%2C%20tenho%20interesse%20em%20comprar%20uma%20semijoia." target="_blank" class="btn btn-primary w-100 mb-2">Comprar  </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>