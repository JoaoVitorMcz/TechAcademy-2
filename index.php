<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glamour & Brilho - Semijoias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" xintegrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

    <header class="bg-white shadow-sm sticky-top">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand fw-bold text-primary" href="index.php">
                    <i class="fas fa-gem me-2"></i>Glamour & Brilho
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#produtos">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#sobre">Sobre Nós</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contato">Contato</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="hero-section text-center py-5 bg-primary text-white">
        <div class="container">
            <h1 class="display-4 fw-bold">Descubra a Elegância das Nossas Semijoias</h1>
            <p class="lead my-3">Peças únicas para realçar sua beleza em cada detalhe.</p>
            <a href="#produtos" class="btn btn-light btn-lg rounded-pill">Ver Coleção</a>
        </div>
    </section>

    <section id="produtos" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Nossos Destaques</h2>
            <div class="row g-4">
                <?php
                // Array de produtos (simulação)
                $produtos = [
                    ["nome" => "Colar Gota de Cristal", "preco" => "149,90", "imagem" => "https://placehold.co/600x400/E0BBE4/957DAD?text=Colar+Cristal", "descricao" => "Elegante colar com pingente de cristal em formato de gota."],
                    ["nome" => "Brincos Argola Dourada", "preco" => "89,90", "imagem" => "https://placehold.co/600x400/FFDAC1/B79480?text=Brincos+Argola", "descricao" => "Brincos de argola clássicos com banho dourado."],
                    ["nome" => "Pulseira Riviera Zircônias", "preco" => "199,90", "imagem" => "https://placehold.co/600x400/D4F0F0/79B4B7?text=Pulseira+Riviera", "descricao" => "Pulseira delicada cravejada de zircônias brilhantes."],
                    ["nome" => "Anel Solitário", "preco" => "129,90", "imagem" => "https://placehold.co/600x400/FFF2CC/D4A373?text=Anel+Solitário", "descricao" => "Anel solitário clássico, perfeito para todas as ocasiões."]
                ];

                foreach ($produtos as $produto): ?>
                    <div class="col-md-6 col-lg-3">
                        <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                            <img src="<?php echo $produto['imagem']; ?>" class="card-img-top" alt="[Imagem de <?php echo $produto['nome']; ?>]" style="height: 200px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-semibold"><?php echo $produto['nome']; ?></h5>
                                <p class="card-text small text-muted flex-grow-1"><?php echo $produto['descricao']; ?></p>
                                <p class="card-text fs-5 fw-bold text-primary">R$ <?php echo $produto['preco']; ?></p>
                                <a href="#" class="btn btn-primary rounded-pill mt-auto w-100"><i class="fas fa-shopping-cart me-2"></i>Comprar</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>  
    </section>

    <section id="sobre" class="py-5 bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="https://placehold.co/800x600/E0E0E0/A0A0A0?text=Nossa+Loja" class="img-fluid rounded-3 shadow" alt="[Imagem da Loja de Semijoias]">
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <h2 class="fw-bold mb-3">Sobre a Glamour & Brilho</h2>
                    <p class="text-muted">Na Glamour & Brilho, acreditamos que cada mulher merece se sentir especial e confiante. Nossas semijoias são cuidadosamente selecionadas e confeccionadas com materiais de alta qualidade, banhadas a ouro 18k ou ródio, e adornadas com pedras naturais e zircônias que capturam a luz e a atenção.</p>
                    <p class="text-muted">Nossa missão é oferecer peças que combinem design sofisticado, durabilidade e um toque de exclusividade, permitindo que você expresse sua personalidade e brilhe em todos os momentos.</p>
                    <a href="#contato" class="btn btn-outline-primary rounded-pill mt-3">Fale Conosco</a>
                </div>
            </div>
        </div>
    </section>

    <section id="contato" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Entre em Contato</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div id="form-message" class="mb-3"></div> <form id="contactForm" class="bg-white p-4 p-md-5 rounded-3 shadow-sm">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nome" class="form-label">Nome Completo <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-pill" id="nome" name="nome" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">E-mail <span class="text-danger">*</span></label>
                                <input type="email" class="form-control rounded-pill" id="email" name="email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="telefone" class="form-label">Telefone/WhatsApp <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control rounded-pill" id="telefone" name="telefone" placeholder="(XX) XXXXX-XXXX" required>
                            </div>
                            <div class="col-md-6">
                                <label for="assunto" class="form-label">Assunto <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-pill" id="assunto" name="assunto" required>
                            </div>
                            <div class="col-12">
                                <label for="mensagem" class="form-label">Mensagem <span class="text-danger">*</span></label>
                                <textarea class="form-control rounded-3" id="mensagem" name="mensagem" rows="5" required></textarea>
                            </div>
                            <div class="col-12">
                                <label for="como_conheceu" class="form-label">Como nos conheceu?</label>
                                <select class="form-select rounded-pill" id="como_conheceu" name="como_conheceu">
                                    <option selected disabled value="">Selecione uma opção</option>
                                    <option value="redes_sociais">Redes Sociais</option>
                                    <option value="indicacao">Indicação de um amigo</option>
                                    <option value="google">Google</option>
                                    <option value="outro">Outro</option>
                                </select>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5">
                                    <i class="fas fa-paper-plane me-2"></i>Enviar Mensagem
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p class="mb-0">&copy; <?php echo date("Y"); ?> Glamour & Brilho Semijoias. Todos os direitos reservados.</p>
            <p class="mb-0">
                <a href="#" class="text-white me-2"><i class="fab fa-instagram fa-lg"></i></a>
                <a href="#" class="text-white me-2"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#" class="text-white"><i class="fab fa-whatsapp fa-lg"></i></a>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>
                    
