<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller{

    public function index(){
        
        $dados = Cliente::all();

        $clinica = 'VetClin WBII';

        return view('clientes.index')->with('clientes', $dados)->with('clinica', $clinica);

    }

    public function create(){
        return view('clientes.create');
    }

    public function store(Request $request){
        
        Cliente::create([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'email' => $request->email
        ]);

        return redirect()->route('clientes.index');
    }

    public function show($id){
        $aux = session('clientes');
        
        $index = array_search($id, array_column($aux, 'id'));

        $dados = $aux[$index];

        return view('clientes.show', compact('clientes'));
    }

    public function edit($id){
        
        $daods = Cliente::all();

        if(!isset($dados)){
            return "<h1>ID: $id não encontrado</h1>";
        }

        return view('clientes.edit', compact('dados'));
    }

    public function update(Request $request, $id){
        
        $obj = Cliente::all();

        if(!isset($obj)){
            return "<h1>ID: $id não encontrado</h1>";
        }

        $obj->fill([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'email' => $request->email
        ]);

        $obj->save();

        return redirect()->route('clientes.index');
    }

    public function destroy($id){
        
        $obj = Cliente::all();

        if(!isset($obj)){
            return "<h1>ID: $id não encontrado</h1>";
        }

        $obj->destroy();

        return redirect()->route('clientes.index');
    }
}
