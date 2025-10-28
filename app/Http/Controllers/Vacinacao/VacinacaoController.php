<?php

namespace App\Http\Controllers\Vacinacao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Vacina;
use App\Models\Veterinario;
use App\Models\Vacinacao;

class VacinacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vacinacoes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pets = Pet::all();
        $vacinas = Vacina::all();
        $veterinarios = Veterinario::all();
        return view('vacinacoes.create', compact('pets', 'vacinas', 'veterinarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validatedData = $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'vacina_id' => 'required|exists:vacinas,id',
            'veterinario_id' => 'required|exists:veterinarios,id',
            'data_aplicacao' => 'required|date',
            'proxima_dose' => 'nullable|date|after:data_aplicacao',
            'observacoes' => 'nullable|string|max:255',
        ]);

        // dd($validatedData);

        // Criação da nova vacinação
        // Supondo que exista um modelo Vacinacao
        Vacinacao::create($validatedData);

        // Redireciona para a lista de vacinações com uma mensagem de sucesso
        return redirect()->route('vacinacoes.index')->with('success', 'Vacinação registrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
