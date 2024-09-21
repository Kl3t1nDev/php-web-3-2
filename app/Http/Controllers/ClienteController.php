<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ClienteController extends Controller
{
    // Lista todos os clientes do usuário logado com opção de pesquisa
    public function index(Request $request)
    {
        $search = $request->query('search');
        
        $clientes = Cliente::where('user_id', Auth::id())
            ->when($search, function ($query, $search) {
                $query->where('nome', 'like', "%{$search}%")
                      ->orWhere('cpf', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('clientes.index', compact('clientes'));
    }

    // Mostra o formulário para criar um novo cliente
    public function create()
    {
        return view('clientes.create');
    }

    // Armazena um novo cliente no banco de dados
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return Redirect::route('login')->with('error', 'Você precisa estar autenticado para criar um cliente.');
        }

        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14',
            'data_nascimento' => 'required|date',
        ]);

        Cliente::create([
            'nome' => $request->input('nome'),
            'cpf' => $request->input('cpf'),
            'data_nascimento' => $request->input('data_nascimento'),
            'user_id' => Auth::id(),
        ]);

        return Redirect::route('clientes.index')->with('success', 'Cliente criado com sucesso.');
    }

    // Exibe os detalhes de um cliente específico
    public function show(Cliente $cliente)
    {
        if ($cliente->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para visualizar este cliente.');
        }

        return view('clientes.show', compact('cliente'));
    }

    // Mostra o formulário para editar um cliente existente
    public function edit(Cliente $cliente)
    {
        if ($cliente->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para editar este cliente.');
        }

        return view('clientes.edit', compact('cliente'));
    }

    // Atualiza um cliente existente no banco de dados
    public function update(Request $request, Cliente $cliente)
    {
        if ($cliente->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para atualizar este cliente.');
        }

        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14',
            'data_nascimento' => 'required|date',
        ]);

        $cliente->update($request->only(['nome', 'cpf', 'data_nascimento']));

        return Redirect::route('clientes.index')->with('success', 'Cliente atualizado com sucesso.');
    }

    // Remove um cliente do banco de dados
    public function destroy(Cliente $cliente)
    {
        if ($cliente->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para excluir este cliente.');
        }

        $cliente->delete();

        return Redirect::route('clientes.index')->with('success', 'Cliente excluído com sucesso.');
    }
}
