document.addEventListener('DOMContentLoaded', function () {
    const contactForm = document.getElementById('contactForm');
    const formMessageContainer = document.getElementById('form-message');

    if (contactForm) {
        contactForm.addEventListener('submit', function (event) {
            event.preventDefault(); // Impede o envio padrão do formulário
            formMessageContainer.innerHTML = ''; // Limpa mensagens anteriores

            // Coleta os dados do formulário
            const nome = document.getElementById('nome').value.trim();
            const email = document.getElementById('email').value.trim();
            const telefone = document.getElementById('telefone').value.trim();
            const assunto = document.getElementById('assunto').value.trim();
            const mensagem = document.getElementById('mensagem').value.trim();
            const comoConheceu = document.getElementById('como_conheceu').value;

            // Validação simples
            let isValid = true;
            let errors = [];

            if (nome === '') {
                isValid = false;
                errors.push('O campo Nome é obrigatório.');
                document.getElementById('nome').classList.add('is-invalid');
            } else {
                document.getElementById('nome').classList.remove('is-invalid');
                document.getElementById('nome').classList.add('is-valid');
            }

            if (email === '') {
                isValid = false;
                errors.push('O campo E-mail é obrigatório.');
                document.getElementById('email').classList.add('is-invalid');
            } else if (!isValidEmail(email)) {
                isValid = false;
                errors.push('Por favor, insira um e-mail válido.');
                document.getElementById('email').classList.add('is-invalid');
            } else {
                document.getElementById('email').classList.remove('is-invalid');
                document.getElementById('email').classList.add('is-valid');
            }

            if (telefone === '') {
                isValid = false;
                errors.push('O campo Telefone/WhatsApp é obrigatório.');
                document.getElementById('telefone').classList.add('is-invalid');
            } else if (!isValidPhone(telefone)) {
                isValid = false;
                errors.push('Por favor, insira um telefone válido (ex: (XX) XXXXX-XXXX).');
                document.getElementById('telefone').classList.add('is-invalid');
            } else {
                document.getElementById('telefone').classList.remove('is-invalid');
                document.getElementById('telefone').classList.add('is-valid');
            }

            if (assunto === '') {
                isValid = false;
                errors.push('O campo Assunto é obrigatório.');
                document.getElementById('assunto').classList.add('is-invalid');
            } else {
                document.getElementById('assunto').classList.remove('is-invalid');
                document.getElementById('assunto').classList.add('is-valid');
            }

            if (mensagem === '') {
                isValid = false;
                errors.push('O campo Mensagem é obrigatório.');
                document.getElementById('mensagem').classList.add('is-invalid');
            } else {
                document.getElementById('mensagem').classList.remove('is-invalid');
                document.getElementById('mensagem').classList.add('is-valid');
            }

            // Se não houver o campo "como_conheceu" selecionado (opcional, mas se quiser validar)
            // if (comoConheceu === '') {
            //     isValid = false;
            //     errors.push('Por favor, selecione como nos conheceu.');
            //     document.getElementById('como_conheceu').classList.add('is-invalid');
            // } else {
            //     document.getElementById('como_conheceu').classList.remove('is-invalid');
            //     document.getElementById('como_conheceu').classList.add('is-valid');
            // }


            if (isValid) {
                // Simula o envio do formulário (aqui você integraria com PHP para enviar e-mail, salvar no DB, etc.)
                console.log('Formulário válido. Dados:', {
                    nome, email, telefone, assunto, mensagem, comoConheceu
                });

                // Exibe mensagem de sucesso
                formMessageContainer.innerHTML = `
                    <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
                        <strong>Obrigado!</strong> Sua mensagem foi enviada com sucesso. Entraremos em contato em breve.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`;
                contactForm.reset(); // Limpa o formulário
                // Remove classes de validação
                const fields = contactForm.querySelectorAll('.form-control, .form-select');
                fields.forEach(field => {
                    field.classList.remove('is-valid', 'is-invalid');
                });

            } else {
                // Exibe mensagens de erro
                let errorMessagesHTML = '<ul class="mb-0">';
                errors.forEach(error => {
                    errorMessagesHTML += `<li>${error}</li>`;
                });
                errorMessagesHTML += '</ul>';

                formMessageContainer.innerHTML = `
                    <div class="alert alert-danger alert-dismissible fade show rounded-3" role="alert">
                        <strong>Ops!</strong> Por favor, corrija os erros abaixo:
                        ${errorMessagesHTML}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`;
            }
        });
    }

    // Função para validar e-mail (regex simples)
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Função para validar telefone (permite formatos como (XX) XXXXX-XXXX, XXXXXXXXXXX, etc.)
    // Esta é uma regex básica, pode ser melhorada para ser mais estrita.
    function isValidPhone(phone) {
        const phoneRegex = /^\(?\d{2}\)?[\s-]?\d{4,5}-?\d{4}$/;
        return phoneRegex.test(phone);
    }

    // Adiciona máscara simples para o campo de telefone (opcional, mas melhora UX)
    const phoneInput = document.getElementById('telefone');
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não é dígito
            if (value.length > 11) value = value.substring(0, 11); // Limita a 11 dígitos

            if (value.length > 10) { // Celular com 9º dígito
                value = value.replace(/^(\d{2})(\d{5})(\d{4}).*/, '($1) $2-$3');
            } else if (value.length > 6) { // Telefone fixo ou celular sem 9º antes de completar
                 value = value.replace(/^(\d{2})(\d{4})(\d{0,4}).*/, '($1) $2-$3');
            } else if (value.length > 2) {
                value = value.replace(/^(\d{2})(\d*).*/, '($1) $2');
            } else if (value.length > 0) {
                value = value.replace(/^(\d*).*/, '($1');
            }
            e.target.value = value;
        });
    }
});