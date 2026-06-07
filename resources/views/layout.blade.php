<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Restaurante</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="layout">
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <img src="/images/logo-digao.jpg" alt="Restaurante do Digão" style="width:48px; height:48px; border-radius:50%; object-fit:cover;">
                </div>
            </div>

            <nav class="sidebar-nav">
                <a href="{{ url('/comandas') }}" data-page="comandas" class="nav-link {{ Request::is('comandas') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                    </svg>
                    <span>Comandas</span>
                </a>

                <a href="{{ url('/produtos') }}" data-page="produtos" class="nav-link {{ Request::is('produtos') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                    </svg>
                    <span>Produtos</span>
                </a>

                <a href="{{ url('/funcionarios') }}" data-page="funcionarios" class="nav-link {{ Request::is('funcionarios') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                    </svg>
                    <span>Funcionários</span>
                </a>

                <a href="{{ url('/historico') }}" data-page="historico" class="nav-link {{ Request::is('historico') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z"/>
                    </svg>
                    <span>Histórico</span>
                </a>
            </nav>

            <div class="sidebar-footer">
                <div class="user-info">
                    <div class="user-avatar" id="sidebar-ini">--</div>
                    <div class="user-details">
                        <div class="user-name" id="sidebar-nome">Carregando...</div>
                        <div class="user-role" id="sidebar-cargo"></div>
                    </div>
                    <button class="logout-btn" title="Sair" onclick="logout()">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5-5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </aside>

        <main class="main-content">
            <div class="content-wrapper">
                @yield('conteudo')
            </div>
        </main>
    </div>

    {{-- Modal: definir nova senha no primeiro login --}}
    <div class="modal-overlay" id="modal-primeira-senha" style="display:none;">
        <div class="modal modal-produto-sm" style="max-width:440px;">
            <div class="modal-header">
                <div>
                    <h2 class="modal-title">Defina sua senha pessoal</h2>
                    <p style="font-size:13px; color:var(--text-muted); margin-top:4px;">Substitua a senha padrão por uma senha segura.</p>
                </div>
                <button class="modal-close" onclick="fecharModalSenha()" title="Agora não">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
                </button>
            </div>
            <div class="modal-form-body">
                <div id="senha-modal-erro" style="display:none; background:rgba(231,76,60,0.12); border:1px solid var(--danger); border-radius:6px; padding:10px 14px; margin-bottom:16px; color:var(--danger); font-size:13px;"></div>
                <div class="form-group">
                    <label class="form-label">Nova senha</label>
                    <input type="password" id="modal-nova-senha" class="form-input" placeholder="Mínimo 6 caracteres" onkeydown="if(event.key==='Enter') salvarNovaSenha()">
                </div>
                <div class="form-group" style="margin-bottom:0;">
                    <label class="form-label">Confirmar nova senha</label>
                    <input type="password" id="modal-confirmar-senha" class="form-input" placeholder="Repita a senha" onkeydown="if(event.key==='Enter') salvarNovaSenha()">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" onclick="fecharModalSenha()">Agora não</button>
                <button class="btn btn-primary" onclick="salvarNovaSenha()">Salvar senha</button>
            </div>
        </div>
    </div>

    <script>
        const permissoesCargo = {
            administrador: ['comandas', 'produtos', 'funcionarios', 'historico'],
            gerente:       ['comandas', 'produtos', 'funcionarios', 'historico'],
            garcom:        ['comandas'],
            caixa:         ['comandas', 'produtos', 'historico'],
            cozinheiro:    ['comandas', 'produtos'],
        };

        (function () {
            const raw = sessionStorage.getItem('usuario');
            if (!raw) { window.location.href = '/'; return; }

            const user   = JSON.parse(raw);
            const chave  = (user.cargoKey || '').toLowerCase();
            const perms  = permissoesCargo[chave] || ['comandas'];
            const pagina = window.location.pathname.replace('/', '') || 'comandas';

            // Preenche sidebar
            document.getElementById('sidebar-ini').textContent   = user.ini;
            document.getElementById('sidebar-nome').textContent  = user.nome;
            document.getElementById('sidebar-cargo').textContent = user.cargo;

            // Esconde links sem permissão
            document.querySelectorAll('.nav-link[data-page]').forEach(link => {
                if (!perms.includes(link.dataset.page)) link.style.display = 'none';
            });

            // Redireciona se página atual não permitida
            if (!perms.includes(pagina)) {
                window.location.href = '/' + perms[0];
                return;
            }

            // Mostra modal de primeira senha apenas uma vez por sessão
            if (user.primeiroLogin && !sessionStorage.getItem('senhaModalMostrado')) {
                sessionStorage.setItem('senhaModalMostrado', '1');
                window.addEventListener('DOMContentLoaded', function () {
                    document.getElementById('modal-primeira-senha').style.display = 'flex';
                });
            }
        })();

        function fecharModalSenha() {
            document.getElementById('modal-primeira-senha').style.display = 'none';
        }

        function salvarNovaSenha() {
            const nova  = document.getElementById('modal-nova-senha').value;
            const conf  = document.getElementById('modal-confirmar-senha').value;
            const erroEl = document.getElementById('senha-modal-erro');

            erroEl.style.display = 'none';

            if (nova.length < 6) {
                erroEl.textContent = 'A senha deve ter pelo menos 6 caracteres.';
                erroEl.style.display = '';
                return;
            }
            if (nova !== conf) {
                erroEl.textContent = 'As senhas não coincidem.';
                erroEl.style.display = '';
                return;
            }

            // Atualiza no localStorage
            const user  = JSON.parse(sessionStorage.getItem('usuario'));
            const funcs = JSON.parse(localStorage.getItem('rdigao_funcionarios') || '{}');
            Object.keys(funcs).forEach(id => {
                if (funcs[id].email && funcs[id].email.toLowerCase() === user.email) {
                    funcs[id].senha         = nova;
                    funcs[id].primeiroLogin = false;
                }
            });
            localStorage.setItem('rdigao_funcionarios', JSON.stringify(funcs));

            // Atualiza sessão
            user.primeiroLogin = false;
            sessionStorage.setItem('usuario', JSON.stringify(user));

            fecharModalSenha();
        }

        function logout() {
            sessionStorage.removeItem('usuario');
            window.location.href = '/';
        }
    </script>
</body>
</html>
