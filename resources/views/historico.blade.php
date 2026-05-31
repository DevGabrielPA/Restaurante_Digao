@extends('layout')

@section('conteudo')
<div class="page-header">
    <h1 class="page-title">Histórico de Vendas</h1>
</div>

<div class="card mb-24" style="max-width: 100%;">
    <form action="#" method="GET">
        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="filter-date-start">Data Inicial</label>
                <input
                    type="date"
                    id="filter-date-start"
                    name="filter-date-start"
                    class="form-input"
                >
            </div>

            <div class="form-group">
                <label class="form-label" for="filter-date-end">Data Final</label>
                <input
                    type="date"
                    id="filter-date-end"
                    name="filter-date-end"
                    class="form-input"
                >
            </div>

            <div class="form-group">
                <label class="form-label" for="filter-type">Tipo</label>
                <select id="filter-type" name="filter-type" class="form-select">
                    <option value="">Todos</option>
                    <option value="presencial">Presencial</option>
                    <option value="online">Online</option>
                </select>
            </div>

            <div class="form-group" style="display: flex; align-items: flex-end;">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Filtrar</button>
            </div>
        </div>
    </form>
</div>

<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>ID da Venda</th>
                <th>Data e Hora</th>
                <th>Tipo</th>
                <th>Mesa/Pedido</th>
                <th>Funcionário Responsável</th>
                <th>Valor Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>#1523</td>
                <td>29/05/2026 19:45</td>
                <td><span class="badge badge-presencial">Presencial</span></td>
                <td>Mesa 05</td>
                <td>Maria Oliveira</td>
                <td>R$ 187,80</td>
            </tr>
            <tr>
                <td>#1522</td>
                <td>29/05/2026 19:32</td>
                <td><span class="badge badge-online">Online</span></td>
                <td>Pedido #1247</td>
                <td>Carlos Santos</td>
                <td>R$ 92,50</td>
            </tr>
            <tr>
                <td>#1521</td>
                <td>29/05/2026 19:18</td>
                <td><span class="badge badge-presencial">Presencial</span></td>
                <td>Mesa 12</td>
                <td>Ana Paula Costa</td>
                <td>R$ 234,80</td>
            </tr>
            <tr>
                <td>#1520</td>
                <td>29/05/2026 18:55</td>
                <td><span class="badge badge-online">Online</span></td>
                <td>Pedido #1246</td>
                <td>João da Silva</td>
                <td>R$ 157,90</td>
            </tr>
            <tr>
                <td>#1519</td>
                <td>29/05/2026 18:42</td>
                <td><span class="badge badge-presencial">Presencial</span></td>
                <td>Mesa 03</td>
                <td>Maria Oliveira</td>
                <td>R$ 68,70</td>
            </tr>
            <tr>
                <td>#1518</td>
                <td>29/05/2026 18:30</td>
                <td><span class="badge badge-presencial">Presencial</span></td>
                <td>Mesa 08</td>
                <td>Ana Paula Costa</td>
                <td>R$ 312,00</td>
            </tr>
            <tr>
                <td>#1517</td>
                <td>29/05/2026 18:15</td>
                <td><span class="badge badge-online">Online</span></td>
                <td>Pedido #1245</td>
                <td>Carlos Santos</td>
                <td>R$ 125,40</td>
            </tr>
            <tr>
                <td>#1516</td>
                <td>29/05/2026 17:58</td>
                <td><span class="badge badge-presencial">Presencial</span></td>
                <td>Mesa 15</td>
                <td>Maria Oliveira</td>
                <td>R$ 89,90</td>
            </tr>
            <tr>
                <td>#1515</td>
                <td>29/05/2026 17:45</td>
                <td><span class="badge badge-presencial">Presencial</span></td>
                <td>Mesa 07</td>
                <td>Ana Paula Costa</td>
                <td>R$ 156,20</td>
            </tr>
            <tr>
                <td>#1514</td>
                <td>29/05/2026 17:30</td>
                <td><span class="badge badge-online">Online</span></td>
                <td>Pedido #1244</td>
                <td>João da Silva</td>
                <td>R$ 203,50</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="card mt-24" style="max-width: 400px; margin-left: auto;">
    <h3 class="mb-16">Resumo do Dia</h3>

    <div class="info-row">
        <span class="info-label">Total de Vendas:</span>
        <span class="info-value">47</span>
    </div>

    <div class="info-row">
        <span class="info-label">Vendas Presenciais:</span>
        <span class="info-value">32</span>
    </div>

    <div class="info-row">
        <span class="info-label">Vendas Online:</span>
        <span class="info-value">15</span>
    </div>

    <div class="info-row" style="border-bottom: none; padding-top: 20px;">
        <span class="info-label" style="font-size: 16px; font-weight: 600;">Faturamento Total:</span>
        <span class="info-value" style="font-size: 24px; font-weight: 700; color: var(--primary);">R$ 6.847,50</span>
    </div>
</div>
@endsection