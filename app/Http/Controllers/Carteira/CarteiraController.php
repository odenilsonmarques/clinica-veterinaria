<?php

namespace App\Http\Controllers\Carteira;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Pet;

class CarteiraController extends Controller
{
   
    public function show(Pet $pet)
    {
        $pet->load([
            'tutor',
            'vacinacoes.vacina',
            'vacinacoes.veterinario',
        ]);
        return view('carteira.show', compact('pet'));
    }
}
