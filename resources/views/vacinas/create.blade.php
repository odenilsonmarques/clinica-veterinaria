<form action="{{ route('vacinas.store') }}" method="POST">
    @csrf
    <div>
        <label for="nome">Nome da Vacina:</label>
        <input type="text" id="nome" name="nome" required>
    </div>
    <div>
        <label for="fabricante">Fabricante:</label>
        <input type="text" id="fabricante" name="fabricante" required>
    </div>
    <div>
        <label for="quantidade_estoque">Quantidade em Estoque:</label>
        <input type="number" id="quantidade_estoque" name="quantidade_estoque" required min="0">
    </div>
    <div>
        <label for="validade">Data de Validade:</label>
        <input type="date" id="validade" name="validade" required>
    </div>
    <button type="submit">Adicionar Vacina</button>
</form>