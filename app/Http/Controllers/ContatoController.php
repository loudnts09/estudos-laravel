<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){

        $motivo_contatos = MotivoContato::all();

        return view("site.contato", ['motivo_contatos' => $motivo_contatos, 'titulo' => 'Contato']);

    }

    public function salvar(Request $request){

        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contato_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
                
            'nome.min' => 'O campo precisa possuir no mínimo 3 caracteres',
            'nome.max' => 'O campo precisa possuir no máximo 40 caracteres',
            'nome.unique' => 'O nome informado já está em uso',
            'email.email' => 'O email informado não é válido',
            'mensagem.max' => 'A mensagem deve possuir no máximo 2000 caracteres',

            'required' => 'O campo :attribute deve ser preenchido'
        ];

        $request->validate($regras, $feedback);        
        SiteContato::create($request->all());

        return redirect()->route('site.principal');
    }
}
