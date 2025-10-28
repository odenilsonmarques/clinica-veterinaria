<?php

namespace App\Http\Controllers\Pet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor;
use App\Models\Pet;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pets.index');
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
    public function store(Request $request)
    {
        // Validate and store the pet data
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'especie' => 'required|string|max:100',
            'raca' => 'nullable|string|max:100',
            'idade' => 'nullable|integer|min:0',
            'sexo' => 'nullable|string|max:10',
            'data_nascimento' => 'nullable|date',
            'tutor_id' => 'required|exists:tutors,id',
        ]);
        // dd($validatedData);
        // Here you would typically save the data to the database
        Pet::create($validatedData);

        return redirect()->route('pets.index')->with('success', 'Pet created successfully.');
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
