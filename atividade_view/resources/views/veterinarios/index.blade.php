@extends('templates.main', ['titulo' => "Veterinario", 'rota' => "veterinarios.create"])

@section('titulo') Veterinario @endsection

@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datalist 
                title="Veterinario" 
                crud="veterinarios" 
                :header="['crmv', 'nome', 'especialidade', 'ações']" 
                :data="$veterinarios"
                :hide="[true, false, true, false]" 
            /> 
        </div>
    </div>
@endsection