<h1>Tutor</h1>

<a href="{{ route('tutors.create') }}">Cadastrar Novo Tutor</a>
@if(session('success'))
    <div>{{ session('success') }}</div>
@endif