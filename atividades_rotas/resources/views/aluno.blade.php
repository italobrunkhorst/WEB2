<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<div class="listaalunos">
    <h2> style="color:blue">Lista dos Alunos</h2>
    <a>href="/aluno/limite">Limite</a>
    <ul>
    @foreach ($alunos as $aluno)
        <li>{{ $aluno }}</li>
    @endforeach
    </ul>
</div>