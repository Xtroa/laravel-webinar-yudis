<?php

namespace App\Http\Controllers;
use App\Artikel;
use App\User;
use DB;
use Auth;
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
        // $daftarArtikel = DB::table('artikel')->get();
        // return view('tampilArtikel', ['artikel' => $daftarArtikel]);


        //$req->session()->put('data',$req->input());
        //$daftarArtikel = DB::table('artikel')->get();
        // memanggil view index
        //return $daftarArtikel;


        // $artikel = Artikel::all();
       // $artikel = Artikel::where('status', 'published')->get();

        $artikel = Artikel::where('status', 'published')->orderBy('created_at', 'desc')->paginate(6);
        return view('/tampilArtikel', compact('artikel'));
    }

    public function detail($slug)
    {
        $artikel = Artikel::where('slug', $slug)->get();
        return view('/detailArtikel', compact('artikel'));
        // return $artikel;
        // die;
    }
}

