<?php

namespace App\Http\Controllers;

use App\Models\Orcamento;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrcamentoController extends Controller
{
    // Lista todos os orçamentos do usuário logado com opção de pesquisa
    public function index(Request $request)
    {
        $query = Orcamento::where('user_id', auth()->id());

        // Verificar se há um cliente_id na solicitação
        if ($request->has('cliente_id')) {
            $clienteId = $request->input('cliente_id');
            $query->where('cliente_id', $clienteId);
        }

        // Pesquisa genérica
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
        $clientes = Cliente::where('user_id', auth()->id())->get();
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
            'arquivo' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        $data = $request->except('arquivo');
        
        if ($request->hasFile('arquivo')) {
            $file = $request->file('arquivo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public', $filename);
            $data['arquivo'] = $filename;
        }

        $data['user_id'] = auth()->id(); // Atribuir o ID do usuário autenticado

        Orcamento::create($data);

        return redirect()->route('orcamentos.index')->with('success', 'Orçamento criado com sucesso.');
    }

    // Exibe os detalhes de um orçamento específico
    public function show(Orcamento $orcamento)
    {
        if ($orcamento->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('orcamentos.show', compact('orcamento'));
    }

    // Mostra o formulário para editar um orçamento existente
    public function edit(Orcamento $orcamento)
    {
        if ($orcamento->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        $clientes = Cliente::where('user_id', auth()->id())->get();
        return view('orcamentos.edit', compact('orcamento', 'clientes'));
    }

    // Atualiza um orçamento existente no banco de dados
    public function update(Request $request, Orcamento $orcamento)
    {
        if ($orcamento->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'kwp' => 'required|string|max:255',
            'orientacao' => 'required|string|max:255',
            'instalacao' => 'required|string|max:255',
            'preco' => 'required|numeric',
            'arquivo' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        $data = $request->except('arquivo');
        
        if ($request->hasFile('arquivo')) {
            // Remove o arquivo antigo se existir
            if ($orcamento->arquivo) {
                Storage::delete('public/' . $orcamento->arquivo);
            }

            $file = $request->file('arquivo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public', $filename);
            $data['arquivo'] = $filename;
        }

        $orcamento->update($data);

        return redirect()->route('orcamentos.index')->with('success', 'Orçamento atualizado com sucesso.');
    }

    // Remove um orçamento do banco de dados
    public function destroy(Orcamento $orcamento)
    {
        if ($orcamento->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        // Remove o arquivo associado se existir
        if ($orcamento->arquivo) {
            Storage::delete('public/' . $orcamento->arquivo);
        }

        $orcamento->delete();

        return redirect()->route('orcamentos.index')->with('success', 'Orçamento excluído com sucesso.');
    }
}
