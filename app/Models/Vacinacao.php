<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    // Scope para filtro de vacinação
    public function scopeFilterVacinacao($query, $search)
    {
        if ($search) {
            $query->whereHas('pet', function ($q) use ($search) {
                $q->where('nome', 'LIKE', "%{$search}%");
            })->orWhereHas('vacina', function ($q) use ($search) {
                $q->where('nome', 'LIKE', "%{$search}%");
            })->orWhereHas('veterinario', function ($q) use ($search) {
                $q->where('nome', 'LIKE', "%{$search}%")
                    ->orWhere('crmv', 'LIKE', "%{$search}%");
            });
        }
    }

    // Scope para Vacinas vencidas
    public function scopeVacinasVencidas($query)
    {
        return $query->whereNotNull('proxima_dose')
            ->whereDate('proxima_dose', '<', Carbon::today());
    }

    // Scope para Vacinas próximas do vencimento (30 dias)
    public function scopeVacinasProximasDoVencimento($query, $dias = 30)
    {
        return $query->whereNotNull('proxima_dose')
            ->whereBetween('proxima_dose', [
                Carbon::today(),
                Carbon::today()->addDays($dias)
            ]);
    }

    // Acessor para status da vacinação (esta lógica pode ser usada na view, mas é interessante ter aqui para reutilização e por boas práticas)
    public function getStatusAttribute()
    {
        if (!$this->proxima_dose) {
            return null;
        }

        $hoje = \Carbon\Carbon::today();

        if ($this->proxima_dose < $hoje) {
            return 'vencida';
        }

        if ($this->proxima_dose <= $hoje->copy()->addDays(30)) {
            return 'proxima';
        }

        return 'em_dia';
    }
}
