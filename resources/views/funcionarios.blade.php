@extends('layout')

@section('conteudo')
<div class="page-header">
    <div>
        <h1 class="page-title">Funcionários</h1>
        <p class="page-subtitle" id="func-count"></p>
    </div>
    <button class="btn btn-primary" onclick="abrirModalFunc()">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
        Novo Funcionário
    </button>
</div>

{{-- Tabela --}}
<div class="table-container">
    <table class="table" id="tabela-funcionarios">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Nível</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr data-id="f1">
                <td>
                    <div class="employee-row-name">
                        <div class="employee-avatar avatar-administrador">CS</div>
                        <div>
                            <div class="employee-name">Carlos Silva</div>
                            <div class="employee-roles">Administrador · Garçom · Caixa</div>
                        </div>
                    </div>
                </td>
                <td class="text-muted">carlos.silva@restaurante.com</td>
                <td><span class="nivel-badge nivel-administrador"><span class="nivel-dot"></span>Administrador</span></td>
                <td><div class="table-actions">
                    <a href="#" class="link-action" onclick="editarFuncionario('f1'); return false;">Editar</a>
                    <a href="#" class="link-action link-danger" style="opacity:0.3; pointer-events:none; cursor:not-allowed;" title="Administradores não podem ser excluídos" onclick="excluirFuncionario('f1'); return false;">Excluir</a>
                </div></td>
            </tr>
            <tr data-id="f2">
                <td>
                    <div class="employee-row-name">
                        <div class="employee-avatar avatar-garcom">AF</div>
                        <div>
                            <div class="employee-name">Ana Ferreira</div>
                            <div class="employee-roles">Garçom</div>
                        </div>
                    </div>
                </td>
                <td class="text-muted">ana.ferreira@restaurante.com</td>
                <td><span class="nivel-badge nivel-garcom"><span class="nivel-dot"></span>Garçom</span></td>
                <td><div class="table-actions">
                    <a href="#" class="link-action" onclick="editarFuncionario('f2'); return false;">Editar</a>
                    <a href="#" class="link-action link-danger" onclick="excluirFuncionario('f2'); return false;">Excluir</a>
                </div></td>
            </tr>
            <tr data-id="f3">
                <td>
                    <div class="employee-row-name">
                        <div class="employee-avatar avatar-caixa">RC</div>
                        <div>
                            <div class="employee-name">Roberto Costa</div>
                            <div class="employee-roles">Caixa</div>
                        </div>
                    </div>
                </td>
                <td class="text-muted">roberto.costa@restaurante.com</td>
                <td><span class="nivel-badge nivel-caixa"><span class="nivel-dot"></span>Caixa</span></td>
                <td><div class="table-actions">
                    <a href="#" class="link-action" onclick="editarFuncionario('f3'); return false;">Editar</a>
                    <a href="#" class="link-action link-danger" onclick="excluirFuncionario('f3'); return false;">Excluir</a>
                </div></td>
            </tr>
            <tr data-id="f4">
                <td>
                    <div class="employee-row-name">
                        <div class="employee-avatar avatar-garcom">JS</div>
                        <div>
                            <div class="employee-name">Juliana Santos</div>
                            <div class="employee-roles">Garçom</div>
                        </div>
                    </div>
                </td>
                <td class="text-muted">juliana.santos@restaurante.com</td>
                <td><span class="nivel-badge nivel-garcom"><span class="nivel-dot"></span>Garçom</span></td>
                <td><div class="table-actions">
                    <a href="#" class="link-action" onclick="editarFuncionario('f4'); return false;">Editar</a>
                    <a href="#" class="link-action link-danger" onclick="excluirFuncionario('f4'); return false;">Excluir</a>
                </div></td>
            </tr>
        </tbody>
    </table>
</div>

