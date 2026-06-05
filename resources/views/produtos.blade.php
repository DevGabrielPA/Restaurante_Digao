@extends('layout')

@section('conteudo')
<div class="page-header">
    <div>
        <h1 class="page-title">Produtos</h1>
        <p class="page-subtitle" id="produto-count"></p>
    </div>
    <button class="btn btn-primary" onclick="abrirModalProduto()">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
        Novo Produto
    </button>
</div>

{{-- Busca + filtros --}}
<div class="search-filter-bar mb-24">
    <input type="text" id="search-produto" class="form-input search-input" placeholder="Buscar produto..." oninput="filtrarProdutos()">
    <div class="filter-chip-tabs" id="filter-tabs">
        <button class="filter-chip-tab active" data-cat="" onclick="setFiltroCategoria('', this)">Todos</button>
        <button class="filter-chip-tab" data-cat="bebidas" onclick="setFiltroCategoria('bebidas', this)">Bebidas</button>
        <button class="filter-chip-tab" data-cat="pratos-principais" onclick="setFiltroCategoria('pratos-principais', this)">Pratos</button>
        <button class="filter-chip-tab" data-cat="sobremesas" onclick="setFiltroCategoria('sobremesas', this)">Sobremesas</button>
        <button class="filter-chip-tab" data-cat="entradas" onclick="setFiltroCategoria('entradas', this)">Entradas</button>
    </div>
</div>

