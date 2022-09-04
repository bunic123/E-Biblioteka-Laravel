<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthKontroler extends Controller
{
    public function registracija(Request $request)
    {
        $user = User::create([
            'ime_prezime' => $request->ime_prezime,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'broj_telefona' => $request->broj_telefona
        ]);

        $user->createToken("TokenRegister-"  . $user->email)->plainTextToken;

        return response()->json([
            'poruka' => 'Uspesno ste se registrovali!'
        ]);
    }
}
