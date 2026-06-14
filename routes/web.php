<?php

use Illuminate\Support\Facades\Route;

// Tela de login (raiz)
Route::get('/', function () {
    return view('login');
});

// Outras telas do sistema (todas como GET)
Route::get('/comandas', function () {
    return view('comandas');
});

Route::get('/produtos', function () {
    return view('produtos');
});

Route::get('/funcionarios', function () {
    return view('funcionarios');
});

Route::get('/historico', function () {
    return view('historico');
});

Route::get('/configuracoes', function () {
    return view('configuracoes');
});