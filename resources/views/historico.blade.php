@extends('layout')

@section('conteudo')
<div class="page-header" style="margin-bottom: 24px;">
    <div>
        <h1 class="page-title">Histórico de Comandas</h1>
        <p class="page-subtitle">Registro completo de comandas finalizadas</p>
    </div>
</div>

{{-- Cards de resumo --}}
<div class="stats-row mb-24">
    <div class="stat-card">
        <div class="stat-card-header">
            <span class="stat-label">TOTAL DE COMANDAS</span>
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="stat-icon"><path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg>
        </div>
        <div class="stat-value" id="stat-total">10</div>
    </div>
    <div class="stat-card">
        <div class="stat-card-header">
            <span class="stat-label">RECEITA TOTAL</span>
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="stat-icon stat-icon-orange"><path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"/></svg>
        </div>
        <div class="stat-value stat-value-orange" id="stat-receita">R$ 1.470,90</div>
    </div>
    <div class="stat-card">
        <div class="stat-card-header">
            <span class="stat-label">TICKET MÉDIO</span>
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="stat-icon stat-icon-green"><path d="M16 6l2.29 2.29-4.88 4.88-4-4L2 16.59 3.41 18l6-6 4 4 6.3-6.29L22 12V6z"/></svg>
        </div>
        <div class="stat-value stat-value-green" id="stat-ticket">R$ 147,09</div>
    </div>
</div>

{{-- Barra de filtros --}}
<div class="hist-filter-bar mb-16">
    <div class="hist-search-wrap">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="hist-search-icon"><path d="M15.5 14h-.79l-.28-.27A6.47 6.47 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
        <input type="text" id="hist-search" class="hist-search-input" placeholder="Buscar por ID, funcionário..." oninput="filtrarHistorico()">
    </div>
    <div class="filter-chip-tabs">
        <button class="filter-chip-tab active" data-tipo="" onclick="setFiltroTipo('', this)">Todos</button>
        <button class="filter-chip-tab" data-tipo="presencial" onclick="setFiltroTipo('presencial', this)">Presencial</button>
        <button class="filter-chip-tab" data-tipo="entrega" onclick="setFiltroTipo('entrega', this)">Entrega</button>
    </div>
    <div class="hist-breakdown">
        Presencial: <span class="hist-breakdown-presencial">R$ 1.197,50</span>
        &nbsp;&nbsp;Entrega: <span class="hist-breakdown-entrega">R$ 273,40</span>
    </div>
</div>

