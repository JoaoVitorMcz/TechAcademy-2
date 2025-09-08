// Espera o DOM estar completamente carregado
document.addEventListener('DOMContentLoaded', function () {
  // ============== UTILIDADES ==============
  function setValidity(input, ok, msg) {
    if (!input) return;
    input.classList.toggle('is-valid', !!ok);
    input.classList.toggle('is-invalid', !ok);
    const feedback =
      input.parentNode?.querySelector('.invalid-feedback') ||
      document.querySelector(`#${input.id}Feedback`);
    if (feedback) {
      feedback.textContent = ok ? '' : (msg || '');
      feedback.style.display = ok ? 'none' : 'block';
    }
  }

  function attachBlurValidation(input, rule) {
    if (!input || !rule) return;
    input.addEventListener('blur', () => {
      const value = input.value ?? '';
      const ok = rule.test(value);
      setValidity(input, ok, rule.msg);
    });
  }

  // ============== MÁSCARAS ==============
  const telContato = document.getElementById('telefone');
  if (telContato && typeof VMasker !== 'undefined') {
    VMasker(telContato).maskPattern('(99) 99999-9999');
  }

  const telRegistro = document.getElementById('telefoneRegistro');
  if (telRegistro && typeof VMasker !== 'undefined') {
    VMasker(telRegistro).maskPattern('(99) 99999-9999');
  }

  // ============== FORMULÁRIO DE CONTATO (opcional) ==============
  // Suporta #formContato ou #formularioContato (use o que existir na sua página)
  const formContato = document.getElementById('formContato') || document.getElementById('formularioContato');
  if (formContato) {
    const nome = document.getElementById('nome');
    const email = document.getElementById('email');
    const telefone = document.getElementById('telefone');
    const generoSelect = document.getElementById('genero-select');
    const assunto = document.getElementById('assunto');
    const mensagem = document.getElementById('mensagem');

    const contatoRules = {
      nome:    { el: nome,     test: v => v.trim().length >= 3, msg: 'Por favor, informe seu nome completo.' },
      email:   { el: email,    test: v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v), msg: 'Por favor, informe um e-mail válido.' },
      telefone:{ el: telefone, test: v => /^\(\d{2}\)\s?\d{4,5}-\d{4}$/.test(v), msg: 'Por favor, preencha o telefone completo com DDD.' },
      genero:  { el: generoSelect, test: v => v !== '', msg: 'Por favor, selecione seu gênero.' },
      assunto: { el: assunto,  test: v => v.trim() !== '', msg: 'Por favor, informe o assunto.' },
      mensagem:{ el: mensagem, test: v => v.trim() !== '', msg: 'Por favor, escreva sua mensagem.' },
    };

    // Blur validation
    Object.values(contatoRules).forEach(r => r.el && attachBlurValidation(r.el, r));

    // Submit validation
    formContato.addEventListener('submit', function (event) {
      let okForm = true;
      let firstInvalid = null;

      Object.values(contatoRules).forEach(r => {
        if (!r.el) return;
        const ok = r.test(r.el.value ?? '');
        setValidity(r.el, ok, r.msg);
        if (!ok && !firstInvalid) firstInvalid = r.el;
        okForm = okForm && ok;
      });

      if (!okForm) {
        event.preventDefault();
        event.stopPropagation();
        firstInvalid?.focus();
      }
    });
  }

  // ============== FORMULÁRIO DE REGISTRO (principal) ==============
  const formularioRegistro = document.getElementById('formularioRegistro');
  if (formularioRegistro) {
    const nomeRegistro = document.getElementById('nomeRegistro');
    const emailRegistro = document.getElementById('emailRegistro');
    const telefoneRegistro = document.getElementById('telefoneRegistro');
    const senhaRegistro = document.getElementById('senhaRegistro');
    const confirmarSenhaRegistro = document.getElementById('confirmarSenhaRegistro');
    const toggleSenhaBtn = document.getElementById('toggleSenha');

    // Toggle de visibilidade da senha
    function visibilidadeSenha(input, button) {
      if (!input || !button) return;
      const icon = button.querySelector('i');
      if (input.type === 'password') {
        input.type = 'text';
        icon?.classList.remove('fa-eye');
        icon?.classList.add('fa-eye-slash');
      } else {
        input.type = 'password';
        icon?.classList.remove('fa-eye-slash');
        icon?.classList.add('fa-eye');
      }
    }
    if (toggleSenhaBtn && senhaRegistro) {
      toggleSenhaBtn.addEventListener('click', () => visibilidadeSenha(senhaRegistro, toggleSenhaBtn));
    }

    // Regras centralizadas (IDs do registro)
    const rules = {
      nomeRegistro: {
        el: nomeRegistro,
        test: v => v.trim().length >= 3,
        msg: 'Por favor, insira seu nome completo.',
      },
      emailRegistro: {
        el: emailRegistro,
        test: v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v),
        msg: 'Por favor, insira um email válido.',
      },
      telefoneRegistro: {
        el: telefoneRegistro,
        test: v => /^\(\d{2}\)\s?\d{4,5}-\d{4}$/.test(v),
        msg: 'Por favor, insira um telefone válido no formato (XX) XXXXX-XXXX.',
      },
      senhaRegistro: {
        el: senhaRegistro,
        test: v => (v ?? '').length >= 6,
        msg: 'A senha deve ter pelo menos 6 caracteres.',
      },
      confirmarSenhaRegistro: {
        el: confirmarSenhaRegistro,
        test: v => (v ?? '').length >= 6 && v === (senhaRegistro?.value ?? ''),
        msg: 'As senhas devem coincidir.',
      },
    };

    // Validação em tempo real (blur)
    Object.values(rules).forEach(r => r.el && attachBlurValidation(r.el, r));

    // Se a senha mudar, revalida a confirmação
    if (senhaRegistro && confirmarSenhaRegistro) {
      senhaRegistro.addEventListener('input', () => {
        if (confirmarSenhaRegistro.value) {
          const r = rules.confirmarSenhaRegistro;
          const ok = r.test(confirmarSenhaRegistro.value);
          setValidity(confirmarSenhaRegistro, ok, r.msg);
        }
      });
    }

    // Submit do registro
    formularioRegistro.addEventListener('submit', function (event) {
      event.preventDefault();

      let okForm = true;
      let firstInvalid = null;

      Object.values(rules).forEach(r => {
        if (!r.el) return;
        const ok = r.test(r.el.value ?? '');
        setValidity(r.el, ok, r.msg);
        if (!ok && !firstInvalid) firstInvalid = r.el;
        okForm = okForm && ok;
      });

      if (!okForm) {
        firstInvalid?.focus();
        return; // bloqueia envio
      }

      // Tudo certo: prossiga com o fluxo desejado
      // Ex.: redirecionar
      window.location.href = 'home';
      // ou enviar: formularioRegistro.submit();
    });
  }

  // ============== ATIVAÇÃO DE LINK DA NAVBAR (se usar) ==============
  const currentPath = window.location.pathname.split('/').pop();
  if (currentPath === '') {
    document.querySelector('.navbar-nav .nav-link[href="index.php"]')?.classList.add('active');
  } else {
    const activeLink = document.querySelector(`.navbar-nav .nav-link[href="${currentPath}"]`);
    if (activeLink) {
      document.querySelectorAll('.navbar-nav .nav-link.active').forEach(l => l.classList.remove('active'));
      activeLink.classList.add('active');
      const dropdownToggle = activeLink.closest('.nav-item.dropdown')?.querySelector('.nav-link.dropdown-toggle');
      dropdownToggle?.classList.add('active');
    }
    if (currentPath.startsWith('catalogo_')) {
      document.querySelectorAll('.navbar-nav .nav-link.active').forEach(l => l.classList.remove('active'));
      document.querySelector('#navbarDropdownCatalogos')?.classList.add('active');
    }
  }

  const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
  let hasActivePageLink = false;
  navLinks.forEach(link => {
    if (link.href === window.location.href && window.location.pathname !== '/' && !window.location.pathname.endsWith('index.php')) {
      navLinks.forEach(l => l.classList.remove('active'));
      link.classList.add('active');
      const dropdownToggle = link.closest('.nav-item.dropdown')?.querySelector('.nav-link.dropdown-toggle');
      dropdownToggle?.classList.add('active');
      hasActivePageLink = true;
    }
  });
  const pageName = window.location.pathname.split('/').pop();
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