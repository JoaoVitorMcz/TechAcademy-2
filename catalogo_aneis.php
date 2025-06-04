<?php
    include 'includes/header.php';

    // Produtos fictícios para anéis
    $produtos_aneis = [
        ["id" => 1, "nome" => "Anel Aparador Unitário Meia Aliança Zircônia ", "preco" => "129,90", "imagem" => "img\Anel Aparador Unitário Meia Aliança Zircônia.jpg", "descricao" => "Um clássico atemporal, perfeito para todas as ocasiões."],
        ["id" => 2, "nome" => "Anel Aparador Delicado", "preco" => "99,50", "imagem" => "https://placehold.co/300x300/FCEFB4/666?text=Anel+Aparador", "descricao" => "Delicadeza e brilho para complementar sua aliança ou outros anéis."],
        ["id" => 3, "nome" => "Anel Coração Vazado", "preco" => "79,00", "imagem" => "https://placehold.co/300x300/FAE588/555?text=Anel+Coração", "descricao" => "Romântico e moderno, um toque de amor em seus dedos."],
        ["id" => 4, "nome" => "Anel Falange Moderno", "preco" => "65,90", "imagem" => "https://placehold.co/300x300/FDF8E1/777?text=Anel+Falange", "descricao" => "Estilo e atitude para um look contemporâneo."],
        ["id" => 5, "nome" => "Anel Pedra Fusion Turmalina", "preco" => "189,90", "imagem" => "https://placehold.co/300x300/FCEFB4/666?text=Anel+Pedra+Fusion", "descricao" => "Cor intensa e vibrante para um visual marcante."],
        ["id" => 6, "nome" => "Anel Regulável Folhas", "preco" => "110,00", "imagem" => "https://placehold.co/300x300/FAE588/555?text=Anel+Folhas", "descricao" => "Design inspirado na natureza, ajustável e confortável."],
        ["id" => 7, "nome" => "Anel Solitário Clássico", "preco" => "149,90", "imagem" => "https://placehold.co/300x300/FDF8E1/888?text=Anel+Solitário", "descricao" => "Elegância e sofisticação em um design tradicional."],
        ["id" => 8, "nome" => "Anel Geométrico Minimalista", "preco" => "89,00", "imagem" => "https://placehold.co/300x300/FCEFB4/444?text=Anel+Geométrico", "descricao" => "Para quem ama linhas limpas e estilo moderno."]
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
            <div class="card h-100 shadow-sm product-card">
                <img src="<?php echo htmlspecialchars($produto['imagem']); ?>" class="card-img-top img-placeholder-elegant" alt="<?php echo htmlspecialchars($produto['nome']); ?>">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?php echo htmlspecialchars($produto['nome']); ?></h5>
                    <p class="card-text text-secondary-text small flex-grow-1"><?php echo htmlspecialchars($produto['descricao']); ?></p>
                    <p class="card-text fs-5 fw-bold text-main-text mb-3">R$ <?php echo htmlspecialchars($produto['preco']); ?></p>
                    <div class="mt-auto">
                        <a href="#" class="btn btn-primary w-100 mb-2">Ver Detalhes</a>
                        <button type="button" class="btn btn-outline-primary w-100" style="--bs-btn-border-color: var(--color-primary); --bs-btn-hover-bg: var(--color-primary); --bs-btn-hover-border-color: var(--color-primary); --bs-btn-active-bg: var(--color-primary); --bs-btn-active-border-color: var(--color-primary); --bs-btn-color: var(--color-primary); --bs-btn-hover-color: var(--color-text-main);">
                            <i class="bi bi-cart-plus-fill me-2"></i>Adicionar ao Carrinho
                        </button>
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