@extends('layouts.template')
@section('title', 'Cadastro de pet')
@section('content')

    <div class="container">
        <div class="row">
            <form action="{{ route('pets.store') }}" method="POST">
                @csrf
                <div class="card mt-3">
                    <div class="card-header d-flex align-items-center text-white  rounded-top">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-gitlab me-2" viewBox="0 0 16 16">
                            <path
                                d="m15.734 6.1-.022-.058L13.534.358a.57.57 0 0 0-.563-.356.6.6 0 0 0-.328.122.6.6 0 0 0-.193.294l-1.47 4.499H5.025l-1.47-4.5A.572.572 0 0 0 2.47.358L.289 6.04l-.022.057A4.044 4.044 0 0 0 1.61 10.77l.007.006.02.014 3.318 2.485 1.64 1.242 1 .755a.67.67 0 0 0 .814 0l1-.755 1.64-1.242 3.338-2.5.009-.007a4.05 4.05 0 0 0 1.34-4.668Z" />
                        </svg>
                        Identificação do Pet
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="nome" class="text-dark required">Nome do pet</label>
                                    <input type="text" id="nome" name="nome" class="form-control"
                                        @error('nome') is-invalid @enderror value="{{ old('nome') }}" required>

                                    @error('nome')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="tutor_id" class="text-dark required">Tutor</label>
                                    <select id="tutor_id" name="tutor_id" class="form-control"
                                        @error('tutor_id') is-invalid @enderror required>
                                        <option value="">Selecione um tutor</option>
                                        @foreach ($tutors as $tutor)
                                            <option value="{{ $tutor->id }}"
                                                {{ old('tutor_id') == $tutor->id ? 'selected' : '' }}>
                                                {{ $tutor->nome }}</option>
                                        @endforeach
                                    </select>

                                    @error('tutor_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-4">
                                    <label for="especie" class="text-dark required">Espécie</label>
                                    <select id="especie" name="especie"
                                        class="form-control @error('especie') is-invalid @enderror" required>
                                        <option value="">Selecione...</option>
                                        <option value="cachorro" {{ old('especie') == 'cachorro' ? 'selected' : '' }}>
                                            Cachorro</option>
                                        <option value="gato" {{ old('especie') == 'gato' ? 'selected' : '' }}>
                                            Gato</option>
                                    </select>

                                    @error('especie')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-4">
                                    <label for="raca" class="text-dark required">Raça</label>
                                    <select id="raca" name="raca"
                                        class="form-control @error('raca') is-invalid @enderror" required>
                                        <option value="">Selecione...</option>

                                        <optgroup label="Cachorro">
                                            <option value="vira-lata" {{ old('raca') == 'vira-lata' ? 'selected' : '' }}>
                                                Vira-lata</option>
                                            <option value="labrador" {{ old('raca') == 'labrador' ? 'selected' : '' }}>
                                                Labrador</option>
                                            <option value="pastor-alemao"
                                                {{ old('raca') == 'pastor-alemao' ? 'selected' : '' }}>Pastor Alemão
                                            </option>
                                            <option value="poodle" {{ old('raca') == 'poodle' ? 'selected' : '' }}>Poodle
                                            </option>
                                            <option value="bulldog" {{ old('raca') == 'bulldog' ? 'selected' : '' }}>
                                                Bulldog</option>
                                        </optgroup>

                                        <optgroup label="Gato">
                                            <option value="vira-lata" {{ old('raca') == 'vira-lata' ? 'selected' : '' }}>
                                                Vira-lata</option>
                                            <option value="siames" {{ old('raca') == 'siames' ? 'selected' : '' }}>Siamês
                                            </option>
                                            <option value="persa" {{ old('raca') == 'persa' ? 'selected' : '' }}>Persa
                                            </option>
                                            <option value="maine-coon" {{ old('raca') == 'maine-coon' ? 'selected' : '' }}>
                                                Maine Coon</option>
                                            <option value="ragdoll" {{ old('raca') == 'ragdoll' ? 'selected' : '' }}>
                                                Ragdoll</option>
                                        </optgroup>
                                    </select>
                                    @error('raca')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-3">
                                <div class="mb-4">
                                    <label for="sexo" class="text-dark required">Sexo</label>
                                    <select id="sexo" name="sexo" class="form-control" required
                                        @error('sexo') is-invalid @enderror>
                                        <option value="">Selecione</option>
                                        <option value="Macho" {{ old('sexo') == 'Macho' ? 'selected' : '' }}>Macho
                                        </option>
                                        <option value="Fêmea" {{ old('sexo') == 'Fêmea' ? 'selected' : '' }}>Fêmea
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-4">
                                    <label for="data_nascimento" class="text-dark required">Data de Nascimento</label>
                                    <input type="date" id="data_nascimento" name="data_nascimento" class="form-control"
                                        @error('data_nascimento') is-invalid @enderror value="{{ old('data_nascimento') }}"
                                        required>
                                    @error('data_nascimento')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-custom-add mt-3">Cadastrar</button>
                        <a href="{{ route('pets.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