{{-- Modal de funcionário --}}
<div class="modal-overlay" id="modal-func" style="display:none;">
    <div class="modal modal-produto-sm" style="max-width:600px;">
        <div class="modal-header">
            <h2 class="modal-title" id="modal-titulo-func">Novo Funcionário</h2>
            <button class="modal-close" onclick="fecharModalFunc()">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
            </button>
        </div>

        <form id="form-funcionario" onsubmit="return handleSubmitFuncionario()">
            @csrf
            <input type="hidden" id="editing-func-id" value="">

            <div class="modal-form-body">
                <div class="form-row" style="grid-template-columns: 1fr 1fr;">
                    <div class="form-group" style="grid-column: span 2;">
                        <label class="form-label" for="employee-name">Nome Completo</label>
                        <input type="text" id="employee-name" class="form-input" placeholder="Ex: João da Silva" required>
                    </div>
                    <div class="form-group" style="grid-column: span 2;">
                        <label class="form-label" for="employee-email">E-mail</label>
                        <input type="email" id="employee-email" class="form-input" placeholder="joao.silva@restaurante.com" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="employee-role">Cargo</label>
                        <select id="employee-role" class="form-select" required>
                            <option value="">Selecione um cargo</option>
                            <option value="administrador">Administrador</option>
                            <option value="gerente">Gerente</option>
                            <option value="garcom">Garçom</option>
                            <option value="caixa">Caixa</option>
                            <option value="cozinheiro">Cozinheiro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="employee-password">
                            Senha
                            <span id="senha-hint" style="display:none; font-weight:400; color:var(--text-muted);"> (deixe em branco para manter)</span>
                        </label>
                        <input type="password" id="employee-password" class="form-input" placeholder="Mínimo 8 caracteres">
                    </div>
                    <div class="form-group" style="grid-column: span 2; margin-bottom:0;">
                        <label class="form-label">Permissões do Sistema</label>
                        <div class="permissions-grid">
                            <label class="checkbox-group"><input type="checkbox" id="perm-comandas" class="checkbox-input"><span class="checkbox-label">Gerenciar Comandas</span></label>
                            <label class="checkbox-group"><input type="checkbox" id="perm-produtos" class="checkbox-input"><span class="checkbox-label">Gerenciar Produtos</span></label>
                            <label class="checkbox-group"><input type="checkbox" id="perm-funcionarios" class="checkbox-input"><span class="checkbox-label">Gerenciar Funcionários</span></label>
                            <label class="checkbox-group"><input type="checkbox" id="perm-historico" class="checkbox-input"><span class="checkbox-label">Visualizar Histórico</span></label>
                            <label class="checkbox-group"><input type="checkbox" id="perm-relatorios" class="checkbox-input"><span class="checkbox-label">Gerar Relatórios</span></label>
                            <label class="checkbox-group"><input type="checkbox" id="perm-financeiro" class="checkbox-input"><span class="checkbox-label">Acesso Financeiro</span></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div></div>
                <div class="flex gap-16">
                    <button type="button" class="btn btn-secondary" onclick="fecharModalFunc()">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="btn-submit-func">Cadastrar Funcionário</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const cargoLabel = {
        administrador: 'Administrador',
        gerente:       'Gerente',
        garcom:        'Garçom',
        caixa:         'Caixa',
        cozinheiro:    'Cozinheiro',
    };
    const cargoCss = {
        administrador: 'nivel-administrador',
        gerente:       'nivel-gerente',
        garcom:        'nivel-garcom',
        caixa:         'nivel-caixa',
        cozinheiro:    'nivel-cozinheiro',
    };
    const avatarCargoCss = {
        administrador: 'avatar-administrador',
        gerente:       'avatar-gerente',
        garcom:        'avatar-garcom',
        caixa:         'avatar-caixa',
        cozinheiro:    'avatar-cozinheiro',
    };
    const permsDisponiveis = ['comandas','produtos','funcionarios','historico','relatorios','financeiro'];

    const funcionarios = {
        f1: { nome: 'Carlos Silva',   email: 'carlos.silva@restaurante.com',   cargo: 'administrador', perms: ['comandas','produtos','funcionarios','historico','relatorios','financeiro'] },
        f2: { nome: 'Ana Ferreira',   email: 'ana.ferreira@restaurante.com',   cargo: 'garcom',        perms: ['comandas'] },
        f3: { nome: 'Roberto Costa',  email: 'roberto.costa@restaurante.com',  cargo: 'caixa',         perms: ['historico','financeiro'] },
        f4: { nome: 'Juliana Santos', email: 'juliana.santos@restaurante.com', cargo: 'garcom',        perms: ['comandas'] },
    };
    let funcCounter = 5;

    function initials(nome) {
        const parts = nome.trim().split(' ');
        return (parts[0][0] + (parts[1] ? parts[1][0] : parts[0][1])).toUpperCase();
    }

    function rolesSecundarios(cargo, perms) {
        const partes = [cargoLabel[cargo]];
        if (cargo !== 'garcom' && perms.includes('comandas'))   partes.push('Garçom');
        if (cargo !== 'caixa' && perms.includes('financeiro'))  partes.push('Caixa');
        return partes.join(' · ');
    }

    function atualizarContador() {
        const total = document.querySelectorAll('#tabela-funcionarios tbody tr').length;
        document.getElementById('func-count').textContent =
            total + ' funcionário' + (total !== 1 ? 's' : '') + ' cadastrado' + (total !== 1 ? 's' : '');
    }

    // ── modal ────────────────────────────────────────────────────────────
    function abrirModalFunc() {
        document.getElementById('editing-func-id').value = '';
        document.getElementById('form-funcionario').reset();
        document.getElementById('employee-password').required = true;
        document.getElementById('modal-titulo-func').textContent = 'Novo Funcionário';
        document.getElementById('btn-submit-func').textContent   = 'Cadastrar Funcionário';
        document.getElementById('senha-hint').style.display      = 'none';
        document.getElementById('modal-func').style.display = 'flex';
    }

    function fecharModalFunc() {
        document.getElementById('modal-func').style.display = 'none';
        document.getElementById('editing-func-id').value = '';
        document.getElementById('form-funcionario').reset();
        document.getElementById('employee-password').required = true;
        document.getElementById('senha-hint').style.display = 'none';
    }

    function editarFuncionario(id) {
        const f = funcionarios[id];
        document.getElementById('editing-func-id').value      = id;
        document.getElementById('employee-name').value        = f.nome;
        document.getElementById('employee-email').value       = f.email;
        document.getElementById('employee-role').value        = f.cargo;
        document.getElementById('employee-password').value    = '';
        document.getElementById('employee-password').required = false;
        permsDisponiveis.forEach(p => {
            document.getElementById('perm-' + p).checked = f.perms.includes(p);
        });
        document.getElementById('modal-titulo-func').textContent = 'Editar Funcionário';
        document.getElementById('btn-submit-func').textContent   = 'Salvar Alterações';
        document.getElementById('senha-hint').style.display      = '';
        document.getElementById('modal-func').style.display = 'flex';
    }

    function handleSubmitFuncionario() {
        const id    = document.getElementById('editing-func-id').value;
        const nome  = document.getElementById('employee-name').value.trim();
        const email = document.getElementById('employee-email').value.trim();
        const cargo = document.getElementById('employee-role').value;
        const perms = permsDisponiveis.filter(p => document.getElementById('perm-' + p).checked);
        const ini   = initials(nome);
        const avCss = avatarCargoCss[cargo] || 'avatar-garcom';
        const nvCss = cargoCss[cargo] || 'nivel-garcom';
        const label = cargoLabel[cargo] || cargo;
        const roles = rolesSecundarios(cargo, perms);
        const isAdmin = cargo === 'administrador';

        if (id) {
            funcionarios[id] = { ...funcionarios[id], nome, email, cargo, perms };
            const tr = document.querySelector(`#tabela-funcionarios tr[data-id="${id}"]`);
            tr.cells[0].innerHTML = `
                <div class="employee-row-name">
                    <div class="employee-avatar ${avCss}">${ini}</div>
                    <div>
                        <div class="employee-name">${nome}</div>
                        <div class="employee-roles">${roles}</div>
                    </div>
                </div>`;
            tr.cells[1].innerHTML = `<span class="text-muted">${email}</span>`;
            tr.cells[2].innerHTML = `<span class="nivel-badge ${nvCss}"><span class="nivel-dot"></span>${label}</span>`;
            const excluirBtn = tr.querySelector('.link-danger');
            excluirBtn.style.opacity       = isAdmin ? '0.3' : '';
            excluirBtn.style.pointerEvents = isAdmin ? 'none' : '';
            excluirBtn.style.cursor        = isAdmin ? 'not-allowed' : '';
            excluirBtn.title               = isAdmin ? 'Administradores não podem ser excluídos' : '';
        } else {
            const novoId = 'f' + funcCounter++;
            funcionarios[novoId] = { nome, email, cargo, perms };
            const tr = document.createElement('tr');
            tr.dataset.id = novoId;
            tr.innerHTML = `
                <td>
                    <div class="employee-row-name">
                        <div class="employee-avatar ${avCss}">${ini}</div>
                        <div>
                            <div class="employee-name">${nome}</div>
                            <div class="employee-roles">${roles}</div>
                        </div>
                    </div>
                </td>
                <td class="text-muted">${email}</td>
                <td><span class="nivel-badge ${nvCss}"><span class="nivel-dot"></span>${label}</span></td>
                <td><div class="table-actions">
                    <a href="#" class="link-action" onclick="editarFuncionario('${novoId}'); return false;">Editar</a>
                    <a href="#" class="link-action link-danger"
                        ${isAdmin ? 'style="opacity:0.3;pointer-events:none;cursor:not-allowed;" title="Administradores não podem ser excluídos"' : ''}
                        onclick="excluirFuncionario('${novoId}'); return false;">Excluir</a>
                </div></td>`;
            document.querySelector('#tabela-funcionarios tbody').appendChild(tr);
            atualizarContador();
        }

        fecharModalFunc();
        return false;
    }

    function excluirFuncionario(id) {
        const f = funcionarios[id];
        if (f.cargo === 'administrador') {
            alert(`"${f.nome}" é Administrador e não pode ser excluído.`);
            return;
        }
        if (!confirm(`Excluir "${f.nome}"? Esta ação não pode ser desfeita.`)) return;
        document.querySelector(`#tabela-funcionarios tr[data-id="${id}"]`).remove();
        delete funcionarios[id];
        atualizarContador();
    }

    // fecha ao clicar fora
    document.getElementById('modal-func').addEventListener('click', function(e) {
        if (e.target === this) fecharModalFunc();
    });

    document.addEventListener('DOMContentLoaded', atualizarContador);
</script>
@endsection
