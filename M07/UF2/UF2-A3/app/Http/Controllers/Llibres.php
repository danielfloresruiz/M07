<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Llibre;

class Llibres extends Controller
{
    //

    public function index(){
        $data['llibres']=Llibre::all();

        return view('llibres.crud',$data);
    }

    public function create(){
        return view("llibres.createLliblre");
    }

    public function store(Request $request){
        
        $llib = new Llibre();
        $llib->nombre=$request->nom;
        $llib->resumen=$request->resum;
        $llib->npagina=$request->npagines;
        $llib->edicion=$request->edicio;
        $llib->autor=$request->autor;
        $llib->precio=$request->preu;

        $llib->save();

        return redirect('llistarLlibres');
    }

    public function delete($id){
        Llibre::destroy($id);

        return redirect('llistarLlibres');
    }

    public function edit($id){
        $llib = Llibre::find($id);
        $data["llibre"] = $llib;
        return view("llibres.formEdit", $data);
    }

    public function update(Request $request){

        $llib = Llibre::find($request->id);

        $llib->nombre = $request->nom;
        $llib->resumen = $request->resum;
        $llib->npagina = $request->npagines;
        $llib->edicion = $request->edicio;
        $llib->autor = $request->autor;
        $llib->precio = $request->preu;

        $llib->save();
        
        return redirect('llistarLlibres');
    }
}
