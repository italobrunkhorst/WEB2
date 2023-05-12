<h2>Cadastrar Cidade</h2>

<form action="{{route('cidades.store')}}" method="POST">

    @csrf

    <a href="{{route('cidades.index')}}"><h4>voltar</h4></a>

    <label>Nome: </label><input type="text" name="nome">
    <label>Port: </label><select name="port">
        <option value="Pequeno">Pequeno</option>
        <option value="Medio">Medio</option>
        <option value="Grande">Grande</option>
    </select>

    <input type="submit" value="salvar">
</form>