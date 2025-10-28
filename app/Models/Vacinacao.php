<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacinacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'vacina_id',
        'veterinario_id',
        'data_aplicacao',
        'proxima_dose',
        'observacoes'
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function vacina()
    {
        return $this->belongsTo(Vacina::class);
    }

    public function veterinario()
    {
        return $this->belongsTo(Veterinario::class);
    }
}
