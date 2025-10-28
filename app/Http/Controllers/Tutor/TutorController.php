<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor;
use App\Http\Requests\StoreUpdateTutor;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tutors.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tutors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateTutor $request)
    {
        // Validate and store the tutor data
        // $validatedData = $request->validate([
        //     'nome' => 'required|string|max:255',
        //     'email' => 'required|email|unique:tutors,email',
        //     'telefone' => 'nullable|string|max:20',
        //     'endereco' => 'nullable|string|max:255',
        // ]);

        Tutor::create($request->validated());

        // dd($validatedData);
        // Here you would typically save the data to the database
        // Tutor::create($validatedData);

        return redirect()->route('tutors.index')->with('success', 'Tutor created successfully.');
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
