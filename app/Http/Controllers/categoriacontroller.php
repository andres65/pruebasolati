<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorias;

class categoriacontroller extends Controller
{
    //Funciones del controlador
        public function index()
        {
            $categoria =  $this->getCategoria();
            return view('categorias.index', compact('categoria'));
        }

        public function create()
        {
            return view('categorias.create');
        }

        public function store(Request $request)
        {
            $request->validate([
                'cat_name' => 'required',
                'cat_description' => 'required',
            ]);

            $this->insertCategoria($request);
            return redirect()->route('categoria.index')->with('status', 'La Categoría se creó con éxito');

        }

        public function edit($id)
        {
            $categoria =  $this->getCategoriaId($id);
            $result = json_encode($categoria);
            $output = json_decode($result, true);
            $datos = $output['original'];

            return view('categorias.edit', compact('datos'));
        }

        public function update(Request $request, $id)
        {
            $request->validate([
                'cat_name' => 'required',
                'cat_description' => 'required',
            ]);

            $this->updateCategoria($request,$id );
            return redirect()->route('categoria.index')->with('status', 'Se editó con éxito la Categoría');
        }


        public function destroy($id)
        {
            $this->deleteCategoria($id);
            return redirect()->route('categoria.index')->with('status', 'La Categoría se eliminó con éxito');
        }


    //API REST WEB SERVICE
    public function getCategoria(){
        return response()->json(categorias::all(),200);
    }

    public function getCategoriaId($id){
        $categoria = categorias::find($id);

        if(is_null($categoria)){
            return response()->json(['Mensaje' => 'Registro no encontrado'],404);
        }

        return response()->json($categoria::find($id),200);
    }

    public function insertCategoria(Request $request){
        $categoria = categorias::create($request->all());
        return response($categoria,200);
    }

    public function updateCategoria(Request $request, $id){
        $categoria = categorias::find($id);
        if(is_null($categoria)){
            return response()->json(['Mensaje' => 'Registro no encontrado'],404);
        }
        $categoria->update($request->all());
        return response($categoria,200);
    }

    public function deleteCategoria($id){
        $categoria = categorias::find($id);
        if(is_null($categoria)){
            return response()->json(['Mensaje' => 'Registro no encontrado'],404);
        }
        $categoria->delete();
        return response()->json(['Mensaje' => 'Registro Eliminado'],200);
    }
}
