<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ValController extends Controller
{
    public function goForm(){
        return view("form");
    }

    public function testForm(Request $request){
        $validateMail = $request->validate([
            'email' => 'required|email',
            'nif' => 'required|regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i',
            'file' => 'required|max:1024',
            'image' => 'required|dimensions:min_width=1920,min_height:1080',
        ]);

        $data["return"]=$request;

        return view("ok",$data);
    }

    public function editUser(){
        $data["nom"]=Auth::user()->name;
        $data["email"]=Auth::user()->email;
        $data["correcte"]=0;
        return view("editUserForm",$data);
    }

    public function ChangeUser(Request $request){
        $request->validate([
            'nom' => 'required',
            'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
        ]);

        if (Auth::user()->email != $request->email){
            $request->validate([
                'email' => 'required|email|unique:users',
            ]);
        }


        $user = User::find(Auth::user()->id);

        $user->name = $request->nom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        
        $data["nom"]=Auth::user()->name;
        $data["email"]=Auth::user()->email;
        $data["correcte"]=1;
        return view("editUserForm",$data);


    }
}
