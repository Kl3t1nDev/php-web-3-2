<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Orçamento</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Editar Orçamento</h1>
        <form action="{{ route('orcamentos.update', $orcamento) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="cliente_id">Cliente</label>
                <select id="cliente_id" name="cliente_id" class="form-control" required>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ $orcamento->cliente_id == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="kwp">KWp</label>
                <input type="text" id="kwp" name="kwp" class="form-control" value="{{ $orcamento->kwp }}" required>
            </div>
            <div class="form-group">
                <label for="orientacao">Orientação</label>
                <input type="text" id="orientacao" name="orientacao" class="form-control" value="{{ $orcamento->orientacao }}" required>
            </div>
            <div class="form-group">
                <label for="instalacao">Instalação</label>
                <input type="text" id="instalacao" name="instalacao" class="form-control" value="{{ $orcamento->instalacao }}" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="number" id="preco" name="preco" class="form-control" value="{{ $orcamento->preco }}" required step="0.01">
            </div>
            <div class="form-group">
                <label for="arquivo">Arquivo (opcional)</label>
                <input type="file" id="arquivo" name="arquivo" class="form-control">
                @if($orcamento->arquivo)
                    <p>Arquivo atual: <a href="{{ asset('storage/' . $orcamento->arquivo) }}" target="_blank">Visualizar</a></p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('orcamentos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
