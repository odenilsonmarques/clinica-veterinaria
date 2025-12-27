@extends('layouts.template')
@section('title', 'Registro de Vacinação')
@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('vacinacoes.store') }}" method="POST">
                @csrf
                <div class="card mt-3">
                    <div class="card-header d-flex align-items-center text-white  rounded-top">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-person-circle me-2" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>
                        Identificação da Vacina
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="pet_id" class="text-dark required">Pet:</label>
                                    <select name="pet_id" id="pet_id" class="form-control"
                                        @error('pet_id') is-invalid @enderror value="{{ old('pet_id') }}" required>
                                        <option value="">Selecione um pet</option>
                                        @foreach ($pets as $pet)
                                            <option value="{{ $pet->id }}"
                                                {{ old('pet_id') == $pet->id ? 'selected' : '' }}>
                                                {{ $pet->nome }}</option>
                                        @endforeach
                                    </select>
                                    @error('pet_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="vacina_id" class="text-dark required">Vacina:</label>
                                    <select name="vacina_id" id="vacina_id" class="form-control"
                                        @error('vacina_id') is-invalid @enderror value="{{ old('vacina_id') }}" required>
                                        <option value="">Selecione uma vacina</option>
                                        @foreach ($vacinas as $vacina)
                                            <option value="{{ $vacina->id }}"
                                                {{ old('vacina_id') == $vacina->id ? 'selected' : '' }}>
                                                {{ $vacina->nome }}</option>
                                        @endforeach
                                    </select>
                                    @error('vacina_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="veterinario_id" class="text-dark required">Veterinário:</label>
                                    <select name="veterinario_id" id="veterinario_id" class="form-control"
                                        @error('veterinario_id') is-invalid @enderror value="{{ old('veterinario_id') }}"
                                        required>
                                        <option value="">Selecione um veterinário</option>
                                        @foreach ($veterinarios as $veterinario)
                                            <option value="{{ $veterinario->id }}"
                                                {{ old('veterinario_id') == $veterinario->id ? 'selected' : '' }}>
                                                {{ $veterinario->nome }}</option>
                                        @endforeach
                                    </select>
                                    @error('veterinario_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="data_aplicacao" class="text-dark required">Data da Vacinação:</label>
                                    <input type="date" id="data_aplicacao" name="data_aplicacao"
                                        class="form-control @error('data_aplicacao') is-invalid @enderror"
                                        value="{{ old('data_aplicacao') }}" required>
                                    @error('data_aplicacao')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="proxima_dose" class="text-dark">Próxima Dose:</label>
                                    <input type="date" id="proxima_dose" name="proxima_dose"
                                        class="form-control @error('proxima_dose') is-invalid @enderror"
                                        value="{{ old('proxima_dose') }}">
                                    @error('proxima_dose')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="observacoes" class="text-dark">Observações:</label>
                                    <textarea id="observacoes" name="observacoes" class="form-control" @error('observacoes') is-invalid @enderror>{{ old('observacoes') }}</textarea>
                                    @error('observacoes')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-custom-add mt-3">Registrar Vacinação</button>
                        <a href="{{ route('vacinacoes.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
