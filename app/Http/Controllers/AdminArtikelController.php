<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Artikel;
use App\User;

class AdminArtikelController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        // if(Auth::user()->level == 'user') {
        //     //Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
        //     echo "anda dilarang masuk ke halaman admin";
        //     //return redirect()->to('/');
        // }
        // else{
        //     $daftarArtikel = Artikel::all();
        //     //return $daftarArtikel;
        //     return view('daftarArtikel', compact('daftarArtikel'));
        // }
        $daftarArtikel = Artikel::all();
        return view('/daftarArtikel', compact('daftarArtikel'));
        //$req->session()->put('data',$req->input());
        //$daftarArtikel = DB::table('artikel')->get();

        // memanggil view index
        //return $daftarArtikel;
        //return view('daftarArtikel', ['artikel' => $daftarArtikel]);

        //compact itu nama bladenya

    }
    public function tambah()
    {
        if(Auth::user()->level == 'user') {
            //Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            //echo "anda dilarang masuk ke halaman admin";
            return redirect()->to('/news');
        }

        // memanggil view tambah
        $user = User::all();
        return view('/tambahArtikel', compact('dataUser'));
        //return view('tambahArtikel');
    }

    // method untuk insert data ke table artikel
    public function store(Request $request)
    {
        // insert data ke table artikel
        $judul = $request->input('judul');
        $isi = $request->input('isi');
        //$gambar = $request->file('gambar');
        if($request->file('gambar')){
            $gambar = $request->file('gambar')->store('gambar' , 'public');
        }else{
            $gambar = null;
        }

        // isi dengan nama folder tempat kemana file diupload
        //$tujuan_upload = 'data_gambar';
        //$gambar->move($tujuan_upload,$gambar->getClientOriginalName());



        $data=array('title'=>$judul,
                    'excerpt'=>$isi,
                    'status'=>'published',
                    'user_id'=>'2',
                    'thumbnail'=>$gambar,
                    'user_id'=> \Auth::user()->id,
                    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString());

        DB::table('artikel')->insert($data);
        // alihkan halaman ke halaman artikel

        //echo "berhasil insert.<br/>";
        //echo "<a href = '/artikel'>Click Here</a> to go back.";

        //$request->session()->flash('Sukses', 'Data Berhasil Di Tambahkan');
        return redirect('/artikel');
    }

    // method untuk update data ke table artikel
    public function edit($id)
    {
        //edit data ke table artikel
        DB::table('users')->update([]);
        //alihkan halaman ke halaman artikel
        return redirect('/artikel');
    }

    public function delete($id)
    {
        //edit data ke table artikel
        DB::table('artikel')->where('id', $id)->delete();
        return redirect('artikel')->with('status', 'Atrikel berhasil dihapus')->withSuccess('Pesan, Artikel berhasil dihapus!');;
        //alihkan halaman ke halaman artikel
        //return redirect('/artikel');
        //echo "berhasil delete, idnya : " . $id;
    }

    //USER
    public function halamanArtikel()
    {
        $daftarArtikel = DB::table('artikel')->get();

        //$req->session()->put('data',$req->input());
        //$daftarArtikel = DB::table('artikel')->get();
        // memanggil view index
        //return $daftarArtikel;
        return view('tampilArtikel', ['artikel' => $daftarArtikel]);
    }

}
