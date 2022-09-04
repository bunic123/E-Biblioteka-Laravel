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
            'broj_telefona' => $request->broj_telefona,
            'admin' => 'ne'
        ]);


        return response()->json([
            'poruka' => 'Uspesno ste se registrovali!'
        ]);
    }




    public function prijava(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'poruka' => 'Pokusajte ponovo!'
            ]);
        } else {
            return response()->json(
                [
                    'poruka' => 'Uspesno ste se prijavili!',
                    'admin' => $user->admin,
                ]
            );
        }
    }
}
