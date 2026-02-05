<?php

namespace App\Http\Controllers\Carteira;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Pet;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function pdf(Pet $pet)
    {
        $pet->load([
            'tutor',
            'vacinacoes.vacina',
            'vacinacoes.veterinario',
        ]);

        $pdf = Pdf::loadView('carteira.pdf', compact('pet'))
            ->setPaper('a4', 'portrait');

        return $pdf->download("carteira-{$pet->nome}-{$pet->id}.pdf");
    }

    public function viewPdf(Pet $pet)
    {
        $pet->load([
            'tutor',
            'vacinacoes.vacina',
            'vacinacoes.veterinario',
        ]);

        $pdf = Pdf::loadView('carteira.pdf', compact('pet'))
            ->setPaper('a4', 'portrait');

        return $pdf->stream("carteira-{$pet->nome}-{$pet->id}.pdf");
    }
}
