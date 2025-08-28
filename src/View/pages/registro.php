<?php
use App\Model\Cliente;


$mensagemCerta = "Sua conta foi criada com sucesso!";
$mensagemErro = "Ocorreu um erro no seu registro!";

if ($_POST) {
    $nome = trim($_POST['nomeRegistro']);
    $email = trim($_POST['emailRegistro']);
    $telefone = trim($_POST['telefoneRegistro']);
    $senha = $_POST['senhaRegistro'];

    $erros = [];


    if (strlen($nome) <= 3) {
        $erros[] = "O nome deve ter pelo menos 3 caracteres.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "Email inválido.";
    }

    if (!preg_match('/^\(\d{2}\)\s\d{4,5}-\d{4}$/', $telefone)) {
        $erros[] = "Telefone inválido. Use o formato (XX) XXXXX-XXXX.";
    }

    if (strlen($senha) < 6) {
        $erros[] = "A senha deve ter pelo menos 6 caracteres.";
    }

    if (!empty($erros)) {
        foreach ($erros as $erro) {
            echo "
            <div class='alerta' style='background-color: red; color: white;'>$erro</div>
            ";
        }
    } else {
        $user = new Cliente(
            name: $nome,
            email: $email,
            telefone: $telefone,
            senha: $senha
        );
        $user->save();

        echo "
        <div class='alerta' style='background-color: green; color: white;'>$mensagemCerta</div>
        ";
    }
}
?>

<style>
    :root{
    --color-primary: #F9DC5C;
    --color-secondary-highlight: #FAE588;
    --color-light-background-cards: #FCEFB4;
    --color-very-light-background-base: #FDF8E1;
    --color-text-main: #333333;
    --color-text-secondary: #555555;
    --color-bootstrap-secondary-grey: #6C757D;

    --font-family-base: 'Inter', sans-serif;
}
    body{
    font-family: var(--font-family-base);
    background: linear-gradient(135deg, var(--color-very-light-background-base) 0%, var(--color-light-background-cards) 100%);
    color: var(--color-text-main);
    line-height: 1.5;
    }
.alerta {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px 30px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0,0,0,0.3);
    font-size: 16px;
    text-align: center;
    z-index: 1000;
    opacity: 1;
    transition: opacity 0.5s ease;
}
</style>

<script>
setTimeout(() => {
    document.querySelectorAll('.alerta').forEach(alerta => {
        alerta.style.opacity = 0;
        setTimeout(() => alerta.remove(), 500);
    });
}, 3000);
</script>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center">
        <div class="row w-100 justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                <div class="card card-registro shadow-lg border-0">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h2 class="card-title mb-2">Criar Conta</h2>
                            <p class="text-muted">Registre sua conta!</p>
                        </div>
                        <form method="post" id="formularioRegistro" novalidate>
                            <div class="mb-3">
                                <label for="nome" class="form-label"><i class="fas fa-user me-2"></i>Nome Completo:</label>
                                <input type="text" class="form-control" id="nomeRegistro" name="nomeRegistro" required minlength="3">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label"><i class="fas fa-envelope me-2"></i>E-mail:</label>
                                <input type="text" class="form-control" id="emailRegistro" name="emailRegistro" required>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <label for="telefone" class="form-label"><i class="fas fa-phone me-2"></i>Telefone:</label>
                                <input type="tel" class="form-control" id="telefoneRegistro" name="telefoneRegistro" required>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label"><i class="fas fa-lock me-2"></i>Senha:</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="senhaRegistro" name="senhaRegistro" required placeholder="senha com 6 caracteres">
                                    <button class="btn btn-outline-secondary" type="button" id="toggleSenha"><i class="fas fa-eye" id="botaoSenha"></i></button>
                                </div>
                                <div class="mt-1" id="mensagemCasoDeErro">senha de 6 digitos</div>
                            </div>
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-user-plus me-2"></i>
                                    Criar Conta
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>