{{-- Tabela --}}
<div class="table-container">
    <table class="table" id="tabela-produtos">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr data-id="p1" data-cat="pratos-principais" data-nome="filé mignon ao molho madeira">
                <td><div class="product-row-name"><div class="product-avatar avatar-pratos">FI</div>Filé Mignon ao Molho Madeira</div></td>
                <td><span class="cat-badge cat-pratos">Pratos Principais</span></td>
                <td><span class="price-currency">R$</span> <span class="price-amount">78,90</span></td>
                <td><span class="stock-value">24</span><span class="stock-unit"> un</span></td>
                <td><div class="table-actions">
                    <a href="#" class="link-action" onclick="editarProduto('p1'); return false;">Editar</a>
                    <a href="#" class="link-action link-danger" onclick="excluirProduto('p1'); return false;">Excluir</a>
                </div></td>
            </tr>
            <tr data-id="p2" data-cat="pratos-principais" data-nome="salmão grelhado com legumes">
                <td><div class="product-row-name"><div class="product-avatar avatar-pratos">SA</div>Salmão Grelhado com Legumes</div></td>
                <td><span class="cat-badge cat-pratos">Pratos Principais</span></td>
                <td><span class="price-currency">R$</span> <span class="price-amount">65,50</span></td>
                <td><span class="stock-value">18</span><span class="stock-unit"> un</span></td>
                <td><div class="table-actions">
                    <a href="#" class="link-action" onclick="editarProduto('p2'); return false;">Editar</a>
                    <a href="#" class="link-action link-danger" onclick="excluirProduto('p2'); return false;">Excluir</a>
                </div></td>
            </tr>
            <tr data-id="p3" data-cat="pratos-principais" data-nome="risoto de cogumelos">
                <td><div class="product-row-name"><div class="product-avatar avatar-pratos">RI</div>Risoto de Cogumelos</div></td>
                <td><span class="cat-badge cat-pratos">Pratos Principais</span></td>
                <td><span class="price-currency">R$</span> <span class="price-amount">52,00</span></td>
                <td><span class="stock-value">32</span><span class="stock-unit"> un</span></td>
                <td><div class="table-actions">
                    <a href="#" class="link-action" onclick="editarProduto('p3'); return false;">Editar</a>
                    <a href="#" class="link-action link-danger" onclick="excluirProduto('p3'); return false;">Excluir</a>
                </div></td>
            </tr>
            <tr data-id="p4" data-cat="bebidas" data-nome="água mineral 500ml">
                <td><div class="product-row-name"><div class="product-avatar avatar-bebidas">AG</div>Água Mineral 500ml</div></td>
                <td><span class="cat-badge cat-bebidas">Bebidas</span></td>
                <td><span class="price-currency">R$</span> <span class="price-amount">6,00</span></td>
                <td><span class="stock-value">156</span><span class="stock-unit"> un</span></td>
                <td><div class="table-actions">
                    <a href="#" class="link-action" onclick="editarProduto('p4'); return false;">Editar</a>
                    <a href="#" class="link-action link-danger" onclick="excluirProduto('p4'); return false;">Excluir</a>
                </div></td>
            </tr>
            <tr data-id="p5" data-cat="bebidas" data-nome="refrigerante lata">
                <td><div class="product-row-name"><div class="product-avatar avatar-bebidas">RE</div>Refrigerante Lata</div></td>
                <td><span class="cat-badge cat-bebidas">Bebidas</span></td>
                <td><span class="price-currency">R$</span> <span class="price-amount">8,50</span></td>
                <td><span class="stock-value">89</span><span class="stock-unit"> un</span></td>
                <td><div class="table-actions">
                    <a href="#" class="link-action" onclick="editarProduto('p5'); return false;">Editar</a>
                    <a href="#" class="link-action link-danger" onclick="excluirProduto('p5'); return false;">Excluir</a>
                </div></td>
            </tr>
            <tr data-id="p6" data-cat="bebidas" data-nome="vinho tinto taça">
                <td><div class="product-row-name"><div class="product-avatar avatar-bebidas">VI</div>Vinho Tinto Taça</div></td>
                <td><span class="cat-badge cat-bebidas">Bebidas</span></td>
                <td><span class="price-currency">R$</span> <span class="price-amount">18,00</span></td>
                <td><span class="stock-value">45</span><span class="stock-unit"> un</span></td>
                <td><div class="table-actions">
                    <a href="#" class="link-action" onclick="editarProduto('p6'); return false;">Editar</a>
                    <a href="#" class="link-action link-danger" onclick="excluirProduto('p6'); return false;">Excluir</a>
                </div></td>
            </tr>
            <tr data-id="p7" data-cat="sobremesas" data-nome="petit gateau">
                <td><div class="product-row-name"><div class="product-avatar avatar-sobremesas">PE</div>Petit Gateau</div></td>
                <td><span class="cat-badge cat-sobremesas">Sobremesas</span></td>
                <td><span class="price-currency">R$</span> <span class="price-amount">22,00</span></td>
                <td><span class="stock-value">28</span><span class="stock-unit"> un</span></td>
                <td><div class="table-actions">
                    <a href="#" class="link-action" onclick="editarProduto('p7'); return false;">Editar</a>
                    <a href="#" class="link-action link-danger" onclick="excluirProduto('p7'); return false;">Excluir</a>
                </div></td>
            </tr>
            <tr data-id="p8" data-cat="sobremesas" data-nome="torta de limão">
                <td><div class="product-row-name"><div class="product-avatar avatar-sobremesas">TO</div>Torta de Limão</div></td>
                <td><span class="cat-badge cat-sobremesas">Sobremesas</span></td>
                <td><span class="price-currency">R$</span> <span class="price-amount">16,50</span></td>
                <td><span class="stock-value">15</span><span class="stock-unit"> un</span></td>
                <td><div class="table-actions">
                    <a href="#" class="link-action" onclick="editarProduto('p8'); return false;">Editar</a>
                    <a href="#" class="link-action link-danger" onclick="excluirProduto('p8'); return false;">Excluir</a>
                </div></td>
            </tr>
        </tbody>
    </table>
</div>

