<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
    
        return Categoria::all();
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
            'nome'      => 'required|string|unique:categorias',
        ],$messages);

        if ($validator->fails())
        {
            return response()
                ->json($validator->errors());
        }
        Categoria::create($request->all());
        return Categoria::all();;

        #$categoria = Categoria::create($request->all);
        #return Categoria::all();
        
    }
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
            'nome'      => 'required|string|unique:categorias',
        ],$messages);

        if ($validator->fails())
        {
            return response()
                ->json($validator->errors());
        }
        Categoria::find($id)->update();
        return $request->all();
    }
     public function destroy($id)
    {
        Categoria::find($id)->delete();
        return Categoria::all();
    }
}
