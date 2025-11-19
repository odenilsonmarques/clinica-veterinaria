
<form action="{{ route('vacinacoes.store') }}" method="POST">
    @csrf
    <div>
        <label for="pet_id">Pet:</label>
        <select name="pet_id" id="pet_id" required>
            <option value="">Selecione um pet</option>
            @foreach($pets as $pet)
                <option value="{{ $pet->id }}">{{ $pet->nome }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="vacina_id">Vacina:</label>
        <select name="vacina_id" id="vacina_id" required>
            <option value="">Selecione uma vacina</option>
            @foreach($vacinas as $vacina)
                <option value="{{ $vacina->id }}">{{ $vacina->nome }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="veterinario_id">Veterinário:</label>
        <select name="veterinario_id" id="veterinario_id" required>
            <option value="">Selecione um veterinário</option>
            @foreach($veterinarios as $veterinario)
                <option value="{{ $veterinario->id }}">{{ $veterinario->nome }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="data_aplicacao">Data da Vacinação:</label>
        <input type="date" id="data_aplicacao" name="data_aplicacao" required>
    </div>

    <div>
        <label for="proxima_dose">Próxima Dose (opcional):</label>
        <input type="date" id="proxima_dose" name="proxima_dose">
    </div>

    <div>
        <label for="observacoes">Observações:</label>
        <textarea id="observacoes" name="observacoes"></textarea>
    </div>

    <button type="submit">Registrar Vacinação</button>
</form>