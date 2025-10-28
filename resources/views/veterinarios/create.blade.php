<form action="{{ route('veterinarios.store') }}" method="POST">
    @csrf
    <div>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
    </div>
    <div>
        <label for="crmv">CRMV:</label>
        <input type="text" id="crmv" name="crmv" required>
    </div>
    <div>
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>

    <button type="submit">Cadastrar Veterinário</button>
</form>