<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/aluno')->group(function(){

    Route::get('/', function(){

        $dados = array(

            "italo",
            "Ben",
            "Jeann",
            "Gicelli"
        );
        return view('aluno')->with('alunos', $dados);
    })->name('aluno');

    Route::get('/limite/{valor}', function($valor){

        $dados = array(

            "italo",
            "Ben",
            "Jeann",
            "Gicelli"
        );

        $alunos = "<ul>";

        if($valor <=count($dados)){

            $cont = 0;

            foreach ($dados as $nome) {
                $alunos .= "<li>$nome</li>";
                $cont++;

                if($cont >= $valor) break;
            }
        }else {
            $alunos .= "<li>Tamanho Máximo = ".count($dados)."</li>";
        }

        $alunos .= "</ul>";
        return $alunos;

    })->name('aluno.limite')->where('valor', '[0-9]');

    Route::get('/matricula/{valor}', function($valor){
        $dados = array(

            "italo",
            "Ben",
            "Jeann",
            "Gicelli"
        );

        $alunos = "<ul>";

        if($valor <=count($dados)){

            $cont = 0;

            foreach ($dados as $nome) {
                if($cont == $valor -1) {
                    $alunos .= $valor." - " .$nome;
                    break;
                }
                $cont++;
            }
        }else {
            $alunos = $alunos."<li>Aluno não encontrado</li>";
        }

        $alunos .= "</ul>";
        return $alunos;
    })->name('aluno.matricula')->where('valor', '[0-9]');

    Route::get('/nome/{name}', function($name){

        $dados = array(

            "italo",
            "Ben",
            "Jeann",
            "Gicelli"
        );

        $alunos = "<ul>";
        $aux = 0;

        foreach($dados as $nome){
            if(!strcmp($name, $nome)){
                $alunos .= $nome;
                $aux = 1;
            }
        }
        if($aux == 0){
            $alunos = $alunos."<li>Aluno não encontrado</li>";
        }

        $alunos .= "</ul>";
        return $alunos;
    })->name('aluno.nome')->where('valor', '[A-Za-z]');
});

