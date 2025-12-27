<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateVacina extends FormRequest
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
            'nome' => 'required|string|max:255|unique:vacinas,nome',
            'fabricante' => 'required|string|max:255',
            'quantidade_estoque' => 'required|integer|min:0',
            'validade' => 'required|date|after:today',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.max' => 'O campo nome não pode exceder 255 caracteres.',
            'nome.unique' => 'Esta vacina já está cadastrada.',
            'fabricante.required' => 'O campo fabricante é obrigatório.',
            'fabricante.max' => 'O campo fabricante não pode exceder 255 caracteres.',
            'quantidade_estoque.required' => 'O campo quantidade em estoque é obrigatório.',
            'quantidade_estoque.integer' => 'O campo quantidade em estoque deve ser um número inteiro.',
            'quantidade_estoque.min' => 'O campo quantidade em estoque não pode ser negativo.',
            'validade.required' => 'O campo validade é obrigatório.',
            'validade.date' => 'O campo validade deve ser uma data válida.',
            'validade.after' => 'A validade deve ser uma data futura.',
        ];
    }
}
