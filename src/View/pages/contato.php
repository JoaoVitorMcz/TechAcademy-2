<?php
// Apenas exibe mensagens se houver redirecionamento de envia.php
if (isset($_GET['status'])) {
    $tipo_alerta = $_GET['status'] === 'sucesso' ? 'success' : 'danger';
    $mensagem_status = $_GET['status'] === 'sucesso' ? 'Sucesso!' : 'Erro!';
    $mensagem_texto = isset($_GET['msg']) ? htmlspecialchars($_GET['msg']) : '';
}
?>

<div class="container section-padding">
    <div class="row justify-content-center">
        <div class="col-lg-10 text-center mb-5">
            <h1 class="display-5">Entre em Contato</h1>
            <p class="lead text-secondary-text">Adoraríamos ouvir de você! Preencha o formulário abaixo ou utilize um dos nossos outros canais de atendimento.</p>
        </div>
    </div>

    <div class="row gy-5">
        <div class="col-lg-15">
            <h2 class="h4 mb-4">Envie-nos uma Mensagem</h2>

            <?php if (!empty($mensagem_status)): ?>
                <div class="alert alert-<?php echo $tipo_alerta; ?> alert-dismissible fade show" role="alert">
                    <strong><?php echo $mensagem_status; ?></strong> <?php echo $mensagem_texto; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form id="formContato" action="envia.php" method="POST" novalidate>
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome Completo <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                    <div class="invalid-feedback" id="nomeFeedback"></div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback" id="emailFeedback"></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="telefone" class="form-label">Telefone <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="(99) 99999-9999" required>
                        <div class="invalid-feedback" id="telefoneFeedback"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="genero-select" class="form-label">Gênero <span class="text-danger">*</span></label>
                    <select name="genero" id="genero-select" class="form-control" required>
                        <option value="" disabled selected>Selecione seu gênero</option>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                    </select>
                    <div class="invalid-feedback" id="generoFeedback"></div>
                </div>
                <div class="mb-3">
                    <label for="assunto" class="form-label">Assunto <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="assunto" name="assunto" required>
                    <div class="invalid-feedback" id="assuntoFeedback"></div>
                </div>
                <div class="mb-3">
                    <label for="mensagem" class="form-label">Mensagem <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="mensagem" name="mensagem" rows="5" required></textarea>
                    <div class="invalid-feedback" id="mensagemFeedback"></div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Enviar Mensagem</button>
            </form>
        </div>
    </div>
</div>