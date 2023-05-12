<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VeterinarioController extends Controller
{
    public $veterinario = [[
        'crmv' => 1,
        'nome' => "italo",
        'especialidade' => "veterinario"
    ]];

    public function __construct(){
        $aux = session('veterinarios');

        if(!isset($aux)){
            session(['veterinarios' => $this->veterinario]);
        }
    }
    public function index(){
        
        $veter = session('veterinarios');

        $clinica = "VetClin DWII";
        
        return view('veterinarios.index')->with('veterinarios', $veter)->with('clinica', $clinica);
    }

    public function create(){
        
        return view('veterinarios.create');
    }

    public function store(Request $request){
        
        $veter = session('veterinarios');

        $ids = array_column($veter, 'crmv');

        if(count($ids) > 0){
            $new_crmv = max($ids) + 1;
        }else{
            $new_crmv = 1;
        }

        $novo = [
            'crmv' => $new_crmv,
            'nome' => $request->nome,
            'especialidade' => $request->especialidade
        ];

        array_push($veter, $novo);

        session(['veterinarios' => $veter]);

        return redirect()->route('veterinarios.index');
    }

    public function show($id){

        $veter = session('veterinarios');

        $index = array_search($id, array_column($id, 'crmv'));

        $dados = $veter[$index];

        return view('veterinarios.show', compact('veterinarios'));
    }

    public function edit($id){
        
        $veter = session('veterinarios');

        $indice = array_search($id, array_column($id, 'crmv'));

        $dados = $veter[$indice];

        return view('veterinarios.edit', compact('dados'));
    }

    public function update(Request $request, $id){
        
        $alterar = [
            'crmv' => $id,
            'nome' => $request->nome,
            'especialidade' => $request->especialidade
        ];

        $veter = session('veterinarios');

        $indice = array_search($id, array_column($id, 'crmv'));

        $veter[$indice] = $alterar;

        session(['veterinarios' => $veter]);

        return redirect()->route('veterinarios.index');

    }

    public function destroy($id){
        
        $veter = session('veterinarios');

        $indice = array_search($id, array_column($id, 'crmv'));

        unset($veter[$indice]);

        return redirect()->route('veterinarios.index');

    }
}
