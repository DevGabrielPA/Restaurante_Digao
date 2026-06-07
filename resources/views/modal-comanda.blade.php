<div class="modal-overlay" id="modal-comanda" style="display: none;">
    <div class="modal">
        <div class="modal-header">
            <h2 class="modal-title" id="modal-titulo">Nova Comanda</h2>
            <button class="modal-close" onclick="fecharModal()">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                </svg>
            </button>
        </div>

        <div class="modal-top-form">
            <div class="form-row">
                <div class="form-group" style="margin-bottom:0">
                    <label class="form-label">Tipo de Pedido</label>
                    <div class="type-selector">
                        <button type="button" class="type-btn active" id="btn-presencial" onclick="setTipo('presencial')">Presencial</button>
                        <button type="button" class="type-btn" id="btn-entrega" onclick="setTipo('entrega')">Entrega</button>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom:0">
                    <label class="form-label" id="label-identificador">Número da Mesa</label>
                    <input type="text" id="input-identificador" class="form-input" placeholder="Ex: 05">
                </div>
                <div class="form-group" id="group-endereco" style="display:none; margin-bottom:0">
                    <label class="form-label">Endereço de Entrega</label>
                    <input type="text" id="input-endereco" class="form-input" placeholder="Rua, número, complemento">
                </div>
            </div>
        </div>

        <div class="modal-body">
            <div class="modal-column">
                <h3 class="mb-16">Adicionar Produtos</h3>

                <div class="custom-item-form" style="margin-top:0; border-top:none; padding-top:0; margin-bottom:16px;">
                    <button class="custom-item-toggle" type="button" onclick="toggleCustomForm()">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                        Adicionar item personalizado
                    </button>
                    <div class="custom-item-fields" id="custom-item-fields" style="display:none;">
                        <div class="form-row" style="margin-top:12px;">
                            <div class="form-group" style="margin-bottom:0; grid-column: span 2;">
                                <label class="form-label">Nome do Item</label>
                                <input type="text" id="custom-nome" class="form-input" placeholder="Ex: Prato especial do chef">
                            </div>
                        </div>
                        <div class="form-row" style="margin-top:12px;">
                            <div class="form-group" style="margin-bottom:0;">
                                <label class="form-label">Preço (R$)</label>
                                <input type="number" id="custom-preco" class="form-input" placeholder="0,00" step="0.01" min="0">
                            </div>
                            <div class="form-group" style="margin-bottom:0;">
                                <label class="form-label">Peso / Qtd</label>
                                <input type="text" id="custom-peso" class="form-input" placeholder="Ex: 300g, 1kg, 2un">
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" style="margin-top:12px; width:100%;" onclick="addCustomItem()">Adicionar ao Pedido</button>
                    </div>
                </div>

                <div class="product-filters">
                    <button class="filter-chip active" onclick="filterProdutos('Todos', this)">Todos</button>
                    <button class="filter-chip" onclick="filterProdutos('Entradas', this)">Entradas</button>
                    <button class="filter-chip" onclick="filterProdutos('Pratos Principais', this)">Pratos Principais</button>
                    <button class="filter-chip" onclick="filterProdutos('Bebidas', this)">Bebidas</button>
                    <button class="filter-chip" onclick="filterProdutos('Sobremesas', this)">Sobremesas</button>
                </div>

                <div class="product-list" id="product-list">
                    <div class="product-item" data-categoria="Pratos Principais">
                        <div class="product-image"></div>
                        <div class="product-info">
                            <div class="product-name">Filé Mignon ao Molho Madeira</div>
                            <div class="product-price">R$ 78,90</div>
                        </div>
                        <button class="product-add-btn" onclick="addToCart('Filé Mignon ao Molho Madeira', 78.90)">+</button>
                    </div>

                    <div class="product-item" data-categoria="Pratos Principais">
                        <div class="product-image"></div>
                        <div class="product-info">
                            <div class="product-name">Salmão Grelhado com Legumes</div>
                            <div class="product-price">R$ 65,50</div>
                        </div>
                        <button class="product-add-btn" onclick="addToCart('Salmão Grelhado com Legumes', 65.50)">+</button>
                    </div>

                    <div class="product-item" data-categoria="Pratos Principais">
                        <div class="product-image"></div>
                        <div class="product-info">
                            <div class="product-name">Risoto de Cogumelos</div>
                            <div class="product-price">R$ 52,00</div>
                        </div>
                        <button class="product-add-btn" onclick="addToCart('Risoto de Cogumelos', 52.00)">+</button>
                    </div>

                    <div class="product-item" data-categoria="Bebidas">
                        <div class="product-image"></div>
                        <div class="product-info">
                            <div class="product-name">Água Mineral 500ml</div>
                            <div class="product-price">R$ 6,00</div>
                        </div>
                        <button class="product-add-btn" onclick="addToCart('Água Mineral 500ml', 6.00)">+</button>
                    </div>

                    <div class="product-item" data-categoria="Bebidas">
                        <div class="product-image"></div>
                        <div class="product-info">
                            <div class="product-name">Refrigerante Lata</div>
                            <div class="product-price">R$ 8,50</div>
                        </div>
                        <button class="product-add-btn" onclick="addToCart('Refrigerante Lata', 8.50)">+</button>
                    </div>

                    <div class="product-item" data-categoria="Bebidas">
                        <div class="product-image"></div>
                        <div class="product-info">
                            <div class="product-name">Vinho Tinto Taça</div>
                            <div class="product-price">R$ 18,00</div>
                        </div>
                        <button class="product-add-btn" onclick="addToCart('Vinho Tinto Taça', 18.00)">+</button>
                    </div>

                    <div class="product-item" data-categoria="Sobremesas">
                        <div class="product-image"></div>
                        <div class="product-info">
                            <div class="product-name">Petit Gateau</div>
                            <div class="product-price">R$ 22,00</div>
                        </div>
                        <button class="product-add-btn" onclick="addToCart('Petit Gateau', 22.00)">+</button>
                    </div>

                    <div class="product-item" data-categoria="Sobremesas">
                        <div class="product-image"></div>
                        <div class="product-info">
                            <div class="product-name">Torta de Limão</div>
                            <div class="product-price">R$ 16,50</div>
                        </div>
                        <button class="product-add-btn" onclick="addToCart('Torta de Limão', 16.50)">+</button>
                    </div>
                </div>
            </div>

            <div class="modal-column">
                <h3 class="mb-16">Itens do Pedido</h3>

                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Qtd</th>
                            <th>Preço Unit.</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="cart-body">
                        <tr id="cart-empty">
                            <td colspan="5" style="text-align:center; color:var(--text-muted); padding:32px 0;">
                                Nenhum item adicionado
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="logistics-section" id="logistics-section" style="display:none;">
                    <h4 class="logistics-title">Logística de Entrega</h4>
                    <div class="form-group">
                        <label class="form-label" for="delivery-status">Status da Entrega</label>
                        <select id="delivery-status" class="form-select">
                            <option value="pendente">Pendente</option>
                            <option value="preparando">Preparando</option>
                            <option value="em-rota">Em Rota</option>
                            <option value="entregue">Entregue</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <div>
                <div class="total-label">Total Geral</div>
                <div class="total-value" id="cart-total">R$ 0,00</div>
            </div>
            <div class="flex gap-16">
                <button class="btn btn-secondary" onclick="fecharModal()">Cancelar</button>
                <button class="btn btn-primary" id="btn-salvar" onclick="salvarComanda()">Criar Comanda</button>
            </div>
        </div>
    </div>
</div>
