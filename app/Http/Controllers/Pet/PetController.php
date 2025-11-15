<?php

namespace App\Http\Controllers\Pet;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePet;
use Illuminate\Http\Request;
use App\Models\Tutor;
use App\Models\Pet;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        // Captura o termo de digitado no input de busca
        $search = $request->input('search');
        // Após capturar o termo, aplica o scope(definido na model Pet). Lembrando que o nome do scope na model tem um prefixo "scope" aqui passamos o nome sem o prefixo e mantém paginação
        $pets = Pet::orderBy('nome')
            ->FilterPet($search)
            ->paginate(5)
            ->appends(['search' => $search]); // mantém o termo na paginação

        return view('pets.index', compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tutors = Tutor::all();
        return view('pets.create', compact('tutors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdatePet $request)
    {
        // Validate and store the pet data
        $validatedData = $request->validated();
        // dd($validatedData);
        Pet::create($validatedData);

        return redirect()->route('pets.index')->with('success', 'Pet criado com sucesso.');
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
