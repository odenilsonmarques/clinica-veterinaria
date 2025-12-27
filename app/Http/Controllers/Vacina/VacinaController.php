<?php

namespace App\Http\Controllers\Vacina;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateVacina;
use Illuminate\Http\Request;
use App\Models\Vacina;

class VacinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Captura o termo digitado no input de busca
        $search = request()->input('search');

        // Após capturar o termo, aplica o scope(definido na model Vacina). Lembrando que o nome do scope na model tem um prefixo "scope" aqui passamos o nome sem o prefixo e mantém paginação
       $vacinas = Vacina::orderBy('nome')
            ->filterVacina($search)
            ->paginate(5)
            ->appends(['search' => $search]);
        return view('vacinas.index', compact('vacinas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vacinas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateVacina $request)
    {
        // Lógica para armazenar a vacina
        // $validatedData = $request->validate([
        //     'nome' => 'required|string|max:255',
        //     'fabricante' => 'required|string|max:255',
        //     'quantidade_estoque' => 'required|integer|min:0',
        //     'validade' => 'required|date',
        // ]);

        // dd($validatedData);
        Vacina::create($request->validated());

        return redirect()->route('vacinas.index')->with('success', 'Vacina cadastrada com sucesso.');
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
