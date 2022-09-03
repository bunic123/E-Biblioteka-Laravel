<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class KnjigaKontroler extends Controller
{

    public function vratiSveKnjige()
    {
        $sveKnjige = DB::table('knjigas')->get();

        return response()->json(['sveKnjige' => $sveKnjige]);
    }


    public function obrisiKnjigu($id)
    {

        LOG::debug("USAO OVDE");

        DB::table('knjigas')->where('id', $id)->delete();

        return response()->json(['poruka' => 'Knjiga je obrisana!']);
    }
}
