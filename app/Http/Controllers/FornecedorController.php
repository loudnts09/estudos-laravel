<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index', ['titulo' => 'Fornecedor']);
    }

    public function listar(Request $request){

        $fornecedores = Fornecedor::with(['produtos'])->where(
            'nome', 'like', '%' . $request->input(('nome')) . '%')
            ->where('site', 'like', '%' . $request->input(('site')) . '%')->where('uf', 'like', '%' . $request->input(('uf')) . '%')
            ->where('email', 'like', '%' . $request->input(('email')) . '%')
            ->paginate(2);

        return view('app.fornecedor.listar', ['titulo' => 'Fornecedor', 'fornecedores' => $fornecedores, 'request' =>$request->all()]);
    }

    public function adicionar(Request $request){
        
        $msg = '';

        if($request->input('_token') != '' && $request->input('id') == ''){
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];
            
            $feedback = [
                'required' => 'O campo :attribute deve ser prenchido',
                'nome.min' => 'O campo deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo deve ter no mínimo 3 caracteres',
                'uf.max' => 'O campo deve ter no máximo 3 caracteres',
                'email.email' => 'O campo e-mail não foi preenchido corretamente'
            ];
            
            $request->validate($regras, $feedback);
            
            echo 'Chegamos até aqui';

            $fornecedor = new Fornecedor();

            $fornecedor->create($request->all());

            $msg = 'Cadastro realizado com sucesso!';
        }
        else if($request->input('_token') != '' && $request->input('id') != ''){
            $fornecedor = Fornecedor::find($request->input('id'));
            $atualizacao = $fornecedor->update($request->all());

            if($atualizacao){
                $msg = 'Atualização realizada com sucesso';
            }
            else{
                $msg = 'Falha ao atualizar';
            }
            return redirect()->route('app.fornecedor.adicionar', ['titulo' => 'adicionar', 'id' => request()->input('id'),'msg' => $msg]);

        }

        return view('app.fornecedor.adicionar', ['titulo' => 'adicionar'], ['msg' => $msg]);
    }

    public function editar(int $id, string $msg = ''){
        
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['titulo' => 'editar'], ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir(int $id){
        $fornecedor = Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor');
    }


}
