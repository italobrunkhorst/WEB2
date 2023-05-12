@extends('templates.main', ['titulo' => "Clientes", 'rota' => "clientes.create"])

@section('titulo') Clientes @endsection

@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datalist 
                title="Clientes" 
                crud="clientes" 
                :header="['id', 'nome', 'email', 'ações']" 
                :data="$clientes"
                :hide="[true, false, true, false]" 
            /> 
        </div>
    </div>
@endsection