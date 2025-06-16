<?php
    include 'includes/header.php';
?>

<section class="banner-principal container-fluid p-0">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://placehold.co/1920x600/FAE588/333?text=Coleção+Exclusiva" class="d-block w-100 img-placeholder-elegant" alt="Banner Coleção Exclusiva" style="object-fit: cover; max-height: 600px;">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                    <h5 class="text-white">Principais Escolhas</h5>
                    <p class="text-white-50">Peças deslumbrantes para iluminar seus dias.</p>
                    <a href="catalogo_todos.php" class="btn btn-primary">Descubra Nossas Novidades</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://placehold.co/1920x600/FCEFB4/4A4A4A?text=Elegância+em+Cada+Detalhe" class="d-block w-100 img-placeholder-elegant" alt="Banner Elegância em Cada Detalhe" style="object-fit: cover; max-height: 600px;">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                    <h5 class="text-white">Elegância em Cada Detalhe</h5>
                    <p class="text-white-50">Semijoias que transformam seu look.</p>
                    <a href="catalogo_aneis.php" class="btn btn-primary">Ver Anéis</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Próximo</span>
        </button>
    </div>
</section>

<section class="destaques section-padding">
    <div class="container">
        <h2 class="text-center mb-5 display-6">Nossos Destaques</h2>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow">
                    <img src="img/Anel Cristal Triangular Zircônias Laterais.jpg" class="card-img-top img-placeholder-elegant" alt="Anel Dourado Radiante">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Anéis Deslumbrantes</h5>
                        <p class="card-text text-secondary-text">Descubra nossa coleção de anéis, perfeitos para todas as ocasiões.</p>
                        <a href="catalogo_aneis.php" class="btn btn-primary mt-auto align-self-start">Ver Anéis</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow">
                    <img src="img/Gargantilha Círculo Cravejado Zircônias.jpg" class="card-img-top img-placeholder-elegant" alt="Colar Elegância Sutil">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Colares Elegantes</h5>
                        <p class="card-text text-secondary-text">Colares que adicionam um toque de sofisticação ao seu visual.</p>
                        <a href="catalogo_colares.php" class="btn btn-primary mt-auto align-self-start">Ver Colares</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4"> <div class="card h-100 shadow">
                    <img src="img/Pulseira Dupla Corações Pérolas e Vazados.jpg" class="card-img-top img-placeholder-elegant" alt="Pulseira Charme Delicado">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Pulseiras Charmosas</h5>
                        <p class="card-text text-secondary-text">Complete seu estilo com nossas pulseiras delicadas e modernas.</p>
                        <a href="catalogo_pulseiras.php" class="btn btn-primary mt-auto align-self-start">Ver Pulseiras</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sobre-breve section-padding bg-light-cards">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <img src="https://placehold.co/500x350/F9DC5C/333?text=Nossa+Paixão+por+Joias" class="img-fluid rounded shadow-sm img-placeholder-elegant" alt="Imagem ilustrativa da marca">
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0">
                <h2 class="mb-3 display-6">Conheça Nossa Essência</h2>
                <p class="text-secondary-text lead">
                    Na [Nome da Loja de Semijoias], acreditamos que cada peça conta uma história e reflete a beleza única de quem a usa.
                    Nossa paixão é criar e selecionar semijoias com design exclusivo, materiais de alta qualidade e um acabamento impecável.
                </p>
                <p class="text-secondary-text">
                    Desde [Ano de Fundação Fictício], buscamos oferecer mais do que acessórios: entregamos autoestima, elegância e momentos inesquecíveis.
                </p>
                <a href="sobre.php" class="btn btn-secondary">Saiba Mais Sobre Nós</a>
            </div>
        </div>
    </div>
</section>

<section class="cta section-padding">
    <div class="container text-center">
        <h2 class="mb-3 display-6">Quer Algo Único?</h2>
        <p class="lead text-secondary-text mb-4">Crie uma semijoia com a sua personalidade. Personalize e brilhe do seu jeito.</p>
        <a href="https://wa.me/5544999692011?text=Olá%2C%20tenho%20interesse%20em%20joias%20personalizadas.%20Gostaria%20de%20saber%20mais%20detalhes." target="_blank" class="btn btn-primary btn-lg me-2 mb-2 mb-md-0">Criar Minha Peça Exclusiva</a>
    </div>
</section>


<?php
    include 'includes/footer.php';
?>