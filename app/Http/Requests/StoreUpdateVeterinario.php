<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateVeterinario extends FormRequest
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
            'nome' => 'required|string|max:255',
            'crmv' => 'required|string|max:100|unique:veterinarios,crmv',
            'telefone' => 'required|string|max:20|unique:veterinarios,telefone',
            'email' => 'required|email|max:255|unique:veterinarios,email',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.max' => 'O campo nome não pode exceder 255 caracteres.',
            'crmv.required' => 'O campo CRMV é obrigatório.',
            'crmv.max' => 'O campo CRMV não pode exceder 100 caracteres.',
            'crmv.unique' => 'Este CRMV já está em uso.',
            'telefone.required' => 'O campo telefone é obrigatório.',
            'telefone.unique' => 'Este telefone já está em uso.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O campo email deve ser um endereço de email válido.',
            'email.max' => 'O campo email não pode exceder 255 caracteres.',
            'email.unique' => 'Este email já está em uso.',
        ];
    }
}
