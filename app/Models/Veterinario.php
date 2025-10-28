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
}
