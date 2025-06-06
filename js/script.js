// Espera o DOM estar completamente carregado para executar os scripts
document.addEventListener('DOMContentLoaded', function () {

    // Inicialização do Vanilla Masker para o campo de telefone
    const phoneInput = document.querySelector('input[type="tel"]#telefone'); // Seletor mais específico com ID
    if (phoneInput) {
        // Tenta aplicar as máscaras. Começa com a de 9 dígitos.
        // Se o usuário digitar menos, a máscara de 8 dígitos pode ser aplicada.
        // Vanilla Masker não suporta múltiplos padrões de forma dinâmica como o jQuery Mask Plugin.
        // Para uma solução mais robusta com Vanilla Masker, você pode precisar de lógica adicional
        // para trocar a máscara baseada no comprimento do input.
        // Por simplicidade, vamos usar a máscara mais comum (9 dígitos).
        VMasker(phoneInput).maskPattern('(99) 99999-9999');

        // Uma abordagem alternativa para múltiplos padrões (mais complexa de gerenciar com VMasker puro):
        // phoneInput.addEventListener('input', function(e) {
        //     const value = e.target.value.replace(/\D/g, '');
        //     if (value.length <= 10) {
        //         VMasker(e.target).unMask();
        //         VMasker(e.target).maskPattern('(99) 9999-9999');
        //     } else {
        //         VMasker(e.target).unMask();
        //         VMasker(e.target).maskPattern('(99) 99999-9999');
        //     }
        //     // É preciso reaplicar o valor após mudar a máscara, o que pode ser tricky.
        //     // A solução acima com uma única máscara é mais simples para o Vanilla Masker.
        // }, false);
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
            const mensagemFeedback = document.querySelector('#mensagemFeedback');

            // Limpa feedbacks anteriores e classes de inválido
            document.querySelectorAll('.form-control, .form-select').forEach(input => {
                input.classList.remove('is-invalid');
            });
            document.querySelectorAll('.invalid-feedback').forEach(feedback => {
                if(feedback) feedback.style.display = 'none';
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

            // Validação do Telefone (apenas se é obrigatório e se está vazio, a máscara já ajuda no formato)
            const telefone = document.querySelector('#telefone');
            if (telefone && telefone.value.trim() === '') { // Considerando obrigatório
                isValid = false;
                telefone.classList.add('is-invalid');
                if (telefoneFeedback) {
                    telefoneFeedback.textContent = 'Por favor, informe seu telefone.';
                    telefoneFeedback.style.display = 'block';
                }
                if (!firstInvalidField) firstInvalidField = telefone;
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
                
                // Foca no primeiro campo inválido para melhor UX
                if (firstInvalidField) {
                    firstInvalidField.focus();
                }
                // Adiciona a classe 'was-validated' para mostrar os feedbacks do Bootstrap, se estiver usando-os nativamente
                // contactForm.classList.add('was-validated'); // Descomente se for usar validação nativa do Bootstrap junto
            } else {
                // Se for válido, o formulário será enviado para o PHP.
                // A mensagem de sucesso/erro do PHP será exibida na página após o reload.
                // Para uma UX mais fluida sem reload, seria necessário AJAX, o que está fora do escopo de "PHP básico".
            }
        });
    }

    // Ativar active state para links de navegação baseado na URL atual
    // Isso é mais robusto que apenas 'active' no HTML, especialmente com includes PHP
    const currentPath = window.location.pathname.split("/").pop();
    if (currentPath === "") { // Para o caso de index.php ser a raiz
        document.querySelector('.navbar-nav .nav-link[href="index.php"]')?.classList.add('active');
    } else {
        const activeLink = document.querySelector(`.navbar-nav .nav-link[href="${currentPath}"]`);
        if (activeLink) {
            // Remove 'active' de qualquer outro link que possa ter sido setado no HTML
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


    // Tooltips do Bootstrap (se for usar)
    // var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    // var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    //   return new bootstrap.Tooltip(tooltipTriggerEl)
    // })

});
