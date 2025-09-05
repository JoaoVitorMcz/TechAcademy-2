
<div class="container section-padding">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-5">Todas As Peças</h1>
            <p class="lead text-secondary-text">Explore nossa variedade completa de semijoias, perfeitas para todos os estilos e ocasiões.

</p>
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
                            <a href="https://wa.me/5544999692011?text=Olá%2C%20tenho%20interesse%20em%20comprar%20uma%20semijoia." target="_blank" class="btn btn-primary w-100 mb-2">Comprar </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
