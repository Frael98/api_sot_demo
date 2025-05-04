<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {

        //Validar credenciales
        $credential = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // Intento de inicio de sesion
        if (Auth::attempt($credential)) {
            $user = Auth::user();

            //Creamos el token
            //Si no se especifica las abilities tiene acceso total
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user
            ], 200);
        }

        return response()->json(['error' => 'Credenciales invalidas'], 401);
    }

    public function signUp(Request $request)
    {

        //Validar credenciales
        $request->validate([
            'name' => 'required|string|max:30|',
            'email' => 'required|unique:users|email|max:30|string',
            'password' => 'required|string'
        ]);

        $newUser = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);

        $token = $newUser->createToken('user')->plainTextToken;

        return response()->json([
            'message' => 'Usuario creado correctamente',
            'user' => $newUser,
            'token' => $token
        ], 201);
    }


    public function logout(Request $request)
    {
        // Eliminamos el token
        $request->user()->currentAccessToken()->delete();

        return response()->json(['mensaje' => 'Sesión cerrada'], 200);
    }
}
