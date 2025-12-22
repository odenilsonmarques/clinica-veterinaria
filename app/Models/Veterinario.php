<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veterinario extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'crmv', 'telefone', 'email'];

    public function vacinacoes()
    {
        return $this->hasMany(Vacinacao::class);
    }


    // Scope para filtro de busca de veterinários pelo nome ou pelo CRMV
    // O primeiro parâmetro é a query builder interna que o Eloquent está usando.
    // O segundo parâmetro é o valor que estamos passando para o escopo ao chamá-lo (neste caso, o termo de busca $search).
    public function scopeFilterVeterinario($query, $search)
    {
        if ($search) {
            $query->where('nome', 'LIKE', "%{$search}%")
                  ->orWhere('crmv', 'LIKE', "%{$search}%");
        }
    }
}
