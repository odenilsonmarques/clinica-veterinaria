<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacina extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'fabricante', 'quantidade_estoque', 'validade'];

    public function vacinacoes()
    {
        return $this->hasMany(Vacinacao::class);
    }


    // Scope para filtro de busca de vacinas pelo nome ou pelo fabricante
    // O primeiro parâmetro é a query builder interna que o Eloquent está usando.
    // O segundo parâmetro é o valor que estamos passando para o escopo ao chamá-lo (neste caso, o termo de busca $search).
    public function scopeFilterVacina($query, $search)
    {
        if ($search) {
            $query->where('nome', 'LIKE', "%{$search}%")
                ->orWhere('fabricante', 'LIKE', "%{$search}%");
        }
    }
}
