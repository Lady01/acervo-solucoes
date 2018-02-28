<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Erro;
use App\Solucao;

class SolucaoController extends Controller
{
    public function index(Request $request, $id)
    {
        $erro = Erro::find($id);
        return $erro->solucoes;
    }
    public function store(Request $request)
    {
        $messages = 
        [
        'required' => 'O campo é obrigatório',
        'string'=>'O campo deve ser string'
        ];
        $validator = Validator::make(
        $request->all(),
        [
            'erro_id'      =>'required',
            'descricao'      => 'required|string|unique:solucoes',
        ],$messages);

        if ($validator->fails())
        {
            return response()
                ->json($validator->errors());
        }
        Solucao::create($request->all());
        return Solucao::all();
    }
    public function update(Request $request, $id)
    {
        $messages = 
        [
        'required' => 'O campo eh obrigatorio',
        'string'=>'O campo deve ser string'
        ];
        $validator = Validator::make(
        $request->all(),
        [
            'erro_id'      =>'required',
            'descricao'      => 'required|string|unique:categorias',
        ],$messages);

        if ($validator->fails())
        {
            return response()
                ->json($validator->errors());
        }
        Solucao::find($id)->update($request->all());
        return $request->all();
    }

    public function destroy($id)
    {
        Solucao::find($id)->delete();
        return Solucao::all();
    }
}
