<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Events\Registered;
use App\Models\Contracts;
use App\Models\UsersList;
use App\Models\User;

use Illuminate\Support\Facades\Log;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //
    }

    public function GoDashboard(){
        $data["user_id"]=Auth::user()->id;
        $data["user_rol"]=Auth::user()->id_rol;

        return view('dashboard',$data);
    }

    public function GoContracts(){
        $data["user_id"]=Auth::user()->id;
        $data["user_rol"]=Auth::user()->id_rol;
        $data["contracts"]=Contracts::all();
        $data["uses"]=UsersList::all();

        return view('viewContract',$data);
    }


    public function GoUpContract(Request $request){

        $nameFile = $_FILES["arxiu"]["name"];
        $file = $request->file('arxiu');
        \Storage::disk('local')->put($nameFile,  \File::get($file));
      
        
        $oldContract = Contracts::find($request->id_contract);

        $addContract = new Contracts();
        $addContract->id_tutor = $oldContract->id_tutor;
        $addContract->id_alumne = $oldContract->id_alumne;
        $addContract->id_empresa = $oldContract->id_empresa;

        if ($request->rolSignatory == 1){
            $addContract->firma_directora = 1;
        }else{
            $addContract->firma_directora = $oldContract->firma_directora;
        }

        if ($request->rolSignatory == 3){
            $addContract->firma_alumne = 1;
        }else{
            $addContract->firma_alumne = $oldContract->firma_alumne;
        }

        if ($request->rolSignatory == 4){
            $addContract->firma_empresa = 1;
        }else{
            $addContract->firma_empresa = $oldContract->firma_empresa;
        }

        $addContract->name_document = $nameFile;
        $addContract->save();
        

        return redirect('contracts');
    }

    public function GoAddTeacher(){
        $data["user_id"]=Auth::user()->id;
        $data["userAddRol"] = 2;
        return view('addUser',$data);
    }

    public function GoAddStudent(){
        $data["user_id"]=Auth::user()->id;
        $data["userAddRol"] = 3;
        return view('addUser',$data);
    }

    public function GoAddCompany(){
        $data["user_id"]=Auth::user()->id;
        $data["userAddRol"] = 4;
        return view('addUser',$data);
    }

    public function GoAddContract(){
        $data["user_id"]=Auth::user()->id;
        $data["users"]=UsersList::all();
        return view('addContract',$data);
    }

    public function CreateContract(Request $request){
        $request->validate([
            'tutor' => 'required',
            'alumne' => 'required',
            'empresa' => 'required',
            'contracte' => 'required',
        ]);

        $nameFile = $_FILES["contracte"]["name"];
        $file = $request->file('contracte');
        \Storage::disk('local')->put($nameFile,  \File::get($file));
        
        
        $addContract = new Contracts();
        $addContract -> id_tutor = $request->tutor;
        $addContract -> id_alumne = $request->alumne;
        $addContract -> id_empresa = $request->empresa;
        $addContract -> name_document = $nameFile;
        $addContract->save();
        


        return redirect('dashboard');
    }

    public function CreateUser(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'pass' => 'required|string|min:8|required_with:password_confirmation|same:password_confirmation',
            'dni' => 'required|min:9',
            'rol' => 'required',
        ]);
 

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->pass),
            'dni' => $request->dni,
            'id_rol' => $request->rol,
        ]);

        return redirect('dashboard');
    }














    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}