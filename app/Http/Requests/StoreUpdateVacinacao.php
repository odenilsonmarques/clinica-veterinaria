<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateVacinacao extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'pet_id' => 'required|exists:pets,id',
            'vacina_id' => 'required|exists:vacinas,id',
            'veterinario_id' => 'required|exists:veterinarios,id',
            'data_aplicacao' => 'required|date',
            'proxima_dose' => 'nullable|date|after:data_aplicacao',
            'observacoes' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'pet_id.required' => 'O campo Pet é obrigatório.',
            'pet_id.exists' => 'O Pet selecionado não existe.',
            'vacina_id.required' => 'O campo Vacina é obrigatório.',
            'vacina_id.exists' => 'A Vacina selecionada não existe.',
            'veterinario_id.required' => 'O campo Veterinário é obrigatório.',
            'veterinario_id.exists' => 'O Veterinário selecionado não existe.',
            'data_aplicacao.required' => 'O campo Data de Aplicação é obrigatório.',
            'data_aplicacao.date' => 'O campo Data de Aplicação deve ser uma data válida.',
            'proxima_dose.date' => 'O campo Próxima Dose deve ser uma data válida.',
            'proxima_dose.after' => 'O campo Próxima Dose deve ser uma data posterior à Data de Aplicação.',
            'observacoes.string' => 'O campo Observações deve ser uma string.',
            'observacoes.max' => 'O campo Observações não pode exceder 255 caracteres.',
        ];
    }
}
