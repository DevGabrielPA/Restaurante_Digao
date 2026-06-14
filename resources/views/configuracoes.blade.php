@extends('layout')

@section('conteudo')
    <div class="page-header">
        <div>
            <h1 class="page-title">Configurações</h1>
            <p class="page-subtitle">Personalize a aparência, fonte e exibição do Restaurante do Digão para toda a aplicação.</p>
        </div>
    </div>

    <div class="settings-grid">
        <div class="card settings-card">
            <div class="card-header">
                <h2 class="card-title">Tema de exibição</h2>
            </div>
            <p class="settings-helper">Escolha entre modo escuro ou claro para toda a interface.</p>
            <div class="settings-section">
                <div class="type-selector">
                    <button type="button" class="type-btn settings-option-button" data-theme="dark" onclick="setAppTheme('dark'); markSettingsSelection();">Modo Escuro</button>
                    <button type="button" class="type-btn settings-option-button" data-theme="light" onclick="setAppTheme('light'); markSettingsSelection();">Modo Claro</button>
                </div>
            </div>
        </div>

        <div class="card settings-card">
            <div class="card-header">
                <h2 class="card-title">Tamanho do texto</h2>
            </div>
            <p class="settings-helper">Ajuste o tamanho da fonte base para facilitar a leitura em qualquer tela.</p>
            <div class="settings-section">
                <div class="type-selector">
                    <button type="button" class="type-btn settings-option-button" data-font-size="sm" onclick="setAppFontSize('sm'); markSettingsSelection();">Pequeno</button>
                    <button type="button" class="type-btn settings-option-button" data-font-size="md" onclick="setAppFontSize('md'); markSettingsSelection();">Padrão</button>
                    <button type="button" class="type-btn settings-option-button" data-font-size="lg" onclick="setAppFontSize('lg'); markSettingsSelection();">Grande</button>
                </div>
            </div>

            <div class="card-header" style="margin-top: 24px; padding-top: 0; border-top: 1px solid var(--border);">
                <h2 class="card-title">Fonte</h2>
            </div>
            <p class="settings-helper">Troque a família de fontes usada em toda a aplicação.</p>
            <div class="settings-section">
                <div class="type-selector">
                    <button type="button" class="type-btn settings-option-button" data-font-family="sans" onclick="setAppFontFamily('sans'); markSettingsSelection();">Sans</button>
                    <button type="button" class="type-btn settings-option-button" data-font-family="serif" onclick="setAppFontFamily('serif'); markSettingsSelection();">Serif</button>
                    <button type="button" class="type-btn settings-option-button" data-font-family="mono" onclick="setAppFontFamily('mono'); markSettingsSelection();">Mono</button>
                </div>
            </div>
        </div>

        <div class="card settings-card">
            <div class="card-header">
                <h2 class="card-title">Informações do sistema</h2>
            </div>
            <div class="settings-info">
                <div class="info-row">
                    <div class="info-label">Restaurante</div>
                    <div class="info-value">Restaurante do Digão</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Versão do sistema</div>
                    <div class="info-value">1.0.0</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Usuário logado</div>
                    <div class="info-value" id="config-user-name">Carregando...</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Cargo</div>
                    <div class="info-value" id="config-user-role">Carregando...</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Produtos cadastrados</div>
                    <div class="info-value" id="info-produtos-count">0</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Funcionários cadastrados</div>
                    <div class="info-value" id="info-funcionarios-count">0</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Última atualização local</div>
                    <div class="info-value" id="config-last-updated">--</div>
                </div>
            </div>
        </div>
    </div>

    <div class="table-container" style="margin-top: 28px;">
        <div class="table-header" style="padding: 16px 20px; background-color: rgba(213, 147, 77, 0.06); border-bottom: 1px solid var(--border);">
            <h2 class="card-title" style="margin:0;">Status das configurações</h2>
        </div>
        <div style="padding: 20px;">
            <div class="settings-info">
                <div class="info-row">
                    <div class="info-label">Tema atual</div>
                    <div class="info-value" id="config-theme-value">Carregando...</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Tamanho da fonte</div>
                    <div class="info-value" id="config-font-size-value">Carregando...</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Fonte aplicada</div>
                    <div class="info-value" id="config-font-family-value">Carregando...</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Layout</div>
                    <div class="info-value">Responsivo, integrado ao tema atual</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const user = JSON.parse(sessionStorage.getItem('usuario') || '{}');
            document.getElementById('config-user-name').textContent = user.nome || 'Carregando...';
            document.getElementById('config-user-role').textContent = user.cargo || 'Sem cargo';
            document.getElementById('config-last-updated').textContent = new Date().toLocaleString('pt-BR');

            const produtos = JSON.parse(localStorage.getItem('rdigao_produtos') || '{}');
            const funcionarios = JSON.parse(localStorage.getItem('rdigao_funcionarios') || '{}');
            const produtosCount = typeof produtos === 'object' ? Object.keys(produtos).length : 0;
            const funcionariosCount = typeof funcionarios === 'object' ? Object.keys(funcionarios).length : 0;

            document.getElementById('info-produtos-count').textContent = produtosCount;
            document.getElementById('info-funcionarios-count').textContent = funcionariosCount;

            const settings = getAppSettings();
            document.getElementById('config-theme-value').textContent = settings.theme === 'light' ? 'Claro' : 'Escuro';
            document.getElementById('config-font-size-value').textContent = settings.fontSize === 'lg' ? 'Grande' : settings.fontSize === 'sm' ? 'Pequeno' : 'Padrão';
            document.getElementById('config-font-family-value').textContent = settings.fontFamily === 'serif' ? 'Serif' : settings.fontFamily === 'mono' ? 'Mono' : 'Sans';

            markSettingsSelection();
        });
    </script>
@endsection
