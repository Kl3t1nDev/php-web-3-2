<!DOCTYPE html>
<html>
<head>
    <title>Criar Orçamento</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-4">
        <h1>Criar Orçamento</h1>
        <form action="{{ route('orcamentos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="cliente_id">Cliente</label>
                <select name="cliente_id" class="form-control" id="cliente_id" required>
                    <option value="">Selecione um cliente</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="kwp">KWp</label>
                <input type="text" name="kwp" class="form-control" id="kwp" required>
            </div>
            <div class="form-group">
                <label for="orientacao">Orientação</label>
                <input type="text" name="orientacao" class="form-control" id="orientacao" required>
            </div>
            <div class="form-group">
                <label for="instalacao">Instalação</label>
                <input type="text" name="instalacao" class="form-control" id="instalacao" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="text" name="preco" class="form-control" id="preco" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('orcamentos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
