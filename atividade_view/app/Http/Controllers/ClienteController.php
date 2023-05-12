<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public $clientes = [[
        'id' => 1,
        'nome' => 'italo',
        'email' => 'italo@gmail.com'
    ]];
    
    public function __construct(){
        
        $aux = session('clientes');

        if(!isset($aux)){
            session(['clientes' => $this->clientes]);
        }
    }

    public function index(){
        
        $clientes = session('clientes');

        $clinica = 'VetClin WBII';

        return view('clientes.index')->with('clientes', $clientes)->with('clinica', $clinica);

    }

    public function create(){
        return view('clientes.create');
    }

    public function store(Request $request){
        
        $aux = session('clientes');
        
        $ids = array_column($aux, 'id');

        if(count($ids) > 0){

            $new_id = max($ids) +1;

        }else{
            $new_id = 1;
        }

        $novo = [
            'id' => $new_id,
            'nome' => $request->nome,
            'email' => $request->email
        ];

        array_push($aux, $novo);

        session(['clientes' => $aux]);

        return redirect()->route('clientes.index');
    }

    public function show($id){
        $aux = session('clientes');
        
        $index = array_search($id, array_column($aux, 'id'));

        $dados = $aux[$index];

        return view('clientes.show', compact('clientes'));
    }

    public function edit($id){
        
        $aux = session('clientes');

        $indice = array_search($id, array_column($aux, 'id'));

        $dados = $aux[$indice];

        return view('clientes.edit', compact('dados'));
    }

    public function update(Request $request, $id){
        
        $alterar = [
            'id' => $id,
            'nome' => $request->nome,
            'email' => $request->email
        ];

        $aux = session('clientes');

        $indice = array_search($id, array_column($aux, 'id'));

        $aux[$indice] = $alterar;

        session(['clientes' => $aux]);

        return redirect()->route('clientes.index');
    }

    public function destroy($id){
        
        $aux = session('clientes');

        $indice = array_search($id, array_column($aux, 'id'));

        unset($aux[$indice]);

        return redirect()->route('clientes.index');
    }
}
