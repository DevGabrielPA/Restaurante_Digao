<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Restaurante do Digão</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-logo">
                <img src="/images/logo-digao.jpg" alt="Restaurante do Digão" style="width:100px; height:100px; border-radius:50%; object-fit:cover; margin-bottom:16px;">
                <h1>Restaurante do Digão</h1>
            </div>

            <div class="login-form">
                <div id="login-error" style="display:none; background:rgba(231,76,60,0.12); border:1px solid var(--danger); border-radius:6px; padding:10px 14px; margin-bottom:16px; color:var(--danger); font-size:13px;"></div>

                <div class="form-group">
                    <label class="form-label" for="email">E-mail ou Nome</label>
                    <input type="text" id="email" class="form-input" placeholder="seu@email.com ou seu nome" onkeydown="if(event.key==='Enter') fazerLogin()">
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Senha</label>
                    <input type="password" id="password" class="form-input" placeholder="••••••••" onkeydown="if(event.key==='Enter') fazerLogin()">
                </div>

                <button onclick="fazerLogin()" class="btn btn-primary" style="width:100%; padding:14px; font-size:15px; justify-content:center;">
                    Entrar
                </button>

            </div>
        </div>
    </div>

    <script>
        // Redireciona quem já está logado
        if (sessionStorage.getItem('usuario')) {
            window.location.href = '/comandas';
        }

        const cargoLabel = {
            administrador: 'Administrador', gerente: 'Gerente',
            garcom: 'Garçom', caixa: 'Caixa', cozinheiro: 'Cozinheiro',
        };

        function getUsuarios() {
            const stored = localStorage.getItem('rdigao_funcionarios');
            const funcs = stored ? JSON.parse(stored) : {
                f1: { nome: 'Carlos Silva',   email: 'carlos.silva@restaurante.com',   cargo: 'administrador', senha: '123456', primeiroLogin: true },
                f2: { nome: 'Ana Ferreira',   email: 'ana.ferreira@restaurante.com',   cargo: 'garcom',        senha: '123456', primeiroLogin: true },
                f3: { nome: 'Roberto Costa',  email: 'roberto.costa@restaurante.com',  cargo: 'caixa',         senha: '123456', primeiroLogin: true },
                f4: { nome: 'Juliana Santos', email: 'juliana.santos@restaurante.com', cargo: 'garcom',        senha: '123456', primeiroLogin: true },
            };
            // Indexado por e-mail E por nome (ambos em minúsculo)
            const mapa = {};
            Object.values(funcs).forEach(f => {
                const parts = f.nome.trim().split(' ');
                const ini = (parts[0][0] + (parts[1] ? parts[1][0] : parts[0][1])).toUpperCase();
                const dados = {
                    nome:          f.nome,
                    email:         f.email.toLowerCase(),
                    cargo:         cargoLabel[f.cargo] || f.cargo,
                    cargoKey:      f.cargo,
                    ini,
                    senha:         f.senha || '123456',
                    primeiroLogin: f.primeiroLogin !== false,
                };
                mapa[f.email.toLowerCase()]  = dados;
                mapa[f.nome.toLowerCase()]   = dados;
            });
            return mapa;
        }

        function fazerLogin() {
            const input  = document.getElementById('email').value.trim();
            const senha  = document.getElementById('password').value;
            const erroEl = document.getElementById('login-error');

            erroEl.style.display = 'none';

            if (!input || !senha) {
                erroEl.textContent = 'Preencha o e-mail (ou nome) e a senha.';
                erroEl.style.display = '';
                return;
            }

            const usuarios = getUsuarios();
            const usuario  = usuarios[input.toLowerCase()];

            if (!usuario) {
                erroEl.textContent = 'Usuário não encontrado. Verifique o e-mail ou nome.';
                erroEl.style.display = '';
                return;
            }

            if (senha !== usuario.senha) {
                erroEl.textContent = 'Senha incorreta.';
                erroEl.style.display = '';
                return;
            }

            const { nome, email, cargo, cargoKey, ini, primeiroLogin } = usuario;
            sessionStorage.setItem('usuario', JSON.stringify({ nome, email, cargo, cargoKey, ini, primeiroLogin }));
            window.location.href = '/comandas';
        }
    </script>
</body>
</html>
