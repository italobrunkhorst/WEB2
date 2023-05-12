<h2>Lista das Cidades</h2>

<td>
    <form action="{{ route('cidades.create') }}">
        <input type='submit' value='Cadastrar Cidade'>
    </form>
</td>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>PORTE</th>
            <th>EDITAR</th>
            <th>REMOVER</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($cidades as $item)

            <tr>
                <td>{{ $item['id'] }}</td>
                <td>{{ $item['nome'] }}</td>
                <td>{{ $item['porte'] }}</td>
                <td>
                    <form action="{{ route('cidades.edit', $item['id']) }}" method="GET">
                        <input type='submit' value='editar'>
                    </form>
                </td>
                <td>
                    <form action="{{ route('cidades.destroy', $item['id'])}}" method="POST">

                        @csrf

                        @method('DELETE')
                        <input type="submit" value="remover">
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>