Route::prefix('/nota')->group(function(){
    Route::get('/', function(){

        $dados = array(
            array("Matricula" => 0, "Nome" => "italo", "Nota" => 10),
            array("Matricula" => 1, "Nome" => "Ben", "Nota" => 5),
            array("Matricula" => 2, "Nome" => "Jeann", "Nota" => 7),
            array("Matricula" => 3, "Nome" => "Gicelli", "Nota" => 9),
        );

        $table = '<table>';
        $table .= '<tr>';
        $table .= '<td>Matricula</td>';
        $table .= '<td>Nome</td>';
        $table .= '<td>Nota</td>';
        $table .= '</tr>';
        
        foreach($dados as $lin){
            $table .= "<tr>";
            foreach($lin as $valor){
                $table .= '<th>' . $valor . '</th>';
            }
            $table .= "</th>";
        }

        $table .= "</table>";
        return $table;
    })->name('nota');

    Route::get('/limite/{valor}', function($valor){

        $dados = array(
            array("Matricula" => 0, "Nome" => "italo", "Nota" => 10),
            array("Matricula" => 1, "Nome" => "Ben", "Nota" => 5),
            array("Matricula" => 2, "Nome" => "Jeann", "Nota" => 7),
            array("Matricula" => 3, "Nome" => "Gicelli", "Nota" => 9),
        );
            $table = '<table>';
            $table .= '<tr>';
            $table .= '<td>Matricula</td>';
            $table .= '<td>Nome</td>';
            $table .= '<td>Nota</td>';
            $table .= '</tr>';

        if($valor <= count($dados)){

            foreach(array_slice($dados, 0, $valor) as $lin){
                $table .= "<tr>";
                foreach($lin as $valor){
                    $table .= '<th>' . $valor . '</th>';
                }
                $table .= "</th>";
            }
        }else {
            $table = "<li>Tamanho Máximo = ".count($dados)."</li>";
        }
        $table .= "</table>";
        return $table;
    })->name('nota.limite')->where('valor', '[0-9]');

    Route::get('/lancar/{nota}/{matricula}/{nome}', function($nota, $matricula, $nome=null){
        $dados = array(
            array("Matricula" => 0, "Nome" => "italo", "Nota" => 10),
            array("Matricula" => 1, "Nome" => "Ben", "Nota" => 5),
            array("Matricula" => 2, "Nome" => "Jeann", "Nota" => 7),
            array("Matricula" => 3, "Nome" => "Gicelli", "Nota" => 9),
        );

        $aux=0;
        $table = '<table>';
        $table = '<table>';
        $table .= '<tr>';
        $table .= '<td>Matricula</td>';
        $table .= '<td>Nome</td>';
        $table .= '<td>Nota</td>';
        $table .= '</tr>';

        if($nome != null){

            foreach($dados as $valor){
                if($valor['Nome'] == $nome){
                    $valor['Nota'] = $nota;
                    $aux = 1;
                    break;
                }
            }
        }else {

            foreach($dados as $valor){
                if($valor['matricula'] == $matricula){
                    $valor['nota'] == $nota;
                    $aux = 1;
                    break;
                }
            }
            
        }
        if($aux == 0){
            return '<li>Não encontrou</li>';
        }

        foreach($dados as $lin){
            $table .= "<tr>";
            foreach($lin as $valor){
                $table .= '<th>' . $valor . '</th>';
            }
            $table .= "</th>";
        }

        $table .= "</table>";
        return $table;
    })->name('nota.lacar')->where('nota', '[0-9]')->where('matricula', '[0-9]');

    Route::get('/conceito/{a}/{b}/{c}', function($a, $b, $c){
        $dados = array(
            array("Matricula" => 0, "Nome" => "italo", "Nota" => 10),
            array("Matricula" => 1, "Nome" => "Ben", "Nota" => 5),
            array("Matricula" => 2, "Nome" => "Jeann", "Nota" => 7),
            array("Matricula" => 3, "Nome" => "Gicelli", "Nota" => 9),
        );
        $table = '<table>';
        $table = '<table>';
        $table = '<table>';
        $table .= '<tr>';
        $table .= '<td>Matricula</td>';
        $table .= '<td>Nome</td>';
        $table .= '<td>Nota</td>';
        $table .= '</tr>';

        foreach($dados as $valor){
            if($valor['Nota'] == $a){
                $valor['Nota'] == 'A';
            }elseif($valor['Nota'] >= $b){
                $valor['Nota'] == 'B';
            }elseif($valor['Nota'] >= $c){
                $valor['Nota'] == 'C';
            }else{
                $valor['Nota'] == 'D';
            }
        }

        foreach($dados as $lin){
            $table .= "<tr>";
            foreach($lin as $valor){
                $table .= '<th>' . $valor . '</th>';
            }
            $table .= "</th>";
        }

        $table .= "</table>";
        return $table;
    })->name('nota.conteito')->where('a','[0-9]')->where('b','[0-9]')->where('c','[0-9]');

    Route::get('/conceito', function(Request $request){
        $dados = array(
            array("Matricula" => 0, "Nome" => "italo", "Nota" => 10),
            array("Matricula" => 1, "Nome" => "Ben", "Nota" => 5),
            array("Matricula" => 2, "Nome" => "Jeann", "Nota" => 7),
            array("Matricula" => 3, "Nome" => "Gicelli", "Nota" => 9),
        );

        $table = '<table>';
        $table = '<table>';
        $table = '<table>';
        $table .= '<tr>';
        $table .= '<td>Matricula</td>';
        $table .= '<td>Nome</td>';
        $table .= '<td>Nota</td>';
        $table .= '</tr>';

        foreach($dados as $valor){
            if($valor['Nota'] >= $request->input('A')){
                $valor['Nota'] == 'A';
            }elseif($valor['Nota'] >= $request->input('B') && $valor['Nota'] < $request->input('A')){
                $valor['Nota'] == 'B';
            }elseif($valor['Nota'] >= $request->input('C') && $valor['Nota'] < $request->input('B')){
                $valor['Nota'] == 'C';
            }else{
                $valor['Nota'] == 'D';
            }
        }

        foreach($dados as $lin){
            $table .= "<tr>";
            foreach($lin as $valor){
                $table .= '<th>' . $valor . '</th>';
            }
            $table .= "</th>";
        }

        $table .= "</table>";
        return $table;
    })->where('A', '[0-9]+')->where('B', '[0-9]+')->where('C', '[0-9]+');
});
