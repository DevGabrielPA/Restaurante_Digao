@extends('layout')

@section('conteudo')
<div class="page-header">
    <h1 class="page-title">Produtos</h1>
</div>

<div class="table-container mb-24">
    <table class="table">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nome do Produto</th>
                <th>Categoria</th>
                <th>Preço de Venda</th>
                <th>Estoque</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="product-image"></div>
                </td>
                <td>Filé Mignon ao Molho Madeira</td>
                <td>Pratos Principais</td>
                <td>R$ 78,90</td>
                <td>24</td>
                <td>
                    <div class="table-actions">
                        <a href="#" class="link-action">Editar</a>
                        <a href="#" class="link-action">Excluir</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="product-image"></div>
                </td>
                <td>Salmão Grelhado com Legumes</td>
                <td>Pratos Principais</td>
                <td>R$ 65,50</td>
                <td>18</td>
                <td>
                    <div class="table-actions">
                        <a href="#" class="link-action">Editar</a>
                        <a href="#" class="link-action">Excluir</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="product-image"></div>
                </td>
                <td>Risoto de Cogumelos</td>
                <td>Pratos Principais</td>
                <td>R$ 52,00</td>
                <td>32</td>
                <td>
                    <div class="table-actions">
                        <a href="#" class="link-action">Editar</a>
                        <a href="#" class="link-action">Excluir</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="product-image"></div>
                </td>
                <td>Água Mineral 500ml</td>
                <td>Bebidas</td>
                <td>R$ 6,00</td>
                <td>156</td>
                <td>
                    <div class="table-actions">
                        <a href="#" class="link-action">Editar</a>
                        <a href="#" class="link-action">Excluir</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="product-image"></div>
                </td>
                <td>Refrigerante Lata</td>
                <td>Bebidas</td>
                <td>R$ 8,50</td>
                <td>89</td>
                <td>
                    <div class="table-actions">
                        <a href="#" class="link-action">Editar</a>
                        <a href="#" class="link-action">Excluir</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="product-image"></div>
                </td>
                <td>Vinho Tinto Taça</td>
                <td>Bebidas</td>
                <td>R$ 18,00</td>
                <td>45</td>
                <td>
                    <div class="table-actions">
                        <a href="#" class="link-action">Editar</a>
                        <a href="#" class="link-action">Excluir</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="product-image"></div>
                </td>
                <td>Petit Gateau</td>
                <td>Sobremesas</td>
                <td>R$ 22,00</td>
                <td>28</td>
                <td>
                    <div class="table-actions">
                        <a href="#" class="link-action">Editar</a>
                        <a href="#" class="link-action">Excluir</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="product-image"></div>
                </td>
                <td>Torta de Limão</td>
                <td>Sobremesas</td>
                <td>R$ 16,50</td>
                <td>15</td>
                <td>
                    <div class="table-actions">
                        <a href="#" class="link-action">Editar</a>
                        <a href="#" class="link-action">Excluir</a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="card" style="max-width: 800px;">
    <h2 class="mb-24">Cadastrar Novo Produto</h2>

    <form action="#" method="POST">
        @csrf <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="product-name">Nome do Produto</label>
                <input
                    type="text"
                    id="product-name"
                    name="product-name"
                    class="form-input"
                    placeholder="Ex: Filé Mignon ao Molho Madeira"
                    required
                >
            </div>

            <div class="form-group">
                <label class="form-label" for="product-category">Categoria</label>
                <select id="product-category" name="product-category" class="form-select" required>
                    <option value="">Selecione uma categoria</option>
                    <option value="entradas">Entradas</option>
                    <option value="pratos-principais">Pratos Principais</option>
                    <option value="bebidas">Bebidas</option>
                    <option value="sobremesas">Sobremesas</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="product-price">Preço de Venda (R$)</label>
                <input
                    type="number"
                    id="product-price"
                    name="product-price"
                    class="form-input"
                    placeholder="0,00"
                    step="0.01"
                    required
                >
            </div>

            <div class="form-group">
                <label class="form-label" for="product-stock">Quantidade em Estoque</label>
                <input
                    type="number"
                    id="product-stock"
                    name="product-stock"
                    class="form-input"
                    placeholder="0"
                    required
                >
            </div>
        </div>

        <div class="form-group mb-24">
            <label class="form-label" for="product-description">Descrição (opcional)</label>
            <input
                type="text"
                id="product-description"
                name="product-description"
                class="form-input"
                placeholder="Breve descrição do produto"
            >
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar Produto</button>
    </form>
</div>
@endsectionp