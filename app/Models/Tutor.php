<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'telefone', 'email', 'endereco'];


    public function pets()
    {
        return $this->hasMany(Pet::class);
    }


    // criando um mutator para remover a máscara do campo telefone ao salvar no banco de dados, deixando essa mascara apenas no front-end
    // o value é o valor que está sendo atribuído ao atributo telefone, então usamos preg_replace para remover todos os caracteres que não são dígitos
    public function setTelefoneAttribute($value)
    {
        $this->attributes['telefone'] = preg_replace('/\D/', '', $value);
    }


    // Scope para filtro de busca de tutores pelo nome
    // O primeiro parâmetro é a query builder interna que o Eloquent está usando.
    // O segundo parâmetro é o valor que estamos passando para o escopo ao chamá-lo (neste caso, o termo de busca $search).
    public function scopeFilterTutor($query, $search)
    {
        if ($search) {
            $query->where('nome', 'LIKE', "%{$search}%");
        }
    }   
}
