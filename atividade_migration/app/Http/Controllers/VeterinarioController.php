<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veterinario;
use App\Models\Especialidade;

class VeterinarioController extends Controller
{
    public function index(){
        
        $dados = Veterinario::all();

        $clinica = "VetClin DWII";
        
        return view('veterinarios.index')->with('veterinarios', $dados)->with('clinica', $clinica);
    }

    public function create(){
        
        $dados = Especialidade::all();
        return view('veterinarios.create', compact('dados'));
    }

    public function store(Request $request){
        
        Veterinario::create([

            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'crmv' => $request->crmv,
            'especialidade_id' => $request->especialidade_id
        ]);

        return redirect()->route('veterinarios.index');
    }

    public function show($id){

        $veter = session('veterinarios');

        $index = array_search($id, array_column($id, 'crmv'));

        $dados = $veter[$index];

        return view('veterinarios.show', compact('veterinarios'));
    }

    public function edit($id){
        
        $dados = Veterinario::find($id);
        $esp = Especialidade::all();

        if(!isset($dados)){
            return "<h1>ID: $id não encontrado</h1>";
        }

        return view('veterinarios.edit', compact(['dados', 'esp']));
    }

    public function update(Request $request, $id){
        
        $obj = Veterinario::find($id);

        if(!isset($obj)){
            return "<h1>ID: $id não encontrado</h1>";
        }

        $obj->fill([
            'nome' => mb_strtoupper($request->nome, "UTF-8"),
            'crmv' => $request->crmv,
            'especialidade_id' => $request->especialidade_id
        ]);

        $obj->save();

        return redirect()->route('veterinarios.index');

    }

    public function destroy($id){
        
        $obj = Veterinario::find($id);

        if(!isset($obj)) { 
            return "<h1>ID: $id não encontrado!"; 
        }

        $obj->destroy();

        return redirect()->route('veterinarios.index');

    }
}
