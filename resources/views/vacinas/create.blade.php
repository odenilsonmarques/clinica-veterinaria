@extends('layouts.template')
@section('title', 'Cadastro de Vacina')
@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('vacinas.store') }}" method="POST">
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
                                    <label for="nome" class="text-dark required">Nome da Vacina</label>
                                    <input type="text" id="nome" name="nome"
                                        class="form-control @error('nome') is-invalid @enderror" value="{{ old('nome') }}"
                                        required>
                                    @error('nome')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="fabricante" class="text-dark required">Fabricante</label>
                                    <input type="text" id="fabricante" name="fabricante"
                                        class="form-control @error('fabricante') is-invalid @enderror"
                                        value="{{ old('fabricante') }}" required>
                                    @error('fabricante')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="quantidade_estoque" class="text-dark required">Quantidade em Estoque</label>
                                    <input type="number" id="quantidade_estoque" name="quantidade_estoque"
                                        class="form-control @error('quantidade_estoque') is-invalid @enderror"
                                        value="{{ old('quantidade_estoque') }}" required min="0">
                                    @error('quantidade_estoque')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="validade" class="text-dark required">Data de Validade</label>
                                    <input type="date" id="validade" name="validade"
                                        class="form-control @error('validade') is-invalid @enderror"
                                        value="{{ old('validade') }}" required>
                                    @error('validade')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-custom-add mt-3">Adicionar Vacina</button>
                        <a href="{{ route('vacinas.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
