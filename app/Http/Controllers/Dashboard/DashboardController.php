<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Vacinacao;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Captura o termo digitado no input de busca
        $search = $request->input('search');
        // Após capturar o termo, aplica o scope(definido na model Pet). Lembrando que o nome do scope na model tem um prefixo "scope" aqui passamos o nome sem o prefixo e mantém paginação
        $pets = Pet::with('tutor')
            ->orderBy('nome', 'asc')
            ->FilterPetWithTutor($search)
            ->paginate(5)
            // mantém o termo na paginação
            ->appends(['search' => $search]);


        // scope para Vacinas vencidas
        $vacinasVencidas = Vacinacao::with(['pet', 'vacina'])
            ->VacinasVencidas()
            ->get();

        // scope para Vacinas próximas do vencimento (30 dias)
        $vacinasProximas = Vacinacao::with(['pet', 'vacina'])
            ->VacinasProximasDoVencimento(30)
            ->get();

        return view('dashboard.index', compact(
            'pets',
            'vacinasVencidas',
            'vacinasProximas'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
