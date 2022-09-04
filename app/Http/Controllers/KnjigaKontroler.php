<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KnjigaKontroler extends Controller
{

    public function vratiSveKnjige()
    {
        $sveKnjige = DB::table('knjigas')->get();

        return response()->json(['sveKnjige' => $sveKnjige]);
    }


    public function obrisiKnjigu($id)
    {

        DB::table('knjigas')->where('id', $id)->delete();

        return response()->json(['poruka' => 'Knjiga je obrisana!']);
    }


    public function izmenaKnjige($id)
    {
        $knjiga = DB::table('knjigas')->where('id', $id)->first();

        return response()->json(['knjiga' => $knjiga]);
    }


    public function azurirajKnjigu($id, Request $request)
    {
        DB::table('knjigas')
            ->where('id', $id)
            ->update([
                'naziv' => $request->naziv,
                'opis' => $request->opis,
                'pisac' => $request->pisac,
                'cena' => $request->cena,
                'kategorija' => $request->kategorija
            ]);

        return response()->json(['poruka' => 'Knjiga je azurirana!']);
    }


    public function sacuvajKnjigu(Request $request)
    {
        DB::table('knjigas')->insert([
            'naziv' => $request->naziv,
            'opis' => $request->opis,
            'pisac' => $request->pisac,
            'cena' => $request->cena,
            'kategorija' => $request->kategorija,
        ]);

        return response()->json(['poruka' => 'Knjiga je sacuvana!']);
    }


    public function pretraga($nazivKnjige)
    {
        $knjige = DB::table('knjigas')->where("naziv", "like", "%$nazivKnjige%")->get();

        return response()->json(['knjige' => $knjige]);
    }


    public function filter($selectValue, $filterSort)
    {
        $knjige = DB::table('knjigas')->orderBy("$selectValue", "$filterSort")->get();

        if ($filterSort === 'ASC')
            $filterSort = 'DESC';
        else
            $filterSort = 'ASC';

        return response()->json(['knjige' => $knjige, 'filterSort' => $filterSort]);
    }
}
