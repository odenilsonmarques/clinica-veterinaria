<!-- Partial: Modals de Vacinas (vencidas e próximas) -->

<!-- Modal para Vacinas Vencidas -->
<div class="modal fade" id="modalVencidas" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title text-danger">Vacinas vencidas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <ul class="list-group list-group-flush">
                    @foreach ($vacinasVencidas as $v)
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-start gap-3">
                                <div class="flex-grow-1">
                                    <a href="{{ route('carteira.show', $v->pet->id) }}" target="_blank"
                                        class="fw-bold text-decoration-none text-danger d-block mb-2">
                                        {{ $v->pet->nome }}
                                    </a>
                                    <div class="text-muted small">
                                        <span class="d-block mb-1">{{ $v->vacina->nome }}</span>
                                        <span class="d-block">Vencida em {{ \Carbon\Carbon::parse($v->proxima_dose)->format('d/m/Y') }}</span>
                                    </div>
                                </div>
                                <span class="badge bg-danger">Vencida</span>
                            </div>
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
                <ul class="list-group list-group-flush">
                    @foreach ($vacinasProximas as $v)
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-start gap-3">
                                <div class="flex-grow-1">
                                    <a href="{{ route('carteira.show', $v->pet->id) }}" target="_blank"
                                        class="fw-bold text-decoration-none text-warning d-block mb-2">
                                        {{ $v->pet->nome }}
                                    </a>
                                    <div class="text-muted small">
                                        <span class="d-block mb-1">{{ $v->vacina->nome }}</span>
                                        <span class="d-block">Vence em {{ \Carbon\Carbon::parse($v->proxima_dose)->format('d/m/Y') }}</span>
                                    </div>
                                </div>
                                <span class="badge bg-warning text-dark">Próxima</span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</div>
