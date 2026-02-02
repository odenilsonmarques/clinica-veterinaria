@extends('layouts.template')

@section('title', 'Lista de Tutores')

@section('content')
    <div class="container-fluid">
        <div class="row">

            @include('partials.sidebar')

            <!-- CONTEÚDO PRINCIPAL -->
            <main class="col-md-10 px-4 py-0">

                <div class="row">
                    <div class="col text-center">
                        @if (session('success'))
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Sucesso!",
                                        text: "{{ session('success') }}",
                                        confirmButtonText: "Ok"
                                    });
                                });
                            </script>
                        @endif
                    </div>
                </div>

                <div class="row mt-5">
            @if ($tutors->isEmpty())
                <div class="alert alert-info d-flex flex-column align-items-center py-4 mt-3">
                    <p class="mb-3">Tutor não encontrado.</p>
                    <div class="d-flex gap-2">
                        <a href="{{ route('tutors.index') }}" class="btn btn-secondary">
                            Voltar para lista de tutores
                        </a>
                    </div>
                </div>
            @else
                {{-- Linha do filtro + botão cadastrar --}}
                <div class="d-flex justify-content-between align-items-center mb-3">

                    {{-- Form de busca --}}
                    <form method="GET" action="" class="d-flex gap-2">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control"
                                placeholder="Buscar tutor por nome ou número" value="{{ request('search') }}">
                            <button type="submit"
                                class="btn btn-search-custom d-flex align-items-center justify-content-center px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </button>
                        </div>

                        <a href="{{ route('tutors.index') }}" class="btn btn-outline-secondary">
                            Limpar
                        </a>
                    </form>

                    {{-- Botão Cadastrar --}}
                    <a href="{{ route('tutors.create') }}" class="btn btn-sm btn-custom-add">
                        Cadastrar Tutor
                    </a>

                </div>
            @endif
        </div>


        <div class="table-responsive mt-1">
            <table class="table   table-hover caption-top">
                <caption class="">Tutores</caption>
                <thead class="thead-custom">
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tutors as $tutor)
                        <tr>
                            <td>{{ $tutor->nome }}</td>
                            <td>{{ $tutor->telefone }}</td>
                            <td>{{ $tutor->email }}</td>
                            <td>
                                <a href="#" class="btn btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg>
                                </a>
                                <form action="#" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm"
                                        onclick="return confirm('Tem certeza que deseja excluir este tutor?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- paginação --}}
            <div class="d-flex justify-content-end pagination pagination-sm">
                {{ $tutors->links('pagination::bootstrap-4') }}
            </div>
        </div>

            </main>
        </div>
    </div>
@endsection
