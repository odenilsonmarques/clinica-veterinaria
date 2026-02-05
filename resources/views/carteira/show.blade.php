@extends('layouts.template')

@section('content')
    <div class="container">

        <div class="card mb-4" style="border: none; background: linear-gradient(135deg, #b0a7e8 0%, #8F7FEE 100%);">
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="fs-2 fw-bold text-white mb-3">
                            <i class="bi bi-file-earmark-medical"></i> Carteira de Vacinação
                        </h1>

                        <div style="background-color: rgba(255, 255, 255, 0.95); border-radius: 12px; padding: 20px; margin-top: 10px;">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div style="padding-bottom: 15px; border-bottom: 1px solid #e9e3ff;">
                                        <small class="text-muted fw-bold" style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px;">
                                            <i class="bi bi-paw"></i> Nome do Pet
                                        </small>
                                        <p class="fs-5 fw-bold text-color mb-0" style="color: #5a3fd9;">
                                            {{ $pet->nome }}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div style="padding-bottom: 15px; border-bottom: 1px solid #e9e3ff;">
                                        <small class="text-muted fw-bold" style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px;">
                                            <i class="bi bi-heart"></i> Espécie / Raça
                                        </small>
                                        <p class="fs-5 fw-bold mb-0" style="color: #5a3fd9;">
                                            {{ $pet->especie }}
                                            @if ($pet->raca)
                                                <span class="text-muted">• {{ $pet->raca }}</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <small class="text-muted fw-bold" style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px;">
                                        <i class="bi bi-calendar-heart"></i> Data de Nascimento
                                    </small>
                                    <p class="fs-5 fw-bold mb-0" style="color: #5a3fd9;">
                                        {{ $pet->data_nascimento ? \Carbon\Carbon::parse($pet->data_nascimento)->format('d/m/Y') : '—' }}
                                    </p>
                                </div>

                                <div class="col-md-6">
                                    <small class="text-muted fw-bold" style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px;">
                                        <i class="bi bi-person"></i> Tutor
                                    </small>
                                    <p class="fs-5 fw-bold mb-0" style="color: #5a3fd9;">
                                        {{ $pet->tutor->nome }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <a href="{{ route('vacinas.create', $pet->id) }}" class="btn" style="background-color: #8F7FEE; color: white; border: none; font-weight: 600; padding: 10px 25px; border-radius: 8px;">
                                <i class="bi bi-plus-circle"></i> Registrar Nova Vacina
                            </a>
                            <a href="{{ route('carteira.view-pdf', $pet->id) }}" class="btn" style="background-color: #dc3545; color: white; border: none; font-weight: 600; padding: 10px 25px; border-radius: 8px; margin-left: 8px;" target="_blank">
                                <i class="bi bi-file-earmark-pdf"></i> Visualizar / Baixar PDF
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4 text-center d-none d-md-block">
                        <div style="font-size: 80px; opacity: 0.3;">
                            🐾
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" style="background-color: #b0a7e8; border: none;">
                <h5 class="mb-0 fw-bold text-white">
                    <i class="bi bi-clipboard2-check"></i> Histórico de Vacinação
                </h5>
            </div>
            <div class="card-body">

                @if ($pet->vacinacoes->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover" style="border-collapse: collapse;">
                            <thead style="background-color: #f0f0f0;">
                                <tr>
                                    <th style="color: #5a3fd9; font-weight: 600; border-bottom: 2px solid #b0a7e8;">
                                        <i class="bi bi-capsule"></i> Vacina
                                    </th>
                                    <th style="color: #5a3fd9; font-weight: 600; border-bottom: 2px solid #b0a7e8;">
                                        <i class="bi bi-calendar-check"></i> Data Aplicação
                                    </th>
                                    <th style="color: #5a3fd9; font-weight: 600; border-bottom: 2px solid #b0a7e8;">
                                        <i class="bi bi-calendar-plus"></i> Próxima Dose
                                    </th>
                                    <th style="color: #5a3fd9; font-weight: 600; border-bottom: 2px solid #b0a7e8;">
                                        <i class="bi bi-person-check"></i> Veterinário
                                    </th>
                                    <th style="color: #5a3fd9; font-weight: 600; border-bottom: 2px solid #b0a7e8;text-align: center;">
                                        <i class="bi bi-info-circle"></i> Status
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($pet->vacinacoes as $vacinacao)
                                    <tr style="border-bottom: 1px solid #e9e3ff;">
                                        <td class="fw-500">{{ $vacinacao->vacina->nome }}</td>

                                        <td>
                                            <small class="badge bg-light text-dark">
                                                {{ \Carbon\Carbon::parse($vacinacao->data_aplicacao)->format('d/m/Y') }}
                                            </small>
                                        </td>

                                        <td>
                                            {{ $vacinacao->proxima_dose ? \Carbon\Carbon::parse($vacinacao->proxima_dose)->format('d/m/Y') : '—' }}
                                        </td>

                                        <td>
                                            {{ $vacinacao->veterinario->nome ?? '—' }}
                                        </td>

                                        <td style="text-align: center;">
                                            @switch($vacinacao->status)
                                                @case('vencida')
                                                    <span class="badge bg-danger" style="font-size: 0.8rem;">
                                                        <i class="bi bi-exclamation-circle"></i> Vencida
                                                    </span>
                                                @break

                                                @case('proxima')
                                                    <span class="badge" style="background-color: #ffc107; color: #000; font-size: 0.8rem;">
                                                        <i class="bi bi-exclamation-triangle"></i> Próxima
                                                    </span>
                                                @break

                                                @case('em_dia')
                                                    <span class="badge bg-success" style="font-size: 0.8rem;">
                                                        <i class="bi bi-check-circle"></i> Em dia
                                                    </span>
                                                @break

                                                @default
                                                    <span class="text-muted">—</span>
                                            @endswitch
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div style="text-align: center; padding: 40px 20px; background-color: #f9fafb; border-radius: 8px;">
                        <i class="bi bi-inbox" style="font-size: 48px; color: #ccc;"></i>
                        <p class="text-muted mt-3 mb-0">Nenhuma vacinação registrada ainda.</p>
                        <a href="{{ route('vacinas.create', $pet->id) }}" class="btn mt-3" style="background-color: #8F7FEE; color: white;">
                            Registrar Primeira Vacina
                        </a>
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
