@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <!-- SIDEBAR (MENU LATERAL ESQUERDO) -->
            <aside class="col-md-2 sidebar bg-light min-vh-100 py-2">
                <div class="text-center mb-4 fw-bold">
                    HelpPet
                </div>

                <ul class="nav flex-column gap-2">
                    <li class="nav-item">
                        <a class="nav-link active d-flex align-items-center gap-2" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                <path
                                    d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2" href="{{ route('veterinarios.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            </svg>
                            Veterinário
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2" href="{{ route('tutors.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            </svg>
                            Tutor
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2" href="{{ route('pets.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-gitlab" viewBox="0 0 16 16">
                                <path
                                    d="m15.734 6.1-.022-.058L13.534.358a.57.57 0 0 0-.563-.356.6.6 0 0 0-.328.122.6.6 0 0 0-.193.294l-1.47 4.499H5.025l-1.47-4.5A.572.572 0 0 0 2.47.358L.289 6.04l-.022.057A4.044 4.044 0 0 0 1.61 10.77l.007.006.02.014 3.318 2.485 1.64 1.242 1 .755a.67.67 0 0 0 .814 0l1-.755 1.64-1.242 3.338-2.5.009-.007a4.05 4.05 0 0 0 1.34-4.668Z" />
                            </svg>
                            Animais
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2" href="{{ route('vacinas.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-eyedropper" viewBox="0 0 16 16">
                                <path
                                    d="M13.354.646a1.207 1.207 0 0 0-1.708 0L8.5 3.793l-.646-.647a.5.5 0 1 0-.708.708L8.293 5l-7.147 7.146A.5.5 0 0 0 1 12.5v1.793l-.854.853a.5.5 0 1 0 .708.707L1.707 15H3.5a.5.5 0 0 0 .354-.146L11 7.707l1.146 1.147a.5.5 0 0 0 .708-.708l-.647-.646 3.147-3.146a1.207 1.207 0 0 0 0-1.708zM2 12.707l7-7L10.293 7l-7 7H2z" />
                            </svg>
                            Vacinas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  d-flex align-items-center gap-2" href="{{ route('vacinacoes.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-eyedropper" viewBox="0 0 16 16">
                                <path
                                    d="M13.354.646a1.207 1.207 0 0 0-1.708 0L8.5 3.793l-.646-.647a.5.5 0 1 0-.708.708L8.293 5l-7.147 7.146A.5.5 0 0 0 1 12.5v1.793l-.854.853a.5.5 0 1 0 .708.707L1.707 15H3.5a.5.5 0 0 0 .354-.146L11 7.707l1.146 1.147a.5.5 0 0 0 .708-.708l-.647-.646 3.147-3.146a1.207 1.207 0 0 0 0-1.708zM2 12.707l7-7L10.293 7l-7 7H2z" />
                            </svg>
                            Vacinações
                        </a>
                    </li>
                    <li class="nav-item mt-4">
                        <a class="nav-link  d-flex align-items-center gap-2 text-danger" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-x-lg" viewBox="0 0 16 16">
                                <path
                                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                            </svg>
                            Sair
                        </a>
                    </li>
                </ul>
            </aside>

            <!-- CONTEÚDO PRINCIPAL -->
            <main class="col-md-10 px-4 py-0">

                <!-- TOPO -->
                {{-- <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold">Visualização Animais</h4>
                    <span class="text-muted">(nome veterinário)</span>
                </div> --}}

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

                                <!-- Vacinas vencidas -->
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-danger fw-bold">
                                        🔴 {{ $vacinasVencidasCount }} vacinas vencidas
                                    </span>
                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalVencidas">
                                        Ver
                                    </button>
                                </div>

                                <!-- Vacinas próximas -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-warning fw-bold">
                                        🟠 {{ $vacinasProximasCount }} vacinas próximas
                                    </span>
                                    <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal"
                                        data-bs-target="#modalProximas">
                                        Ver
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Modal para Vacinas Vencidas -->
                    <div class="modal fade" id="modalVencidas" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title text-danger">Vacinas vencidas</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    <ul class="list-group">
                                        @foreach ($vacinasVencidas as $v)
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <a href="{{ route('carteira.show', $v->pet->id) }}" target="_blank"
                                                        class="fw-bold text-decoration-none text-danger">
                                                        {{ $v->pet->nome }}
                                                    </a>
                                                    —
                                                    {{ $v->vacina->nome }}
                                                    —
                                                    vencida em
                                                    {{ \Carbon\Carbon::parse($v->proxima_dose)->format('d/m/Y') }}
                                                </div>

                                                <span class="badge bg-danger">Vencida</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Modal para Vacinas Próximas -->
                    <div class="modal fade" id="modalProximas" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title text-warning">Vacinas próximas do vencimento</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    <ul class="list-group">
                                        @foreach ($vacinasProximas as $v)
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <a href="{{ route('carteira.show', $v->pet->id) }}" target="_blank"
                                                        class="fw-bold text-decoration-none text-warning">
                                                        {{ $v->pet->nome }}
                                                    </a>
                                                    —
                                                    {{ $v->vacina->nome }}
                                                    —
                                                    vence em {{ \Carbon\Carbon::parse($v->proxima_dose)->format('d/m/Y') }}
                                                </div>

                                                <span class="badge bg-warning text-dark">Próxima</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

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
