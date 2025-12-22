@extends('layouts.template')
@section('title', 'Cadastro de Veterinário')
@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('veterinarios.store') }}" method="POST">
                @csrf
                <div class="card mt-3">
                    <div class="card-header d-flex align-items-center text-white  rounded-top">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-person-circle me-2" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>
                        Identificação do Veterinário
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="nome" class="text-dark required">Nome</label>
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
                                    <label for="crmv" class="text-dark required">CRMV</label>
                                    <input type="text" id="crmv" name="crmv"
                                        class="form-control @error('crmv') is-invalid @enderror" value="{{ old('crmv') }}"
                                        required>
                                    @error('crmv')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="telefone" class="text-dark required">Telefone</label>
                                    <input type="text" id="telefone" name="telefone"
                                        class="form-control @error('telefone') is-invalid @enderror"
                                        value="{{ old('telefone') }}" required>
                                    @error('telefone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="email" class="text-dark required">Email</label>
                                    <input type="email" id="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-custom-add mt-3">Cadastrar</button>
                        <a href="{{ route('veterinarios.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
