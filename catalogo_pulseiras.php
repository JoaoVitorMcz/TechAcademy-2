<?php
    include 'includes/header.php';

    // Produtos fictícios para pulseiras
    $produtos_pulseiras = [
        ["id" => 13, "nome" => "Pulseira Riviera Fina", "preco" => "159,90", "imagem" => "https://placehold.co/300x300/FDF8E1/777?text=Pulseira+Riviera", "descricao" => "Um clássico de brilho e sofisticação para seu pulso."],
        ["id" => 14, "nome" => "Pulseira Berloques Temática", "preco" => "189,50", "imagem" => "https://placehold.co/300x300/FCEFB4/666?text=Pulseira+Berloques", "descricao" => "Conte sua história com nossos berloques exclusivos."],
        ["id" => 15, "nome" => "Bracelete Liso Moderno", "preco" => "129,00", "imagem" => "https://placehold.co/300x300/FAE588/555?text=Bracelete+Liso", "descricao" => "Design minimalista e elegante para o dia a dia."],
        ["id" => 16, "nome" => "Pulseira Olho Grego Proteção", "preco" => "75,90", "imagem" => "https://placehold.co/300x300/FDF8E1/777?text=Pulseira+Olho+Grego", "descricao" => "Amuleto de sorte e proteção com muito estilo."],
        ["id" => 17, "nome" => "Pulseira Infantil Delicada", "preco" => "99,90", "imagem" => "https://placehold.co/300x300/FCEFB4/666?text=Pulseira+Infantil", "descricao" => "Fofura e delicadeza para as pequenas princesas."],
        ["id" => 18, "nome" => "Mix de Pulseiras Boho", "preco" => "140,00", "imagem" => "https://placehold.co/300x300/FAE588/555?text=Mix+Pulseiras", "descricao" => "Conjunto estiloso para um look despojado e moderno."],
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
