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
}
