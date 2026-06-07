@extends('layout')

@section('conteudo')
<div class="page-header">
    <h1 class="page-title">Comandas</h1>
    <button class="btn btn-primary" onclick="abrirNovaComanda()">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
        </svg>
        Abrir Nova Comanda
    </button>
</div>

<div class="tabs">
    <button class="tab active" onclick="filterTabs('todas', this)">Todas</button>
    <button class="tab" onclick="filterTabs('presencial', this)">Presencial</button>
    <button class="tab" onclick="filterTabs('entrega', this)">Entrega</button>
</div>

<div class="cards-grid" id="cards-grid">
    <div class="card" data-type="presencial" data-id="c1">
        <div class="card-header">
            <div class="card-title">Mesa 05</div>
            <span class="badge badge-presencial">Presencial</span>
        </div>
        <div class="card-value">R$ 185,40</div>
        <select class="status-select status-em-preparo" onchange="atualizarStatus('c1', this)">
            <option value="em-preparo">Em Preparo</option>
            <option value="completa">Completa</option>
        </select>
        <div class="card-actions">
            <a href="#" class="link-action" onclick="editarComanda('c1'); return false;">Editar</a>
            <a href="#" class="link-action link-danger" onclick="excluirComanda('c1'); return false;">Excluir</a>
        </div>
    </div>

    <div class="card" data-type="entrega" data-id="c2">
        <div class="card-header">
            <div class="card-title">Pedido #1247</div>
            <span class="badge badge-entrega">Entrega</span>
        </div>
        <div class="card-value">R$ 92,50</div>
        <select class="status-select status-em-preparo" onchange="atualizarStatus('c2', this)">
            <option value="em-preparo">Em Preparo</option>
            <option value="em-rota">Em Rota</option>
            <option value="completa">Completa</option>
        </select>
        <div class="card-actions">
            <a href="#" class="link-action" onclick="editarComanda('c2'); return false;">Editar</a>
            <a href="#" class="link-action link-danger" onclick="excluirComanda('c2'); return false;">Excluir</a>
        </div>
    </div>

    <div class="card" data-type="presencial" data-id="c3">
        <div class="card-header">
            <div class="card-title">Mesa 12</div>
            <span class="badge badge-presencial">Presencial</span>
        </div>
        <div class="card-value">R$ 234,80</div>
        <select class="status-select status-em-preparo" onchange="atualizarStatus('c3', this)">
            <option value="em-preparo">Em Preparo</option>
            <option value="completa">Completa</option>
        </select>
        <div class="card-actions">
            <a href="#" class="link-action" onclick="editarComanda('c3'); return false;">Editar</a>
            <a href="#" class="link-action link-danger" onclick="excluirComanda('c3'); return false;">Excluir</a>
        </div>
    </div>

    <div class="card" data-type="entrega" data-id="c4">
        <div class="card-header">
            <div class="card-title">Pedido #1248</div>
            <span class="badge badge-entrega">Entrega</span>
        </div>
        <div class="card-value">R$ 157,90</div>
        <select class="status-select status-em-preparo" onchange="atualizarStatus('c4', this)">
            <option value="em-preparo">Em Preparo</option>
            <option value="em-rota">Em Rota</option>
            <option value="completa">Completa</option>
        </select>
        <div class="card-actions">
            <a href="#" class="link-action" onclick="editarComanda('c4'); return false;">Editar</a>
            <a href="#" class="link-action link-danger" onclick="excluirComanda('c4'); return false;">Excluir</a>
        </div>
    </div>

    <div class="card" data-type="presencial" data-id="c5">
        <div class="card-header">
            <div class="card-title">Mesa 03</div>
            <span class="badge badge-presencial">Presencial</span>
        </div>
        <div class="card-value">R$ 68,70</div>
        <select class="status-select status-em-preparo" onchange="atualizarStatus('c5', this)">
            <option value="em-preparo">Em Preparo</option>
            <option value="completa">Completa</option>
        </select>
        <div class="card-actions">
            <a href="#" class="link-action" onclick="editarComanda('c5'); return false;">Editar</a>
            <a href="#" class="link-action link-danger" onclick="excluirComanda('c5'); return false;">Excluir</a>
        </div>
    </div>

    <div class="card" data-type="presencial" data-id="c6">
        <div class="card-header">
            <div class="card-title">Mesa 08</div>
            <span class="badge badge-presencial">Presencial</span>
        </div>
        <div class="card-value">R$ 312,00</div>
        <select class="status-select status-em-preparo" onchange="atualizarStatus('c6', this)">
            <option value="em-preparo">Em Preparo</option>
            <option value="completa">Completa</option>
        </select>
        <div class="card-actions">
            <a href="#" class="link-action" onclick="editarComanda('c6'); return false;">Editar</a>
            <a href="#" class="link-action link-danger" onclick="excluirComanda('c6'); return false;">Excluir</a>
        </div>
    </div>