{{-- Modal de produto --}}
<div class="modal-overlay" id="modal-produto" style="display:none;">
    <div class="modal modal-produto-sm">
        <div class="modal-header">
            <h2 class="modal-title" id="modal-titulo-produto">Novo Produto</h2>
            <button class="modal-close" onclick="fecharModalProduto()">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
            </button>
        </div>

        <form id="form-produto" onsubmit="return handleSubmitProduto()">
            @csrf
            <input type="hidden" id="editing-produto-id" value="">

            <div class="modal-form-body">
                <div class="form-row">
                    <div class="form-group" style="grid-column: span 2;">
                        <label class="form-label" for="product-name">Nome do Produto</label>
                        <input type="text" id="product-name" class="form-input" placeholder="Ex: Filé Mignon ao Molho Madeira" required>
                    </div>
                    <div class="form-group" style="grid-column: span 2;">
                        <label class="form-label" for="product-category">Categoria</label>
                        <select id="product-category" class="form-select" required>
                            <option value="">Selecione uma categoria</option>
                            <option value="entradas">Entradas</option>
                            <option value="pratos-principais">Pratos Principais</option>
                            <option value="bebidas">Bebidas</option>
                            <option value="sobremesas">Sobremesas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="product-price">Preço de Venda (R$)</label>
                        <input type="number" id="product-price" class="form-input" placeholder="0,00" step="0.01" min="0" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="product-stock">Qtd. em Estoque</label>
                        <input type="number" id="product-stock" class="form-input" placeholder="0" min="0" required>
                    </div>
                    <div class="form-group" style="grid-column: span 2;">
                        <label class="form-label" for="product-description">Descrição (opcional)</label>
                        <input type="text" id="product-description" class="form-input" placeholder="Breve descrição do produto">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div></div>
                <div class="flex gap-16">
                    <button type="button" class="btn btn-secondary" onclick="fecharModalProduto()">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="btn-submit-produto">Cadastrar Produto</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const categoriaLabel = {
        'entradas':          'Entradas',
        'pratos-principais': 'Pratos Principais',
        'bebidas':           'Bebidas',
        'sobremesas':        'Sobremesas',
    };
    const categoriaCss = {
        'entradas':          'cat-entradas',
        'pratos-principais': 'cat-pratos',
        'bebidas':           'cat-bebidas',
        'sobremesas':        'cat-sobremesas',
    };
    const avatarCss = {
        'entradas':          'avatar-entradas',
        'pratos-principais': 'avatar-pratos',
        'bebidas':           'avatar-bebidas',
        'sobremesas':        'avatar-sobremesas',
    };

    const produtos = {
        p1: { nome: 'Filé Mignon ao Molho Madeira', categoria: 'pratos-principais', preco: 78.90, estoque: 24,  descricao: '' },
        p2: { nome: 'Salmão Grelhado com Legumes',  categoria: 'pratos-principais', preco: 65.50, estoque: 18,  descricao: '' },
        p3: { nome: 'Risoto de Cogumelos',           categoria: 'pratos-principais', preco: 52.00, estoque: 32,  descricao: '' },
        p4: { nome: 'Água Mineral 500ml',             categoria: 'bebidas',           preco: 6.00,  estoque: 156, descricao: '' },
        p5: { nome: 'Refrigerante Lata',              categoria: 'bebidas',           preco: 8.50,  estoque: 89,  descricao: '' },
        p6: { nome: 'Vinho Tinto Taça',               categoria: 'bebidas',           preco: 18.00, estoque: 45,  descricao: '' },
        p7: { nome: 'Petit Gateau',                   categoria: 'sobremesas',        preco: 22.00, estoque: 28,  descricao: '' },
        p8: { nome: 'Torta de Limão',                 categoria: 'sobremesas',        preco: 16.50, estoque: 15,  descricao: '' },
    };
    let produtoCounter = 9;
    let filtroCategoria = '';

    function initials(nome) {
        return nome.normalize('NFD').replace(/[̀-ͯ]/g, '').substring(0, 2).toUpperCase();
    }

    function atualizarContador() {
        const total = document.querySelectorAll('#tabela-produtos tbody tr').length;
        document.getElementById('produto-count').textContent =
            total + ' produto' + (total !== 1 ? 's' : '') + ' cadastrado' + (total !== 1 ? 's' : '');
    }

    // ── modal ────────────────────────────────────────────────────────────
    function abrirModalProduto() {
        document.getElementById('editing-produto-id').value = '';
        document.getElementById('form-produto').reset();
        document.getElementById('modal-titulo-produto').textContent = 'Novo Produto';
        document.getElementById('btn-submit-produto').textContent   = 'Cadastrar Produto';
        document.getElementById('modal-produto').style.display = 'flex';
    }

    function fecharModalProduto() {
        document.getElementById('modal-produto').style.display = 'none';
        document.getElementById('editing-produto-id').value = '';
        document.getElementById('form-produto').reset();
    }

    function editarProduto(id) {
        const p = produtos[id];
        document.getElementById('editing-produto-id').value  = id;
        document.getElementById('product-name').value        = p.nome;
        document.getElementById('product-category').value    = p.categoria;
        document.getElementById('product-price').value       = p.preco;
        document.getElementById('product-stock').value       = p.estoque;
        document.getElementById('product-description').value = p.descricao;
        document.getElementById('modal-titulo-produto').textContent = 'Editar Produto';
        document.getElementById('btn-submit-produto').textContent   = 'Salvar Alterações';
        document.getElementById('modal-produto').style.display = 'flex';
    }

    function handleSubmitProduto() {
        const id        = document.getElementById('editing-produto-id').value;
        const nome      = document.getElementById('product-name').value.trim();
        const categoria = document.getElementById('product-category').value;
        const preco     = parseFloat(document.getElementById('product-price').value);
        const estoque   = parseInt(document.getElementById('product-stock').value);
        const descricao = document.getElementById('product-description').value.trim();
        const precoFmt  = preco.toFixed(2).replace('.', ',');
        const ini       = initials(nome);
        const avCss     = avatarCss[categoria] || 'avatar-pratos';
        const catCss    = categoriaCss[categoria] || 'cat-pratos';
        const catLabel  = categoriaLabel[categoria] || categoria;

        if (id) {
            produtos[id] = { nome, categoria, preco, estoque, descricao };
            const tr = document.querySelector(`#tabela-produtos tr[data-id="${id}"]`);
            tr.dataset.cat  = categoria;
            tr.dataset.nome = nome.toLowerCase();
            tr.cells[0].innerHTML = `<div class="product-row-name"><div class="product-avatar ${avCss}">${ini}</div>${nome}</div>`;
            tr.cells[1].innerHTML = `<span class="cat-badge ${catCss}">${catLabel}</span>`;
            tr.cells[2].innerHTML = `<span class="price-currency">R$</span> <span class="price-amount">${precoFmt}</span>`;
            tr.cells[3].innerHTML = `<span class="stock-value">${estoque}</span><span class="stock-unit"> un</span>`;
        } else {
            const novoId = 'p' + produtoCounter++;
            produtos[novoId] = { nome, categoria, preco, estoque, descricao };
            const tr = document.createElement('tr');
            tr.dataset.id   = novoId;
            tr.dataset.cat  = categoria;
            tr.dataset.nome = nome.toLowerCase();
            tr.innerHTML = `
                <td><div class="product-row-name"><div class="product-avatar ${avCss}">${ini}</div>${nome}</div></td>
                <td><span class="cat-badge ${catCss}">${catLabel}</span></td>
                <td><span class="price-currency">R$</span> <span class="price-amount">${precoFmt}</span></td>
                <td><span class="stock-value">${estoque}</span><span class="stock-unit"> un</span></td>
                <td><div class="table-actions">
                    <a href="#" class="link-action" onclick="editarProduto('${novoId}'); return false;">Editar</a>
                    <a href="#" class="link-action link-danger" onclick="excluirProduto('${novoId}'); return false;">Excluir</a>
                </div></td>
            `;
            document.querySelector('#tabela-produtos tbody').appendChild(tr);
            atualizarContador();
        }

        fecharModalProduto();
        filtrarProdutos();
        return false;
    }

    function excluirProduto(id) {
        if (!confirm(`Excluir "${produtos[id].nome}"? Esta ação não pode ser desfeita.`)) return;
        document.querySelector(`#tabela-produtos tr[data-id="${id}"]`).remove();
        delete produtos[id];
        atualizarContador();
    }

    // ── busca + filtro ──────────────────────────────────────────────────
    function setFiltroCategoria(cat, el) {
        filtroCategoria = cat;
        document.querySelectorAll('.filter-chip-tab').forEach(b => b.classList.remove('active'));
        el.classList.add('active');
        filtrarProdutos();
    }

    function filtrarProdutos() {
        const busca = document.getElementById('search-produto').value.toLowerCase().trim();
        document.querySelectorAll('#tabela-produtos tbody tr').forEach(tr => {
            const nomeMatch = !busca || tr.dataset.nome.includes(busca);
            const catMatch  = !filtroCategoria || tr.dataset.cat === filtroCategoria;
            tr.style.display = (nomeMatch && catMatch) ? '' : 'none';
        });
    }

    // fecha ao clicar fora do modal
    document.getElementById('modal-produto').addEventListener('click', function(e) {
        if (e.target === this) fecharModalProduto();
    });

    document.addEventListener('DOMContentLoaded', atualizarContador);
</script>
@endsection
