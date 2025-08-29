<?php
use App\Model\Cliente;
require_once __DIR__ . '/../../../vendor/autoload.php';
if($_POST){
    $cliente = new Cliente(
        nome: $_POST['nomeRegistro'],
        email: $_POST['emailRegistro'],
        telefone: $_POST['telefoneRegistro'],
        senha: $_POST['senhaRegistro']
    );
    $cliente->save();
}
?>
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