<?php
    // Define o ano atual para o copyright no rodapé ou onde for necessário
    $anoAtual = date("Y");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nome da Loja de Semijoias</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" href="https://placehold.co/32x32/F9DC5C/333?text=SJ" type="image/png">
</head>
<body class="bg-base">

    <header class="sticky-top shadow-sm">
        <nav class="navbar navbar-expand-lg navbar-light bg-very-light-clear">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="https://placehold.co/150x50/F9DC5C/333?text=Logo+Joias" alt="Logo Nome da Loja de Semijoias" class="img-fluid" style="max-height: 50px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Início</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCatalogos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Catálogos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownCatalogos">
                                <li><a class="dropdown-item" href="catalogo_aneis.php">Anéis</a></li>
                                <li><a class="dropdown-item" href="catalogo_colares.php">Colares</a></li>
                                <li><a class="dropdown-item" href="catalogo_pulseiras.php">Pulseiras</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sobre.php">Sobre Nós</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contato.php">Contato</a>
                        </li>
                        <!--
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-search"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-cart3"></i></a>
                        </li>
                        -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>