// Espera o DOM estar completamente carregado para executar os scripts
document.addEventListener('DOMContentLoaded', function () {

    // Inicialização do Vanilla Masker para o campo de telefone
    const phoneInput = document.querySelector('input[type="tel"]#telefone'); // Seletor mais específico com ID
    if (phoneInput) {
        VMasker(phoneInput).maskPattern('(99) 99999-9999');
    }

    // Validação do formulário de contato (exemplo básico)
    const contactForm = document.querySelector('#formContato');
    if (contactForm) {
        contactForm.addEventListener('submit', function (event) {
            let isValid = true;
            let firstInvalidField = null;

            // Elementos de feedback
            const nomeFeedback = document.querySelector('#nomeFeedback');
            const emailFeedback = document.querySelector('#emailFeedback');
            const telefoneFeedback = document.querySelector('#telefoneFeedback');
            const generoFeedback = document.querySelector('#generoFeedback');
            const assuntoFeedback = document.querySelector('#assuntoFeedback');
            const mensagemFeedback = document.querySelector('#mensagemFeedback');

            // Limpa feedbacks anteriores e classes de inválido
            document.querySelectorAll('.form-control, .form-select').forEach(input => {
                input.classList.remove('is-invalid');
            });
            document.querySelectorAll('.invalid-feedback').forEach(feedback => {
                if (feedback) feedback.style.display = 'none';
            });


            // Validação do Nome
            const nome = document.querySelector('#nome');
            if (nome && nome.value.trim() === '') {
                isValid = false;
                nome.classList.add('is-invalid');
                if (nomeFeedback) {
                    nomeFeedback.textContent = 'Por favor, informe seu nome completo.';
                    nomeFeedback.style.display = 'block';
                }
                if (!firstInvalidField) firstInvalidField = nome;
            }

            // Validação do Email
            const email = document.querySelector('#email');
            if (email) {
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (email.value.trim() === '') {
                    isValid = false;
                    email.classList.add('is-invalid');
                    if (emailFeedback) {
                        emailFeedback.textContent = 'Por favor, informe seu e-mail.';
                        emailFeedback.style.display = 'block';
                    }
                    if (!firstInvalidField) firstInvalidField = email;
                } else if (!emailPattern.test(email.value.trim())) {
                    isValid = false;
                    email.classList.add('is-invalid');
                    if (emailFeedback) {
                        emailFeedback.textContent = 'Por favor, informe um e-mail válido.';
                        emailFeedback.style.display = 'block';
                    }
                    if (!firstInvalidField) firstInvalidField = email;
                }
            }

           // Verifica se o campo está completamente preenchido
        const telefone = document.querySelector('#telefone');
        if (telefone) {
            // Remove caracteres não numéricos para contar apenas os dígitos
            const apenasDigitos = telefone.value.replace(/\D/g, '');

            // Um telefone no Brasil tem 10 (fixo) ou 11 (celular com 9º dígito) números.
            // A validação checa se a quantidade de dígitos é menor que 11.
            if (apenasDigitos.length < 11) {
                isValid = false;
                telefone.classList.add('is-invalid');
                if (telefoneFeedback) {
                    // Mostra uma mensagem diferente se o campo estiver vazio ou se estiver incompleto
                    if (telefone.value.trim() === '') {
                        telefoneFeedback.textContent = 'Por favor, informe seu telefone.';
                    } else {
                        telefoneFeedback.textContent = 'Por favor, preencha o telefone completo com DDD.';
                    }
                    telefoneFeedback.style.display = 'block';
                }
                if (!firstInvalidField) firstInvalidField = telefone;
            }
        }

           // Validação do Gênero (agora select)
            const generoSelect = document.querySelector('#genero-select');
            if (generoSelect) {
                if (!generoSelect.value || generoSelect.value === '') {
                    isValid = false;
                    generoSelect.classList.add('is-invalid');
                    if (generoFeedback) {
                        generoFeedback.textContent = 'Por favor, selecione seu gênero.';
                        generoFeedback.style.display = 'block';
                    }
                    if (!firstInvalidField) firstInvalidField = generoSelect;
                } else {
                    generoSelect.classList.remove('is-invalid');
                    if (generoFeedback) {
                        generoFeedback.textContent = '';
                        generoFeedback.style.display = 'none';
                    }
                }
            }


                // Validação do Assunto
                const assunto = document.querySelector('#assunto');
            if (assunto && assunto.value.trim() === '') {
                isValid = false;
                assunto.classList.add('is-invalid');
                if (assuntoFeedback) {
                    assuntoFeedback.textContent = 'Por favor, informe o assunto.';
                    assuntoFeedback.style.display = 'block';
                }
                if (!firstInvalidField) firstInvalidField = assunto;
            }

            // Validação da Mensagem
            const mensagem = document.querySelector('#mensagem');
            if (mensagem && mensagem.value.trim() === '') {
                isValid = false;
                mensagem.classList.add('is-invalid');
                if (mensagemFeedback) {
                    mensagemFeedback.textContent = 'Por favor, escreva sua mensagem.';
                    mensagemFeedback.style.display = 'block';
                }
                if (!firstInvalidField) firstInvalidField = mensagem;
            }

            if (!isValid) {
                event.preventDefault(); // Impede o envio do formulário PHP se a validação JS falhar
                event.stopPropagation();

                if (firstInvalidField) {
                    firstInvalidField.focus();
                }
            } else {
                // Se for válido, o formulário será enviado para o PHP.
                // A mensagem de sucesso/erro do PHP será exibida na página após o reload.
            }
        });
    }

    // Ativar active state para links de navegação baseado na URL atual
    const currentPath = window.location.pathname.split("/").pop();
    if (currentPath === "") { // Para o caso de index.php ser a raiz
        document.querySelector('.navbar-nav .nav-link[href="index.php"]')?.classList.add('active');
    } else {
        const activeLink = document.querySelector(`.navbar-nav .nav-link[href="${currentPath}"]`);
        if (activeLink) {

            document.querySelectorAll('.navbar-nav .nav-link.active').forEach(link => link.classList.remove('active'));
            activeLink.classList.add('active');
        }
        // Para o dropdown de catálogos
        if (currentPath.startsWith("catalogo_")) {
            const catalogosDropdown = document.querySelector('#navbarDropdownCatalogos');
            if (catalogosDropdown) {
                // Remove 'active' de qualquer outro link que possa ter sido setado no HTML
                document.querySelectorAll('.navbar-nav .nav-link.active').forEach(link => link.classList.remove('active'));
                catalogosDropdown.classList.add('active');
            }
        }
    }


    // Adiciona classe 'active' ao link de navegação 'Início' se for a página principal
    // e nenhum outro link específico da página atual for encontrado.
    // Isso garante que 'Início' fique ativo na raiz do site.
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    let hasActivePageLink = false;
    navLinks.forEach(link => {
        if (link.href === window.location.href && window.location.pathname !== '/' && !window.location.pathname.endsWith('index.php')) {
            // Remove active de todos os links primeiro
            navLinks.forEach(l => l.classList.remove('active'));
            // Adiciona active ao link correspondente
            link.classList.add('active');
            hasActivePageLink = true;

            // Se o link ativo estiver dentro de um dropdown, marca o toggler do dropdown como ativo também
            const dropdownToggle = link.closest('.nav-item.dropdown')?.querySelector('.nav-link.dropdown-toggle');
            if (dropdownToggle) {
                dropdownToggle.classList.add('active');
            }
        }
    });

    // Se nenhuma página específica está ativa e estamos na página inicial (index.php ou raiz)
    // ou se o dropdown de catálogos deve estar ativo.
    const pageName = window.location.pathname.split("/").pop();
    if (!hasActivePageLink) {
        if (pageName === 'index.php' || pageName === '') {
            navLinks.forEach(l => l.classList.remove('active'));
            document.querySelector('.navbar-nav .nav-link[href="index.php"]')?.classList.add('active');
        } else if (pageName.startsWith('catalogo_')) {
            navLinks.forEach(l => l.classList.remove('active'));
            document.querySelector('#navbarDropdownCatalogos')?.classList.add('active');
        }
    }

});