</div>

@include('modal-comanda')

<script>
    // ── store de comandas ───────────────────────────────────────────────
    const comandas = {
        c1: { titulo: 'Mesa 05',      tipo: 'presencial', identificador: '05',     endereco: '', cart: {}, status: 'em-preparo' },
        c2: { titulo: 'Pedido #1247', tipo: 'entrega',    identificador: 'Cliente', endereco: 'Rua das Flores, 245 - Apto 302', cart: {}, status: 'em-preparo' },
        c3: { titulo: 'Mesa 12',      tipo: 'presencial', identificador: '12',     endereco: '', cart: {}, status: 'em-preparo' },
        c4: { titulo: 'Pedido #1248', tipo: 'entrega',    identificador: 'Cliente', endereco: '', cart: {}, status: 'em-preparo' },
        c5: { titulo: 'Mesa 03',      tipo: 'presencial', identificador: '03',     endereco: '', cart: {}, status: 'em-preparo' },
        c6: { titulo: 'Mesa 08',      tipo: 'presencial', identificador: '08',     endereco: '', cart: {}, status: 'em-preparo' },
    };

    let cart       = {};
    let tipoAtual  = 'presencial';
    let editingId  = null;       // null = nova comanda | string = editar existente
    let idCounter  = 7;
    let pedidoCounter = 1249;

    // ── persistência de status no localStorage ──────────────────────────
    const STATUS_KEY = 'rdigao_comandas_status';

    function syncStatusStorage() {
        const map = {};
        Object.keys(comandas).forEach(id => { map[id] = comandas[id].status; });
        localStorage.setItem(STATUS_KEY, JSON.stringify(map));
    }

    (function restaurarStatus() {
        const saved = JSON.parse(localStorage.getItem(STATUS_KEY) || '{}');
        document.querySelectorAll('.cards-grid .card[data-id]').forEach(card => {
            const id = card.dataset.id;
            const status = saved[id];
            if (!status) return;
            if (status === 'completa' || status === 'excluido') {
                card.remove();
                delete comandas[id];
                return;
            }
            comandas[id].status = status;
            const sel = card.querySelector('.status-select');
            if (sel) {
                sel.value = status;
                sel.className = 'status-select status-' + status;
            }
        });
    })();

    // ── tabs ────────────────────────────────────────────────────────────
    function filterTabs(type, element) {
        document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
        element.classList.add('active');
        document.querySelectorAll('.cards-grid .card').forEach(card => {
            card.style.display = (type === 'todas' || card.dataset.type === type) ? '' : 'none';
        });
    }

    // ── abrir modal ─────────────────────────────────────────────────────
    function abrirNovaComanda() {
        editingId = null;
        resetModal();
        document.getElementById('modal-titulo').textContent = 'Nova Comanda';
        document.getElementById('btn-salvar').textContent   = 'Criar Comanda';
        document.getElementById('modal-comanda').style.display = 'flex';
    }

    function editarComanda(id) {
        editingId = id;
        const c = comandas[id];
        resetModal(false);                      // limpa sem fechar
        setTipo(c.tipo);
        document.getElementById('input-identificador').value = c.identificador;
        document.getElementById('input-endereco').value      = c.endereco || '';
        cart = JSON.parse(JSON.stringify(c.cart)); // cópia profunda
        renderCart();
        document.getElementById('modal-titulo').textContent = `Editando: ${c.titulo}`;
        document.getElementById('btn-salvar').textContent   = 'Salvar Alterações';
        document.getElementById('modal-comanda').style.display = 'flex';
    }

    function fecharModal() {
        document.getElementById('modal-comanda').style.display = 'none';
    }

    function resetModal(fechar = true) {
        cart     = {};
        tipoAtual = 'presencial';
        document.getElementById('input-identificador').value = '';
        document.getElementById('input-endereco').value      = '';
        document.getElementById('custom-nome').value         = '';
        document.getElementById('custom-preco').value        = '';
        document.getElementById('custom-peso').value         = '';
        document.getElementById('custom-item-fields').style.display = 'none';
        setTipo('presencial');
        renderCart();
        if (fechar) fecharModal();
    }

    // ── tipo presencial / online ────────────────────────────────────────
    function setTipo(tipo) {
        tipoAtual = tipo;
        document.getElementById('btn-presencial').classList.toggle('active', tipo === 'presencial');
        document.getElementById('btn-entrega').classList.toggle('active',     tipo === 'entrega');
        document.getElementById('label-identificador').textContent         = tipo === 'presencial' ? 'Número da Mesa' : 'Nome do Cliente';
        document.getElementById('input-identificador').placeholder        = tipo === 'presencial' ? 'Ex: 05' : 'Ex: João Silva';
        document.getElementById('group-endereco').style.display            = tipo === 'entrega' ? '' : 'none';
        document.getElementById('logistics-section').style.display         = tipo === 'entrega' ? '' : 'none';
    }

    // ── item personalizado ──────────────────────────────────────────────
    function toggleCustomForm() {
        const f = document.getElementById('custom-item-fields');
        f.style.display = f.style.display === 'none' ? '' : 'none';
    }

    function addCustomItem() {
        const nome  = document.getElementById('custom-nome').value.trim();
        const preco = parseFloat(document.getElementById('custom-preco').value);
        const peso  = document.getElementById('custom-peso').value.trim();
        if (!nome)                       { alert('Informe o nome do item.');  return; }
        if (isNaN(preco) || preco <= 0)  { alert('Informe um preço válido.'); return; }
        addToCart(peso ? `${nome} (${peso})` : nome, preco);
        document.getElementById('custom-nome').value  = '';
        document.getElementById('custom-preco').value = '';
        document.getElementById('custom-peso').value  = '';
        document.getElementById('custom-item-fields').style.display = 'none';
    }

    // ── filtro de produtos ──────────────────────────────────────────────
    function filterProdutos(categoria, el) {
        document.querySelectorAll('.product-filters .filter-chip').forEach(c => c.classList.remove('active'));
        el.classList.add('active');
        document.querySelectorAll('#product-list .product-item').forEach(item => {
            item.style.display = (categoria === 'Todos' || item.dataset.categoria === categoria) ? '' : 'none';
        });
    }

    // ── carrinho ────────────────────────────────────────────────────────
    function addToCart(nome, preco) {
        cart[nome] ? cart[nome].qty++ : (cart[nome] = { preco, qty: 1 });
        renderCart();
    }

    function changeQty(nome, delta) {
        if (!cart[nome]) return;
        cart[nome].qty += delta;
        if (cart[nome].qty <= 0) delete cart[nome];
        renderCart();
    }

    function removeItem(nome) {
        delete cart[nome];
        renderCart();
    }

    function renderCart() {
        const tbody    = document.getElementById('cart-body');
        const emptyRow = document.getElementById('cart-empty');
        tbody.querySelectorAll('.cart-row').forEach(r => r.remove());
        const items = Object.entries(cart);

        if (items.length === 0) {
            emptyRow.style.display = '';
            document.getElementById('cart-total').textContent = 'R$ 0,00';
            return;
        }

        emptyRow.style.display = 'none';
        let total = 0;
        items.forEach(([nome, { preco, qty }]) => {
            const subtotal = preco * qty;
            total += subtotal;
            const safe = nome.replace(/\\/g, '\\\\').replace(/'/g, "\\'");
            const tr = document.createElement('tr');
            tr.className = 'cart-row';
            tr.innerHTML = `
                <td class="cart-item-name">${nome}</td>
                <td><div class="cart-item-qty">
                    <button class="qty-btn" onclick="changeQty('${safe}',-1)">-</button>
                    <span class="qty-value">${qty}</span>
                    <button class="qty-btn" onclick="changeQty('${safe}',1)">+</button>
                </div></td>
                <td>R$ ${preco.toFixed(2).replace('.',',')}</td>
                <td>R$ ${subtotal.toFixed(2).replace('.',',')}</td>
                <td><button class="qty-btn" style="color:var(--danger);border-color:var(--danger);" onclick="removeItem('${safe}')">✕</button></td>
            `;
            tbody.appendChild(tr);
        });
        document.getElementById('cart-total').textContent = 'R$ ' + total.toFixed(2).replace('.',',');
    }

    function calcTotal() {
        return Object.values(cart).reduce((s, { preco, qty }) => s + preco * qty, 0);
    }

    // ── salvar (criar ou editar) ────────────────────────────────────────
    function salvarComanda() {
        const identificador = document.getElementById('input-identificador').value.trim();
        if (!identificador) {
            alert(tipoAtual === 'presencial' ? 'Informe o número da mesa.' : 'Informe o nome do cliente.');
            return;
        }
        if (Object.keys(cart).length === 0) {
            alert('Adicione ao menos um item ao pedido.');
            return;
        }

        const total      = calcTotal();
        const totalFmt   = 'R$ ' + total.toFixed(2).replace('.', ',');
        const endereco   = document.getElementById('input-endereco').value.trim();
        const badgeClass = tipoAtual === 'presencial' ? 'badge-presencial' : 'badge-entrega';
        const badgeLabel = tipoAtual === 'presencial' ? 'Presencial' : 'Entrega';

        if (editingId) {
            // ── modo edição: atualiza o card existente ──
            const c     = comandas[editingId];
            const titulo = tipoAtual === 'presencial' ? `Mesa ${identificador}` : c.titulo;
            c.titulo       = titulo;
            c.tipo         = tipoAtual;
            c.identificador = identificador;
            c.endereco     = endereco;
            c.cart         = JSON.parse(JSON.stringify(cart));

            const card = document.querySelector(`.card[data-id="${editingId}"]`);
            card.dataset.type                              = tipoAtual;
            card.querySelector('.card-title').textContent  = titulo;
            card.querySelector('.badge').className         = `badge ${badgeClass}`;
            card.querySelector('.badge').textContent       = badgeLabel;
            card.querySelector('.card-value').textContent  = totalFmt;

            // Rebuild status select if type changed (presencial <-> entrega)
            const oldSelect = card.querySelector('.status-select');
            const currentStatus = comandas[editingId].status || 'em-preparo';
            const statusOptionsEdit = tipoAtual === 'entrega'
                ? `<option value="em-preparo">Em Preparo</option><option value="em-rota">Em Rota</option><option value="completa">Completa</option>`
                : `<option value="em-preparo">Em Preparo</option><option value="completa">Completa</option>`;
            const newSelect = document.createElement('select');
            newSelect.className = 'status-select status-' + currentStatus;
            newSelect.setAttribute('onchange', `atualizarStatus('${editingId}', this)`);
            newSelect.innerHTML = statusOptionsEdit;
            newSelect.value = currentStatus;
            oldSelect.replaceWith(newSelect);
        } else {
            // ── modo criação: cria novo card ────────────
            const novoId = 'c' + idCounter++;
            const titulo = tipoAtual === 'presencial' ? `Mesa ${identificador}` : `Pedido #${pedidoCounter++}`;

            comandas[novoId] = { titulo, tipo: tipoAtual, identificador, endereco, cart: JSON.parse(JSON.stringify(cart)), status: 'em-preparo' };

            const statusOptions = tipoAtual === 'entrega'
                ? `<option value="em-preparo">Em Preparo</option><option value="em-rota">Em Rota</option><option value="completa">Completa</option>`
                : `<option value="em-preparo">Em Preparo</option><option value="completa">Completa</option>`;

            const card = document.createElement('div');
            card.className    = 'card';
            card.dataset.type = tipoAtual;
            card.dataset.id   = novoId;
            card.innerHTML    = `
                <div class="card-header">
                    <div class="card-title">${titulo}</div>
                    <span class="badge ${badgeClass}">${badgeLabel}</span>
                </div>
                <div class="card-value">${totalFmt}</div>
                <select class="status-select status-em-preparo" onchange="atualizarStatus('${novoId}', this)">${statusOptions}</select>
                <div class="card-actions">
                    <a href="#" class="link-action" onclick="editarComanda('${novoId}'); return false;">Editar</a>
                    <a href="#" class="link-action link-danger" onclick="excluirComanda('${novoId}'); return false;">Excluir</a>
                </div>
            `;
            document.getElementById('cards-grid').appendChild(card);

            // respeita filtro ativo
            const tabAtiva = document.querySelector('.tab.active');
            if (tabAtiva) {
                const f = tabAtiva.getAttribute('onclick').match(/'(\w+)'/)[1];
                if (f !== 'todas' && f !== tipoAtual) card.style.display = 'none';
            }
        }

        fecharModal();
    }

    // ── status da comanda ───────────────────────────────────────────────
    function atualizarStatus(id, selectEl) {
        const valor = selectEl.value;
        comandas[id].status = valor;
        selectEl.className = 'status-select status-' + valor;
        syncStatusStorage();

        if (valor === 'completa') {
            const card = document.querySelector(`.card[data-id="${id}"]`);
            card.style.opacity    = '0';
            card.style.transform  = 'scale(0.95)';
            setTimeout(function () {
                card.remove();
                delete comandas[id];
            }, 500);
        }
    }

    // ── excluir ─────────────────────────────────────────────────────────
    function excluirComanda(id) {
        const c = comandas[id];
        if (!confirm(`Excluir "${c.titulo}"? Esta ação não pode ser desfeita.`)) return;
        document.querySelector(`.card[data-id="${id}"]`).remove();
        comandas[id] = { status: 'excluido' };
        syncStatusStorage();
        delete comandas[id];
    }
</script>
@endsection
