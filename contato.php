<?php
    // Inclui o cabeçalho comum a todas as páginas
    include 'includes/header.php';

    // Variáveis para armazenar mensagens de feedback do formulário
    $mensagem_status = "";
    $mensagem_texto = "";
    $tipo_alerta = ""; // 'success' ou 'danger' para classes do Bootstrap

    // Processamento do formulário de contato
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitização básica dos inputs (importante para segurança)
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
        $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);
        $mensagem_usuario = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);

        // Validação dos campos
        $erros = [];
        if (empty($nome)) {
            $erros[] = "O campo Nome Completo é obrigatório.";
        }
        if (empty($email)) {
            $erros[] = "O campo Email é obrigatório.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erros[] = "O formato do Email é inválido.";
        }
        if (empty($telefone)) { // Considerando telefone como obrigatório
            $erros[] = "O campo Telefone é obrigatório.";
        }
         if (empty($assunto)) { // Considerando assunto como obrigatório
            $erros[] = "O campo Assunto  é obrigatório.";
        }
        if (empty($mensagem_usuario)) {
            $erros[] = "O campo Mensagem é obrigatório.";
        }

        if (empty($erros)) {
            // Simulação de envio de email (neste protótipo, apenas exibimos sucesso)
            $mensagem_status = "Sucesso!";
            $mensagem_texto = "Sua mensagem foi enviada com sucesso. Entraremos em contato em breve.";
            $tipo_alerta = "success";
        } else {
            $mensagem_status = "Erro ao enviar!";
            $mensagem_texto = "Por favor, corrija os seguintes erros:<br>" . implode("<br>", $erros);
            $tipo_alerta = "danger";
        }
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
        <!-- Coluna do formulário agora ocupa mais espaço em telas grandes -->
        <div class="col-lg-15">
            <h2 class="h4 mb-4">Envie-nos uma Mensagem</h2>

            <?php if (!empty($mensagem_status)): ?>
                <div class="alert alert-<?php echo $tipo_alerta; ?> alert-dismissible fade show" role="alert">
                    <strong><?php echo htmlspecialchars($mensagem_status); ?></strong> <?php echo $mensagem_texto; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form id="formContato" action="contato.php" method="POST" novalidate>
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome Completo <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nome" name="nome" required value="<?php echo isset($_POST['nome']) && $tipo_alerta === 'danger' ? htmlspecialchars($_POST['nome']) : ''; ?>">
                    <div class="invalid-feedback" id="nomeFeedback"></div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" required value="<?php echo isset($_POST['email']) && $tipo_alerta === 'danger' ? htmlspecialchars($_POST['email']) : ''; ?>">
                        <div class="invalid-feedback" id="emailFeedback"></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="telefone" class="form-label">Telefone <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="(99) 99999-9999" required value="<?php echo isset($_POST['telefone']) && $tipo_alerta === 'danger' ? htmlspecialchars($_POST['telefone']) : ''; ?>">
                        <div class="invalid-feedback" id="telefoneFeedback"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="assunto" class="form-label">Assunto<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="assunto" name="assunto" value="<?php echo isset($_POST['assunto']) && $tipo_alerta === 'danger' ? htmlspecialchars($_POST['assunto']) : ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="mensagem" class="form-label">Mensagem <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="mensagem" name="mensagem" rows="5" required><?php echo isset($_POST['mensagem']) && $tipo_alerta === 'danger' ? htmlspecialchars($_POST['mensagem']) : ''; ?></textarea>
                    <div class="invalid-feedback" id="mensagemFeedback"></div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Enviar Mensagem</button>
            </form>
        </div>
           
        </div>
    </div>
</div>

<?php
    // Inclui o rodapé comum a todas as páginas
    include 'includes/footer.php';
?>
