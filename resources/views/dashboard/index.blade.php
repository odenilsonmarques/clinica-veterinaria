@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <!-- SIDEBAR (MENU LATERAL ESQUERDO) -->
            <aside class="col-md-2 sidebar bg-light min-vh-100 py-4">
                <div class="text-center mb-4 fw-bold">
                    HelpPet
                </div>

                <ul class="nav flex-column gap-2">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            🏠 Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('veterinarios.index') }}">
                            👩‍⚕️ Veterinário
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tutors.index') }}">
                            👤 Tutor
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pets.index') }}">
                            🐶 Animais
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vacinas.index') }}">
                            💉 Vacinas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vacinacoes.index') }}">
                            💉 Vacinações
                        </a>
                    </li>
                    <li class="nav-item mt-4">
                        <a class="nav-link text-danger" href="#">
                            🚪 Sair
                        </a>
                    </li>
                </ul>
            </aside>

            <!-- CONTEÚDO PRINCIPAL -->
            <main class="col-md-10 px-4 py-4">

                <!-- TOPO -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold">Visualização Animais</h4>
                    <span class="text-muted">(nome veterinário)</span>
                </div>

                <!-- FILTROS -->
                <div class="card mb-4 border-0">
                    <div class="card-body">
                        <!-- FILTROS -->
                        @if ($pets->isEmpty())
                            <div class="alert alert-info d-flex flex-column align-items-center py-4 mt-3">
                                <p class="mb-3">Pet não encontrado.</p>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('dashboard.index') }}" class="btn btn-secondary">
                                        Voltar para lista de pets
                                    </a>
                                </div>
                            </div>
                        @else
                            {{-- Linha do filtro + botão cadastrar --}}
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
                        @endif
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
                                                    <a href="#" class="btn btn-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" fill="currentColor" class="bi bi-card-checklist"
                                                            viewBox="0 0 16 16">
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
                                                    Nenhum pet cadastrado
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

                                <p class="mb-2">
                                    <strong class="text-danger">Atrasados</strong><br>
                                    Animais com vacinas vencidas
                                </p>

                                <p class="mb-2">
                                    <strong class="text-warning">Urgente</strong><br>
                                    Próximas de vencer
                                </p>

                                <p class="mb-0">
                                    <strong class="text-primary">Aviso</strong><br>
                                    Agendadas para o próximo mês
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </main>
            <style>
                .sidebar {
                    border-right: 1px solid #eee;
                }

                .sidebar .nav-link {
                    color: #555;
                    border-radius: 8px;
                }

                .sidebar .nav-link.active,
                .sidebar .nav-link:hover {
                    background-color: #e9e3ff;
                    color: #5a3fd9;
                }
            </style>
        </div>
    </div>
@endsection
