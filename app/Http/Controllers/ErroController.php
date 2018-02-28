<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Categoria;
use App\Erro;

class ErroController extends Controller
{
    //lista erros de determinada categoria
    public function index(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        return $categoria->erros;
    }
    //busca por um erro
    public function show(Request $request)
    {
        $termo = $request->termo; 
        $erro = DB::select("select * from erros where descricao LIKE '%$termo%'");
        return $erro;        
    }
    //armazena um erro de determinada categoria
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
            'categoria_id'   =>'required',
            'descricao'      => 'required|string|unique:erros',
        ],$messages);

        if ($validator->fails())
        {
            return response()
                ->json($validator->errors());
        }
        Erro::create($request->all());
        return Erro::all();
    }
    //edita um erro de determinada categoria
     public function update(Request $request, $id)
    {
        $messages = 
        [
        'required' => 'O campo é obrigatório',
        'string'=>'O campo deve ser string'
        ];
        $validator = Validator::make(
        $request->all(),
        [
            'categoria_id'   =>'required',
            'descricao'      => 'required|string|unique:erros',
        ],$messages);

        if ($validator->fails())
        {
            return response()
                ->json($validator->errors());
        }
        Erro::find($id)->update($request->all());
        return $request->all();
    }
    //apaga um erro de determinada categoria
     public function destroy($id)
    {
        Erro::find($id)->delete();
        return Erro::all();
    }
}
