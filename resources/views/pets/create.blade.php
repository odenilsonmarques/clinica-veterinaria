<form action="{{ route('pets.store') }}" method="POST">
    @csrf
    <div>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
    </div>

    <div>
        <label for="especie">Espécie:</label>
        <input type="text" id="especie" name="especie" required>
    </div>

    <div>
        <label for="raca">Raça:</label>
        <input type="text" id="raca" name="raca">
    </div>

    <div>
        <label for="sexo">Sexo:</label>
        <select id="sexo" name="sexo" required>
            <option value="">Selecione</option>
            <option value="Macho">Macho</option>
            <option value="Fêmea">Fêmea</option>
        </select>
    </div>

    <div>
        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" id="data_nascimento" name="data_nascimento">
    </div>

    <div>
        <label for="tutor_id">Tutor:</label>
        <select id="tutor_id" name="tutor_id" required>
            <option value="">Selecione um tutor</option>
            @foreach ($tutors as $tutor)
                <option value="{{ $tutor->id }}">{{ $tutor->nome }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit">Cadastrar Pet</button>
</form>
