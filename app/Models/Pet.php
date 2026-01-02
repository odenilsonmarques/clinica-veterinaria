<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'especie',
        'raca',
        'sexo',
        'data_nascimento',
        'tutor_id'
    ];


    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function vacinacoes()
    {
        return $this->hasMany(Vacinacao::class);
    }



    // Scope para filtro de busca de pets pelo nome
    // O primeiro parâmetro é a query builder interna que o Eloquent está usando.
    // O segundo parâmetro é o valor que estamos passando para o escopo ao chamá-lo (neste caso, o termo de busca $search).
    public function scopeFilterPet($query, $search)
    {
        if (!empty($search)) {
            $query->where('nome', 'LIKE', "%{$search}%");
        }
    }

    // scope para ser usado no dashboard
    public function scopeFilterPetWithTutor($query, $search)
    {
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('nome', 'LIKE', "%{$search}%")
                    ->orWhereHas('tutor', function ($q) use ($search) {
                        $q->where('nome', 'LIKE', "%{$search}%");
                    });
            });
        }
    }
}
