<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function goEdicio(){
        $data["nom"]=Auth::user()->name;
        $data["email"]=Auth::user()->email;
        $data["cognom"]=Auth::user()->cognoms;
        $data["correcte"]=0;
        return view("edicio",$data);
    }

    public function ChangeUser(Request $request){

        if ($request->password!=null){
            $request->validate([
                'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x]).*$/',
            ]);
        }
        $request->validate([
            'nom' => 'required',
            'cognom' => 'required',
        ]);

        if (Auth::user()->email != $request->email){
            $request->validate([
                'email' => 'required|email|unique:users',
            ]);
        }
        $user = User::find(Auth::user()->id);

        $user->name = $request->nom;
        $user->email = $request->email;
        $user->cognoms = $request->cognom;
        if ($request->password!=null){
            $user->password = Hash::make($request->password);
        }

        $user->save();
        
        return view("okok");
    }

    public function ChangeImgUser(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=500,max_height=500',
        ]);

        $nameFile = $_FILES["image"]["name"];
        $file = $request->file('image');
        \Storage::disk('local')->put($nameFile,  \File::get($file));

        $user = User::find(Auth::user()->id);

        $user->imgPerfil = $nameFile;
        $user->save();

        $data["nom"]=Auth::user()->name;
        $data["email"]=Auth::user()->email;
        $data["cognom"]=Auth::user()->cognoms;
        $data["correcte"]=1;
        return view("edicio",$data);
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
