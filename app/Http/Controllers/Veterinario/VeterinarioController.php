<?php

namespace App\Http\Controllers\Veterinario;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateVeterinario;
use Illuminate\Http\Request;
use App\Models\Veterinario;

class VeterinarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Captura o termo digitado no input de busca
        $search = request()->input('search');
        // Após capturar o termo, aplica o scope(definido na model Veterinario). Lembrando que o nome do scope na model tem um prefixo "scope" aqui passamos o nome sem o prefixo e mantém paginação
        $veterinarios = Veterinario::orderBy('nome')
            ->filterVeterinario($search)
            ->paginate(5)
            ->appends(['search' => $search]);
        return view('veterinarios.index', compact('veterinarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('veterinarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateVeterinario $request)
    {
        // Validação dos dados recebidos
        // $validatedData = $request->validate([
        //     'nome' => 'required|string|max:255',
        //     'crmv' => 'required|string|max:100|unique:veterinarios,crmv',
        //     'telefone' => 'nullable|string|max:20',
        //     'email' => 'nullable|email|max:255',
        // ]);

        // dd($validatedData);

        // Criação do novo veterinário

        Veterinario::create($request->validated());

        // Redirecionamento após o salvamento
        return redirect()->route('veterinarios.index')->with('success', 'Veterinário cadastrado com sucesso!');
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
