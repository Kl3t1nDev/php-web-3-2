<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Lista de Clientes</h1>
        <a href="{{ url('/clientes/create') }}">Criar Novo Cliente</a>
        <form method="GET" action="{{ url('/clientes') }}">
            <input type="text" name="search" placeholder="Buscar cliente..." value="{{ request('search') }}">
            <button type="submit">Pesquisar</button>
        </form>
        <a href="{{ url('/') }}">Voltar para a Página Inicial</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Data de Nascimento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->cpf }}</td>
                        <td>{{ $cliente->nascimento }}</td>
                        <td>
                            <a href="{{ url('/orcamentos?cliente_id=' . $cliente->id) }}">Ver Orçamentos</a>
                            <a href="{{ url('/clientes/' . $cliente->id . '/edit') }}">Editar</a>
                            <form action="{{ url('/clientes/' . $cliente->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $clientes->links() }}
    </div>
</body>
</html>
