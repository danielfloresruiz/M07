<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValController extends Controller
{
    public function goForm(Request $request){
        return view("form");
    }

    public function testForm(Request $request){
        $validateMail = $request->validate([
            'email' => 'required|exists:users|email',
            'nif' => 'required|regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i',
            'file' => 'required|max:1024',
            'image' => 'required|dimensions:min_width=1920,min_height:1080',
        ]);

        $data["return"]=$request->input("email");

        return view("ok",$data);
    }
}