{{-- Tabela --}}
<div class="table-container">
    <table class="table" id="tabela-historico">
        <thead>
            <tr>
                <th style="width:80px;">ID</th>
                <th>Data / Hora Fechamento</th>
                <th style="width:130px;">Tipo</th>
                <th>Funcionário Responsável</th>
                <th style="text-align:right;">Valor Pago</th>
            </tr>
        </thead>
        <tbody>
            <tr data-tipo="presencial" data-search="1042 roberto costa">
                <td class="hist-id">#1042</td>
                <td class="hist-data">29/05/2026 — 14:32</td>
                <td><span class="hist-badge hist-badge-presencial">Presencial</span></td>
                <td>Roberto Costa</td>
                <td class="hist-valor"><span class="price-currency">R$</span> <span class="price-amount">214,00</span></td>
            </tr>
            <tr data-tipo="entrega" data-search="1041 carlos silva">
                <td class="hist-id">#1041</td>
                <td class="hist-data">29/05/2026 — 13:58</td>
                <td><span class="hist-badge hist-badge-entrega">Entrega</span></td>
                <td>Carlos Silva</td>
                <td class="hist-valor"><span class="price-currency">R$</span> <span class="price-amount">87,50</span></td>
            </tr>
            <tr data-tipo="presencial" data-search="1040 roberto costa">
                <td class="hist-id">#1040</td>
                <td class="hist-data">29/05/2026 — 13:21</td>
                <td><span class="hist-badge hist-badge-presencial">Presencial</span></td>
                <td>Roberto Costa</td>
                <td class="hist-valor"><span class="price-currency">R$</span> <span class="price-amount">156,00</span></td>
            </tr>
            <tr data-tipo="entrega" data-search="1039 carlos silva">
                <td class="hist-id">#1039</td>
                <td class="hist-data">29/05/2026 — 12:45</td>
                <td><span class="hist-badge hist-badge-entrega">Entrega</span></td>
                <td>Carlos Silva</td>
                <td class="hist-valor"><span class="price-currency">R$</span> <span class="price-amount">65,90</span></td>
            </tr>
            <tr data-tipo="presencial" data-search="1038 roberto costa">
                <td class="hist-id">#1038</td>
                <td class="hist-data">29/05/2026 — 12:10</td>
                <td><span class="hist-badge hist-badge-presencial">Presencial</span></td>
                <td>Roberto Costa</td>
                <td class="hist-valor"><span class="price-currency">R$</span> <span class="price-amount">92,00</span></td>
            </tr>
            <tr data-tipo="presencial" data-search="1037 roberto costa">
                <td class="hist-id">#1037</td>
                <td class="hist-data">28/05/2026 — 22:48</td>
                <td><span class="hist-badge hist-badge-presencial">Presencial</span></td>
                <td>Roberto Costa</td>
                <td class="hist-valor"><span class="price-currency">R$</span> <span class="price-amount">312,50</span></td>
            </tr>
            <tr data-tipo="entrega" data-search="1036 carlos silva">
                <td class="hist-id">#1036</td>
                <td class="hist-data">28/05/2026 — 22:15</td>
                <td><span class="hist-badge hist-badge-entrega">Entrega</span></td>
                <td>Carlos Silva</td>
                <td class="hist-valor"><span class="price-currency">R$</span> <span class="price-amount">48,00</span></td>
            </tr>
            <tr data-tipo="presencial" data-search="1035 roberto costa">
                <td class="hist-id">#1035</td>
                <td class="hist-data">28/05/2026 — 21:30</td>
                <td><span class="hist-badge hist-badge-presencial">Presencial</span></td>
                <td>Roberto Costa</td>
                <td class="hist-valor"><span class="price-currency">R$</span> <span class="price-amount">178,00</span></td>
            </tr>
            <tr data-tipo="presencial" data-search="1034 roberto costa">
                <td class="hist-id">#1034</td>
                <td class="hist-data">28/05/2026 — 20:55</td>
                <td><span class="hist-badge hist-badge-presencial">Presencial</span></td>
                <td>Roberto Costa</td>
                <td class="hist-valor"><span class="price-currency">R$</span> <span class="price-amount">245,00</span></td>
            </tr>
            <tr data-tipo="entrega" data-search="1033 carlos silva">
                <td class="hist-id">#1033</td>
                <td class="hist-data">28/05/2026 — 20:12</td>
                <td><span class="hist-badge hist-badge-entrega">Entrega</span></td>
                <td>Carlos Silva</td>
                <td class="hist-valor"><span class="price-currency">R$</span> <span class="price-amount">72,00</span></td>
            </tr>
        </tbody>
        <tfoot>
            <tr id="hist-footer">
                <td colspan="4" class="hist-footer-label">TOTAL (10 REGISTROS)</td>
                <td class="hist-footer-total"><span class="price-currency">R$</span> <span class="price-amount" id="hist-total-val">1.470,90</span></td>
            </tr>
        </tfoot>
    </table>
</div>

<script>
    let filtroTipo = '';

    function setFiltroTipo(tipo, el) {
        filtroTipo = tipo;
        document.querySelectorAll('.filter-chip-tab').forEach(b => b.classList.remove('active'));
        el.classList.add('active');
        filtrarHistorico();
    }

    function filtrarHistorico() {
        const busca = document.getElementById('hist-search').value.toLowerCase().trim();
        let visiveis = 0;
        let total = 0;

        document.querySelectorAll('#tabela-historico tbody tr').forEach(tr => {
            const tipoMatch   = !filtroTipo || tr.dataset.tipo === filtroTipo;
            const buscaMatch  = !busca || tr.dataset.search.includes(busca);
            const visivel     = tipoMatch && buscaMatch;
            tr.style.display  = visivel ? '' : 'none';

            if (visivel) {
                visiveis++;
                const valorEl = tr.querySelector('.price-amount');
                if (valorEl) total += parseFloat(valorEl.textContent.replace(',', '.'));
            }
        });

        const totalFmt = total.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        document.getElementById('hist-footer-label') && (document.getElementById('hist-footer-label').textContent = `TOTAL (${visiveis} REGISTRO${visiveis !== 1 ? 'S' : ''})`);
        document.getElementById('hist-total-val').textContent = totalFmt;

        const footerLabel = document.querySelector('.hist-footer-label');
        if (footerLabel) footerLabel.textContent = `TOTAL (${visiveis} REGISTRO${visiveis !== 1 ? 'S' : ''})`;
    }
</script>
@endsection
