<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início - CRUD Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Bem-vindo ao Sistema CRUD Laravel</h1>
        <nav>
            <ul>
                <li><a href="{{ url('/clientes') }}">Clientes</a></li>
                <li><a href="{{ url('/orcamentos') }}">Orçamentos</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>
