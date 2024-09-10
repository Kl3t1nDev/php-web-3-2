<?php

namespace App\Http\Controllers;

use App\Models\Orcamento;
use App\Models\Cliente;
use Illuminate\Http\Request;

class OrcamentoController extends Controller
{
    // Lista todos os orçamentos com opção de pesquisa
    public function index(Request $request)
    {
        $query = Orcamento::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('kwp', 'like', "%{$search}%")
                ->orWhere('orientacao', 'like', "%{$search}%")
                ->orWhere('instalacao', 'like', "%{$search}%")
                ->orWhere('preco', 'like', "%{$search}%");
            });
        }

    $orcamentos = $query->paginate(10);
    return view('orcamentos.index', compact('orcamentos'));
    }

    // Mostra o formulário para criar um novo orçamento
    public function create()
    {
        $clientes = Cliente::all();
        return view('orcamentos.create', compact('clientes'));
    }

    // Armazena um novo orçamento no banco de dados
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'kwp' => 'required|string|max:255',
            'orientacao' => 'required|string|max:255',
            'instalacao' => 'required|string|max:255',
            'preco' => 'required|numeric',
        ]);

        Orcamento::create($request->all());

        return redirect()->route('orcamentos.index')->with('success', 'Orçamento criado com sucesso.');
    }

    // Exibe os detalhes de um orçamento específico
    public function show(Orcamento $orcamento)
    {
        return view('orcamentos.show', compact('orcamento'));
    }

    // Mostra o formulário para editar um orçamento existente
    public function edit(Orcamento $orcamento)
    {
        $clientes = Cliente::all();
        return view('orcamentos.edit', compact('orcamento', 'clientes'));
    }

    // Atualiza um orçamento existente no banco de dados
    public function update(Request $request, Orcamento $orcamento)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'kwp' => 'required|string|max:255',
            'orientacao' => 'required|string|max:255',
            'instalacao' => 'required|string|max:255',
            'preco' => 'required|numeric',
        ]);

        $orcamento->update($request->all());

        return redirect()->route('orcamentos.index')->with('success', 'Orçamento atualizado com sucesso.');
    }

    // Remove um orçamento do banco de dados
    public function destroy(Orcamento $orcamento)
    {
        $orcamento->delete();

        return redirect()->route('orcamentos.index')->with('success', 'Orçamento excluído com sucesso.');
    }
}
