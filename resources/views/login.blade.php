<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Restaurante do Digão</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-logo">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2v7zm5-3v8h2.5v8H21V2c-2.76 0-5 2.24-5 4z"/>
                </svg>
                <h1>Restaurante do Digão</h1>
            </div>

            <div class="login-form">
                <div id="login-error" style="display:none; background:rgba(231,76,60,0.12); border:1px solid var(--danger); border-radius:6px; padding:10px 14px; margin-bottom:16px; color:var(--danger); font-size:13px;"></div>

                <div class="form-group">
                    <label class="form-label" for="email">E-mail</label>
                    <input type="email" id="email" class="form-input" placeholder="seu@email.com" onkeydown="if(event.key==='Enter') fazerLogin()">
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
            const mapa = {};
            Object.values(funcs).forEach(f => {
                const parts = f.nome.trim().split(' ');
                const ini = (parts[0][0] + (parts[1] ? parts[1][0] : parts[0][1])).toUpperCase();
                mapa[f.email.toLowerCase()] = {
                    nome:          f.nome,
                    email:         f.email.toLowerCase(),
                    cargo:         cargoLabel[f.cargo] || f.cargo,
                    cargoKey:      f.cargo,
                    ini,
                    senha:         f.senha || '123456',
                    primeiroLogin: f.primeiroLogin !== false,
                };
            });
            return mapa;
        }

        function fazerLogin() {
            const email  = document.getElementById('email').value.trim().toLowerCase();
            const senha  = document.getElementById('password').value;
            const erroEl = document.getElementById('login-error');

            if (!email || !senha) {
                erroEl.textContent = 'Preencha o e-mail e a senha.';
                erroEl.style.display = '';
                return;
            }

            const usuarios = getUsuarios();

            if (!usuarios[email]) {
                erroEl.textContent = 'E-mail não encontrado. Verifique e tente novamente.';
                erroEl.style.display = '';
                return;
            }

            if (senha !== usuarios[email].senha) {
                erroEl.textContent = 'Senha incorreta.';
                erroEl.style.display = '';
                return;
            }

            const { nome, cargo, cargoKey, ini, primeiroLogin } = usuarios[email];
            sessionStorage.setItem('usuario', JSON.stringify({ nome, email, cargo, cargoKey, ini, primeiroLogin }));
            window.location.href = '/comandas';
        }
    </script>
</body>
</html>
