@extends('layouts.template')
@section('title', 'Cadastro de Tutor')
@section('content')

    <div class="container">
        <div class="row">

            <form action="{{ route('pets.store') }}" method="POST">
                @csrf
                <div class="card mt-3">
                    <div class="card-header d-flex align-items-center text-white  rounded-top">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-person-circle me-2" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>
                        Identificação do Pet
                    </div>
                    <div>
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" required>
                    </div>

                    <div>
                        <label for="especie">Espécie:</label>
                        <input type="text" id="especie" name="especie" required>
                    </div>

                    <div>
                        <label for="raca">Raça:</label>
                        <input type="text" id="raca" name="raca">
                    </div>

                    <div>
                        <label for="sexo">Sexo:</label>
                        <select id="sexo" name="sexo" required>
                            <option value="">Selecione</option>
                            <option value="Macho">Macho</option>
                            <option value="Fêmea">Fêmea</option>
                        </select>
                    </div>

                    <div>
                        <label for="data_nascimento">Data de Nascimento:</label>
                        <input type="date" id="data_nascimento" name="data_nascimento">
                    </div>

                    <div>
                        <label for="tutor_id">Tutor:</label>
                        <select id="tutor_id" name="tutor_id" required>
                            <option value="">Selecione um tutor</option>
                            @foreach ($tutors as $tutor)
                                <option value="{{ $tutor->id }}">{{ $tutor->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit">Cadastrar Pet</button>
                </div>
            </form>
        </div>

    </div>

@endsection
