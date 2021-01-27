<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sValController extends Controller
{
    public function goForm(Request $request){
        return view("form");
    }

    public function testMail(Request $request){
        $validateMail = $request->validate([
            'email' => 'required|exists:users|email'
        ]);

        $data["return"]=$request->input("email");

        return view("ok",$data);
    }
}
