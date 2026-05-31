<div class="modal-overlay">
    <div class="modal">
        <div class="modal-header">
            <h2 class="modal-title">Mesa 05 - Comanda Presencial</h2>
            <button class="modal-close">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                </svg>
            </button>
        </div>

        <div class="modal-body">
            <div class="modal-column">
                <h3 class="mb-16">Adicionar Produtos</h3>

                <div class="product-filters">
                    <button class="filter-chip active">Todos</button>
                    <button class="filter-chip">Entradas</button>
                    <button class="filter-chip">Pratos Principais</button>
                    <button class="filter-chip">Bebidas</button>
                    <button class="filter-chip">Sobremesas</button>
                </div>

                <div class="product-list">
                    <div class="product-item">
                        <div class="product-image"></div>
                        <div class="product-info">
                            <div class="product-name">Filé Mignon ao Molho Madeira</div>
                            <div class="product-price">R$ 78,90</div>
                        </div>
                        <button class="product-add-btn">+</button>
                    </div>

                    <div class="product-item">
                        <div class="product-image"></div>
                        <div class="product-info">
                            <div class="product-name">Salmão Grelhado com Legumes</div>
                            <div class="product-price">R$ 65,50</div>
                        </div>
                        <button class="product-add-btn">+</button>
                    </div>

                    <div class="product-item">
                        <div class="product-image"></div>
                        <div class="product-info">
                            <div class="product-name">Risoto de Cogumelos</div>
                            <div class="product-price">R$ 52,00</div>
                        </div>
                        <button class="product-add-btn">+</button>
                    </div>

                    <div class="product-item">
                        <div class="product-image"></div>
                        <div class="product-info">
                            <div class="product-name">Água Mineral 500ml</div>
                            <div class="product-price">R$ 6,00</div>
                        </div>
                        <button class="product-add-btn">+</button>
                    </div>

                    <div class="product-item">
                        <div class="product-image"></div>
                        <div class="product-info">
                            <div class="product-name">Refrigerante Lata</div>
                            <div class="product-price">R$ 8,50</div>
                        </div>
                        <button class="product-add-btn">+</button>
                    </div>

                    <div class="product-item">
                        <div class="product-image"></div>
                        <div class="product-info">
                            <div class="product-name">Vinho Tinto Taça</div>
                            <div class="product-price">R$ 18,00</div>
                        </div>
                        <button class="product-add-btn">+</button>
                    </div>

                    <div class="product-item">
                        <div class="product-image"></div>
                        <div class="product-info">
                            <div class="product-name">Petit Gateau</div>
                            <div class="product-price">R$ 22,00</div>
                        </div>
                        <button class="product-add-btn">+</button>
                    </div>

                    <div class="product-item">
                        <div class="product-image"></div>
                        <div class="product-info">
                            <div class="product-name">Torta de Limão</div>
                            <div class="product-price">R$ 16,50</div>
                        </div>
                        <button class="product-add-btn">+</button>
                    </div>
                </div>
            </div>

            <div class="modal-column">
                <h3 class="mb-16">Resumo da Comanda</h3>

                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Qtd</th>
                            <th>Preço Unit.</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="cart-item-name">Filé Mignon ao Molho Madeira</td>
                            <td>
                                <div class="cart-item-qty">
                                    <button class="qty-btn">-</button>
                                    <span class="qty-value">2</span>
                                    <button class="qty-btn">+</button>
                                </div>
                            </td>
                            <td>R$ 78,90</td>
                            <td>R$ 157,80</td>
                        </tr>
                        <tr>
                            <td class="cart-item-name">Água Mineral 500ml</td>
                            <td>
                                <div class="cart-item-qty">
                                    <button class="qty-btn">-</button>
                                    <span class="qty-value">2</span>
                                    <button class="qty-btn">+</button>
                                </div>
                            </td>
                            <td>R$ 6,00</td>
                            <td>R$ 12,00</td>
                        </tr>
                        <tr>
                            <td class="cart-item-name">Vinho Tinto Taça</td>
                            <td>
                                <div class="cart-item-qty">
                                    <button class="qty-btn">-</button>
                                    <span class="qty-value">1</span>
                                    <button class="qty-btn">+</button>
                                </div>
                            </td>
                            <td>R$ 18,00</td>
                            <td>R$ 18,00</td>
                        </tr>
                    </tbody>
                </table>

                <div class="logistics-section">
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

                    <div class="info-row">
                        <span class="info-label">Endereço:</span>
                        <span class="info-value">Rua das Flores, 245 - Apto 302</span>
                    </div>

                    <div class="info-row">
                        <span class="info-label">Motoboy:</span>
                        <span class="info-value">Carlos Oliveira</span>
                    </div>

                    <button class="btn btn-secondary mt-24" style="width: 100%;">Solicitar Motoboy</button>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <div>
                <div class="total-label">Total Geral</div>
                <div class="total-value">R$ 187,80</div>
            </div>
            <div class="flex gap-16">
                <button class="btn btn-secondary">Cancelar</button>
                <button class="btn btn-primary">Fechar Comanda</button>
            </div>
        </div>
    </div>
</div>