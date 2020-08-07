<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Artikel;
use App\User;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
//use Psy\Util\Str;

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
        if(\Auth::user()->level == 'user') {
            //Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            echo "anda dilarang masuk ke halaman admin";
            //return redirect()->to('/');
        }
        else{
            $daftarArtikel = Artikel::all()->sortByDesc('created_at');
            return view('/daftarArtikel', compact('daftarArtikel'));
        }
        // $daftarArtikel = Artikel::all();
        // return view('/daftarArtikel', compact('daftarArtikel'));

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
        $kutipan = $request->input('kutipan');
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
                    'excerpt'=>$kutipan,
                    'content'=>$isi,
                    'status'=>'published',
                    'thumbnail'=>$gambar,
                    'user_id'=> \Auth::user()->id,
                    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'slug' => Str::slug($judul));

        DB::table('artikel')->insert($data);
        // alihkan halaman ke halaman artikel

        //echo "berhasil insert.<br/>";
        //echo "<a href = '/artikel'>Click Here</a> to go back.";

        //$request->session()->flash('Sukses', 'Data Berhasil Di Tambahkan');
        return redirect('/artikel');
    }

    // method untuk baca data
    public function edit($id)
    {
        //$daftarArtikel = DB::table('artikel')->find($id);
        //edit data ke table artikel

        // //alihkan halaman ke halaman artikel
        //return view('ubahArtikel', ['artikel' => Artikel::findOrfAIL($id)]);
        //var_dump ($daftarArtikel);

        // mengambil data books berdasarkan id yang dipilih
        $artikel = DB::table('artikel')->where('id',$id)->first();
        // passing data books yang didapat ke view edit.blade.php
        return view('ubahArtikel', compact('artikel'));
    }

    // method untuk update data ke table artikel
    public function Update(Request $request)
    {

        // //edit data ke table artikel
        // $daftarArtikel = DB::table('artikel')->find($id);
        // // //alihkan halaman ke halaman artikel
        // return view('ubahArtikel', ['artikel' => $daftarArtikel]);
        // update data books

        if($request->hasFile('gambar')){
            $gambar = $request->file('gambar')->store('gambar' , 'public');

        } else {
            // $gambar = DB::table('artikel')
            //         ->where('id','=', $request->input('idA'))
            //         ->get('thumbnail');

            $getGambar = DB::table('artikel')->select('thumbnail')->where('id', '=', $request->input('idA'))->first();
            //echo "gambar : " . $gambar->thumbnail . "</div>";
            $gambar = $getGambar->thumbnail;
        }

        // DB::table('artikel') -> where('id', $request -> id) -> update([
        //     'title' => $request->judul,
        //     'excerpt' => $request->isi,
        //     'thumbnail' => $gambar,
        // ]);

        // echo "gambar : " . $request->judul . "</div>";
        // echo "gambar : " . $request -> isi . "</div>";
        // echo "gambar : " . $gambar . "</div>";
        $judul = $request->input('judul');
        $kutipan = $request->input('kutipan');
        $isi = $request->input('isi');
        $status = $request->input('status');

        $data=array('title'=>$judul,
                    'excerpt'=>$kutipan,
                    'content'=>$isi,
                    'status'=>$status,
                    'thumbnail'=>$gambar,
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'slug' => Str::slug($judul));

        DB::table('artikel')->where('id', $request->input('idA'))->Update($data);
        // alihkan halaman edit ke halaman books
        return redirect('/artikel') -> with('status', 'Data artikel Berhasil DiUbah');

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
