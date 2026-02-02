@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row">

            @include('partials.sidebar')

            <!-- CONTEÚDO PRINCIPAL -->
            <main class="col-md-10 px-4 py-0">
                
                <!-- FILTROS -->
                <div class="card mb-4 border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            {{-- Form de busca --}}
                            <form method="GET" action="" class="d-flex gap-2">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control"
                                        placeholder="Buscar por pet ou tutor" value="{{ request('search') }}">
                                    <button type="submit"
                                        class="btn btn-search-custom d-flex align-items-center justify-content-center px-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                        </svg>
                                    </button>
                                </div>
                                <a href="{{ route('dashboard.index') }}" class="btn btn-outline-secondary">
                                    Limpar
                                </a>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- CONTEÚDO CENTRAL -->
                <div class="row">
                    <!-- TABELA -->
                    <div class="col-md-8 border-0">
                        <div class="card border-0">
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead class="thead-custom">
                                        <tr>
                                            <th>Pet</th>
                                            <th>Espécie</th>
                                            <th>Tutor</th>
                                            <th>Carteira</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pets as $pet)
                                            <tr>
                                                <td>{{ $pet->nome }}</td>
                                                <td>{{ ucfirst($pet->especie) }}</td>
                                                <td>{{ $pet->tutor->nome }}</td>

                                                <td class="">
                                                    <!-- Ver carteira -->
                                                    <a href="{{ route('carteira.show', $pet->id) }}" class="btn btn-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" fill="currentColor"
                                                            class="bi bi-card-checklist" viewBox="0 0 16 16">
                                                            <path
                                                                d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z" />
                                                            <path
                                                                d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0M7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted">
                                                    Nenhum pet encontrado.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{-- paginação --}}
                                <div class="d-flex justify-content-end pagination pagination-sm">
                                    {{ $pets->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ALERTAS -->
                    <div class="col-md-4">
                        <div class="card bg-light border-0">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3">Alertas</h6>

                                <!-- Vacinas vencidas -->
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-danger fw-bold d-flex align-items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                        </svg>
                                        {{ $vacinasVencidasCount }} vacinas vencidas
                                    </span>
                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalVencidas">
                                        Ver
                                    </button>
                                </div>

                                <!-- Vacinas próximas -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-warning fw-bold d-flex align-items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0l-5.708 9.7a1.13 1.13 0 0 0 .98 1.734h11.396a1.13 1.13 0 0 0 .98-1.734l-5.708-9.7zM8 5c.535 0 .954.462.894 1.031l-.708 5.957a.375.375 0 0 1-.75 0l-.708-5.956A.375.375 0 0 1 8 5zm.002 6a.5.5 0 1 1 0 1 .5.5 0 0 1 0-1z"/>
                                        </svg>
                                        {{ $vacinasProximasCount }} vacinas próximas
                                    </span>
                                    <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal"
                                        data-bs-target="#modalProximas">
                                        Ver
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                    @include('partials.modals_vacinas')
                </div>
            </main>
        </div>
    </div>
@endsection
