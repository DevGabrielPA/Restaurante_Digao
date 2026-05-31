@extends('layout')

@section('conteudo')
<div class="page-header">
    <h1 class="page-title">Comandas</h1>
    <button class="btn btn-primary" onclick="toggleModal(true)">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
        </svg>
        Abrir Nova Comanda
    </button>
</div>

<div class="tabs">
    <button class="tab active" onclick="filterTabs('todas', this)">Todas</button>
    <button class="tab" onclick="filterTabs('presencial', this)">Presencial</button>
    <button class="tab" onclick="filterTabs('online', this)">Online</button>
</div>

<div class="cards-grid">
    <div class="card" data-type="presencial">
        <div class="card-header">
            <div class="card-title">Mesa 05</div>
            <span class="badge badge-presencial">Presencial</span>
        </div>
        <div class="card-value">R$ 185,40</div>
        <div class="card-actions">
            <a href="#" class="link-action">Adicionar Item</a>
            <a href="#" class="link-action">Editar</a>
            <a href="#" class="link-action">Excluir</a>
        </div>
    </div>

    <div class="card" data-type="online">
        <div class="card-header">
            <div class="card-title">Pedido #1247</div>
            <span class="badge badge-online">Online</span>
        </div>
        <div class="card-value">R$ 92,50</div>
        <div class="card-actions">
            <a href="#" class="link-action">Adicionar Item</a>
            <a href="#" class="link-action">Editar</a>
            <a href="#" class="link-action">Excluir</a>
        </div>
    </div>

    <div class="card" data-type="presencial">
        <div class="card-header">
            <div class="card-title">Mesa 12</div>
            <span class="badge badge-presencial">Presencial</span>
        </div>
        <div class="card-value">R$ 234,80</div>
        <div class="card-actions">
            <a href="#" class="link-action">Adicionar Item</a>
            <a href="#" class="link-action">Editar</a>
            <a href="#" class="link-action">Excluir</a>
        </div>
    </div>

    <div class="card" data-type="online">
        <div class="card-header">
            <div class="card-title">Pedido #1248</div>
            <span class="badge badge-online">Online</span>
        </div>
        <div class="card-value">R$ 157,90</div>
        <div class="card-actions">
            <a href="#" class="link-action">Adicionar Item</a>
            <a href="#" class="link-action">Editar</a>
            <a href="#" class="link-action">Excluir</a>
        </div>
    </div>

    <div class="card" data-type="presencial">
        <div class="card-header">
            <div class="card-title">Mesa 03</div>
            <span class="badge badge-presencial">Presencial</span>
        </div>
        <div class="card-value">R$ 68,70</div>
        <div class="card-actions">
            <a href="#" class="link-action">Adicionar Item</a>
            <a href="#" class="link-action">Editar</a>
            <a href="#" class="link-action">Excluir</a>
        </div>
    </div>

    <div class="card" data-type="presencial">
        <div class="card-header">
            <div class="card-title">Mesa 08</div>
            <span class="badge badge-presencial">Presencial</span>
        </div>
        <div class="card-value">R$ 312,00</div>
        <div class="card-actions">
            <a href="#" class="link-action">Adicionar Item</a>
            <a href="#" class="link-action">Editar</a>
            <a href="#" class="link-action">Excluir</a>
        </div>
    </div>
</div>

<script>
    function filterTabs(type, element) {
        document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
        element.classList.add('active');

        document.querySelectorAll('.cards-grid .card').forEach(card => {
            if (type === 'todas' || card.getAttribute('data-type') === type) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    function toggleModal(open) {
        const modal = document.getElementById('modal-comanda');
        if (modal) {
            modal.style.display = open ? 'flex' : 'none';
        }
    }
</script>
@endsection