<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-4">
        <div class="jumbotron">
            <h1 class="display-4">Bem-vindo ao Sistema</h1>
            <p class="lead">Este é um sistema de gerenciamento de clientes e orçamentos.</p>
            <hr class="my-4">
            <p>Escolha uma das opções abaixo para começar:</p>
            <a class="btn btn-primary btn-lg" href="{{ url('/clientes') }}" role="button">Clientes</a>
            <a class="btn btn-secondary btn-lg" href="{{ url('/orcamentos') }}" role="button">Orçamentos</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
