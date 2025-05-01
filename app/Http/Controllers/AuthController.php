<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(Request $request){

        //Validar credenciales
        $credential = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credential)){
            $user = Auth::user();

            //Creamos el token
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user
            ]);
        }

        return response()->json(['error' => 'Credenciales invalidas'], 401);
    }


    public function logout(Request $request){
        // Eliminamos el token
        $request->user()->currentAccessToken()->delete();
        
        return response()->json(['mensaje' => 'Sesión cerrada'], 200);
    }
}
