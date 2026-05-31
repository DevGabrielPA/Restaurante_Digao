<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Restaurante</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-logo">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2v7zm5-3v8h2.5v8H21V2c-2.76 0-5 2.24-5 4z"/>
                </svg>
                <h1>Restaurante do Digão</h1>
            </div>

            <div class="login-form">
                
                <div class="form-group">
                    <label class="form-label" for="email">E-mail</label>
                    <input
                        type="text"
                        id="email"
                        class="form-input"
                        placeholder="seu@email.com"
                    >
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Senha</label>
                    <input
                        type="password"
                        id="password"
                        class="form-input"
                        placeholder="••••••••"
                    >
                </div>

                <a href="{{ url('/comandas') }}" class="btn btn-primary" style="text-align: center; text-decoration: none; display: block; width: 100%;">
                    Entrar
                </a>
            </div>
        </div>
    </div>
</body>
</html>