<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePet extends FormRequest
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
            'nome' => 'required|string|max:255|min:3',
            //cada um desses tres campo sao valores definidos no select(lista fixa),por isso passar dessa fora é mas seguro e recomendado, pois evita que valores inesperados sejam inseridos
            'especie' => 'required|string|in:cachorro,gato', 
            'raca' => 'required|string|in:vira-lata,labrador,pastor-alemao,poodle,bulldog,siames,persa,maine-coon,ragdoll',
            'sexo' => 'required|string|in:Macho,Fêmea',
            'data_nascimento' => 'required|date',
            'tutor_id' => 'required|exists:tutors,id',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.max' => 'O campo nome não pode exceder 255 caracteres.',
            'nome.min' => 'O campo nome deve ter pelo menos 3 caracteres.',
            'especie.required' => 'O campo espécie é obrigatório.',
            'raca.required' => 'O campo raça é obrigatório.',
            'sexo.required' => 'O campo sexo é obrigatório.',
            'data_nascimento.required' => 'O campo data de nascimento é obrigatório.',
            'data_nascimento.date' => 'O campo data de nascimento deve ser uma data válida.',
            'tutor_id.required' => 'O campo tutor é obrigatório.',
            'tutor_id.exists' => 'O tutor selecionado é inválido.',
        ];
    }
}
