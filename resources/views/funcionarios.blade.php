@extends('layout')

@section('conteudo')
<div class="page-header">
    <h1 class="page-title">Funcionários</h1>
</div>

<div class="table-container mb-24">
    <table class="table">
        <thead>
            <tr>
                <th>Nome Completo</th>
                <th>E-mail</th>
                <th>Nível de Permissão</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>João da Silva</td>
                <td>joao.silva@restaurante.com</td>
                <td>Administrador</td>
                <td>
                    <div class="table-actions">
                        <a href="#" class="link-action">Editar</a>
                        <a href="#" class="link-action">Excluir</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Maria Oliveira</td>
                <td>maria.oliveira@restaurante.com</td>
                <td>Garçom</td>
                <td>
                    <div class="table-actions">
                        <a href="#" class="link-action">Editar</a>
                        <a href="#" class="link-action">Excluir</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Carlos Santos</td>
                <td>carlos.santos@restaurante.com</td>
                <td>Caixa</td>
                <td>
                    <div class="table-actions">
                        <a href="#" class="link-action">Editar</a>
                        <a href="#" class="link-action">Excluir</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Ana Paula Costa</td>
                <td>ana.costa@restaurante.com</td>
                <td>Garçom</td>
                <td>
                    <div class="table-actions">
                        <a href="#" class="link-action">Editar</a>
                        <a href="#" class="link-action">Excluir</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Roberto Ferreira</td>
                <td>roberto.ferreira@restaurante.com</td>
                <td>Gerente</td>
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

<div class="card" style="max-width: 900px;">
    <h2 class="mb-24">Cadastrar Novo Funcionário</h2>

    <form action="#" method="POST">
        @csrf <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="employee-name">Nome Completo</label>
                <input
                    type="text"
                    id="employee-