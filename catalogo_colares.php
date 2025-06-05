<?php
    include 'includes/header.php';

    // Produtos fictícios para colares
    $produtos_colares = [
        ["id" => 9, "nome" => "Chocker Heart Cristal", "preco" => "89,90", "imagem" => "https://placehold.co/300x300/FDF8E1/777?text=Colar+Ponto+Luz", "descricao" => "Delicado e brilhante, perfeito para o dia a dia."],
        ["id" => 10, "nome" => "Chocker Pingente Coração", "preco" => "149,50", "imagem" => "https://placehold.co/300x300/FCEFB4/666?text=Colar+Gravatinha", "descricao" => "Um toque de sofisticação e modernidade para seu decote."],
        ["id" => 11, "nome" => "Chocker Riveira Baguete 40cm Fecho Gaveta", "preco" => "199,00", "imagem" => "https://placehold.co/300x300/FAE588/555?text=Choker+Riviera", "descricao" => "Brilho intenso e glamour para ocasiões especiais."],
        ["id" => 12, "nome" => "Colar Árvore Zircônias na Mandala", "preco" => "115,90", "imagem" => "https://placehold.co/300x300/FDF8E1/777?text=Colar+Longo", "descricao" => "Versátil e estiloso, ideal para compor mixes de colares."],
        ["id" => 13, "nome" => "Colar Ponto de Luz Zircônia Redonda", "preco" => "169,90", "imagem" => "https://placehold.co/300x300/FCEFB4/666?text=Colar+Medalha", "descricao" => "Uma peça única com significado especial para você."],
        ["id" => 14, "nome" => "Gargantilha Círculo Cravejado Zircônia", "preco" => "130,00", "imagem" => "https://placehold.co/300x300/FAE588/555?text=Colar+Corrente", "descricao" => "Moderno e imponente, para um visual cheio de atitude."],
        ["id" => 15, "nome" => "Gargantilha Coração Pedra Esmeralda", "preco" => "99,90", "imagem" => "https://placehold.co/300x300/FDF8E1/888?text=Colar+Cora%C3%A7%C3%A3o", "descricao" => "Romântico e delicado, perfeito para presentear alguém especial."],
        ["id" => 16, "nome" => "Gargantilha Flor Cravejada", "preco" => "120,00", "imagem" => "https://placehold.co/300x300/FCEFB4/444?text=Colar+P%C3%A9rola", "descricao" => "Elegância atemporal com pérola sintética de alta qualidade."],
    ];
?>

<div class="container section-padding">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-5">Nossos Colares</h1>
            <p class="lead text-secondary-text">Descubra a elegância e o charme dos nossos colares exclusivos.</p>
        </div>
    </div>

    <div class="row g-4">
        <?php foreach ($produtos_colares as $produto): ?>
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
