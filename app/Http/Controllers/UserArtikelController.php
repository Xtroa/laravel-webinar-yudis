<?php

namespace App\Http\Controllers;
use App\Artikel;
use DB;
use Auth;
use User;
use Illuminate\Http\Request;

class UserArtikelController extends Controller
{
    //
    // function __construct()
    // {
    //     $this->middleware('user');
    // }

    public function index()
    {
        $daftarArtikel = DB::table('artikel')->get();

        //$req->session()->put('data',$req->input());
        //$daftarArtikel = DB::table('artikel')->get();
        // memanggil view index
        //return $daftarArtikel;
        return view('tampilArtikel', ['artikel' => $daftarArtikel]);
    }
}

