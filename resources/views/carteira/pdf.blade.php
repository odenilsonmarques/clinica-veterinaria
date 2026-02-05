<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carteira de Vacinação - {{ $pet->nome }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 12px;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #b0a7e8;
            padding-bottom: 20px;
        }

        .header h1 {
            font-size: 28px;
            color: #5a3fd9;
            margin-bottom: 5px;
        }

        .header p {
            color: #666;
            font-size: 11px;
            margin: 5px 0;
        }

        .pet-info {
            background-color: #f9fafb;
            border: 2px solid #b0a7e8;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 25px;
        }

        .pet-info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .pet-info-row:last-child {
            margin-bottom: 0;
        }

        .pet-info-item {
            flex: 1;
            padding-right: 15px;
        }

        .pet-info-label {
            font-weight: bold;
            color: #5a3fd9;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 3px;
        }

        .pet-info-value {
            color: #333;
            font-size: 13px;
        }

        .section-title {
            background-color: #b0a7e8;
            color: white;
            padding: 10px 15px;
            margin-top: 25px;
            margin-bottom: 15px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table thead {
            background-color: #e9e3ff;
        }

        .table th {
            background-color: #b0a7e8;
            color: white;
            padding: 10px;
            text-align: left;
            font-weight: bold;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: 1px solid #b0a7e8;
        }

        .table td {
            padding: 10px;
            border: 1px solid #e9e3ff;
            font-size: 12px;
        }

        .table tbody tr:nth-child(even) {
            background-color: #fafbfc;
        }

        .table tbody tr:hover {
            background-color: #f0f0f0;
        }

        .status-Em_dia {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 10px;
            font-weight: bold;
        }

        .status-Proxima {
            display: inline-block;
            background-color: #ffc107;
            color: #000;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 10px;
            font-weight: bold;
        }

        .status-Vencida {
            display: inline-block;
            background-color: #dc3545;
            color: white;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 10px;
            font-weight: bold;
        }

        .empty-state {
            text-align: center;
            padding: 30px;
            color: #999;
            font-style: italic;
        }

        .footer {
            margin-top: 30px;
            border-top: 2px solid #b0a7e8;
            padding-top: 15px;
            text-align: center;
            font-size: 10px;
            color: #999;
        }

        .logo-text {
            font-size: 14px;
            color: #5a3fd9;
            font-weight: bold;
            margin-bottom: 5px;
        }

        @media print {
            body {
                background: white;
            }
            .container {
                box-shadow: none;
                padding: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <div class="logo-text">🐾 HelpPet</div>
            <h1>Carteira de Vacinação</h1>
            <p>Sistema de Gestão Veterinária</p>
        </div>

        <!-- Pet Information -->
        <div class="pet-info">
            <div class="pet-info-row">
                <div class="pet-info-item">
                    <div class="pet-info-label">Nome do Pet</div>
                    <div class="pet-info-value">
                        {{ $pet->nome }}
                    </div>
                </div>
                <div class="pet-info-item">
                    <div class="pet-info-label">Espécie / Raça</div>
                    <div class="pet-info-value">
                        {{ $pet->especie }}
                        @if ($pet->raca)
                            • {{ $pet->raca }}
                        @endif
                    </div>
                </div>
            </div>

            <div class="pet-info-row">
                <div class="pet-info-item">
                    <div class="pet-info-label">Sexo</div>
                    <div class="pet-info-value">
                        {{ ucfirst($pet->sexo) }}
                    </div>
                </div>
                <div class="pet-info-item">
                    <div class="pet-info-label">Data de Nascimento</div>
                    <div class="pet-info-value">
                        {{ $pet->data_nascimento ? \Carbon\Carbon::parse($pet->data_nascimento)->format('d/m/Y') : '—' }}
                    </div>
                </div>
            </div>

            <div class="pet-info-row">
                <div class="pet-info-item">
                    <div class="pet-info-label">Tutor</div>
                    <div class="pet-info-value">
                        {{ $pet->tutor->nome ?? '—' }}
                    </div>
                </div>
                <div class="pet-info-item">
                    <div class="pet-info-label">Data de Emissão</div>
                    <div class="pet-info-value">
                        {{ \Carbon\Carbon::now()->format('d/m/Y') }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Vaccination History -->
        <div class="section-title">
            Histórico de Vacinação
        </div>

        @if ($pet->vacinacoes->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Vacina</th>
                        <th>Data Aplicação</th>
                        <th>Próxima Dose</th>
                        <th>Veterinário</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pet->vacinacoes as $vacinacao)
                        <tr>
                            <td>
                                <strong>{{ $vacinacao->vacina->nome }}</strong>
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($vacinacao->data_aplicacao)->format('d/m/Y') }}
                            </td>
                            <td>
                                {{ $vacinacao->proxima_dose ? \Carbon\Carbon::parse($vacinacao->proxima_dose)->format('d/m/Y') : '—' }}
                            </td>
                            <td>
                                {{ $vacinacao->veterinario->nome ?? '—' }}
                            </td>
                            <td style="text-align: center;">
                                @php
                                    $statusClass = 'status-' . str_replace(' ', '_', $vacinacao->status ?? 'Desconhecido');
                                @endphp
                                <span class="{{ $statusClass }}">
                                    @switch($vacinacao->status ?? '')
                                        @case('vencida')
                                            Vencida
                                            @break
                                        @case('proxima')
                                            Próxima
                                            @break
                                        @case('em_dia')
                                            Em dia
                                            @break
                                        @default
                                            —
                                    @endswitch
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-state">
                Nenhum registro de vacinação encontrado.
            </div>
        @endif

        <!-- Footer -->
        <div class="footer">
            <p>
                Documento gerado pelo sistema HelpPet em {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}
            </p>
            <p style="margin-top: 5px;">
                Este documento serve como registro oficial da carteira de vacinação do pet.
            </p>
        </div>
    </div>
</body>
</html>
