@extends('layouts.template')

@section('content')
    <div class="container">

        <div class="card mb-4">
            <div class="card-body">
                <h1 class="fs-3 text-center">Carteira de vacina</h1>
                <p class="mb-1 mt-3"><strong>Nome do pet:</strong> {{ $pet->nome }}</p>

                <small class="text-muted fs-5">
                    {{ $pet->especie }}
                    @if ($pet->raca)
                        • {{ $pet->raca }}
                    @endif
                </small>

                <p class="mb-0"><strong>Data de nascimento:</strong>
                    {{ $pet->data_nascimento ? \Carbon\Carbon::parse($pet->data_nascimento)->format('d/m/Y') : '—' }}
                </p>
                <hr>

                <p class="mb-1"><strong>Tutor:</strong> {{ $pet->tutor->nome }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <h5 class="mb-3">Histórico de Vacinação</h5>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Vacina</th>
                            <th>Data aplicação</th>
                            <th>Próxima dose</th>
                            <th>Veterinário</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($pet->vacinacoes as $vacinacao)
                            <tr>
                                <td>{{ $vacinacao->vacina->nome }}</td>
                                <td>{{ \Carbon\Carbon::parse($vacinacao->data_aplicacao)->format('d/m/Y') }}</td>
                                <td>
                                    {{ $vacinacao->proxima_dose ? \Carbon\Carbon::parse($vacinacao->proxima_dose)->format('d/m/Y') : '—' }}
                                </td>
                                <td>
                                    {{ $vacinacao->veterinario->nome ?? '—' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    Nenhuma vacina registrada
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                



            </div>
        </div>

    </div>
@endsection
