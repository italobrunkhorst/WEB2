@extends('templates.main', ['titulo' => "Especialidade", 'rota' => "especialidades.create"])

@section('titulo') Especialidade @endsection

@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datalist 
                title="Especialidade" 
                crud="especialidades" 
                :header="['id', 'nome', 'descricao', 'ações']" 
                :data="$dados"
                :hide="[true, false, true, false]" 
            /> 
        </div>
    </div>
@endsection