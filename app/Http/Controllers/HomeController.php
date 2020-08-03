<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->level == 'admin') {
            return redirect('/artikel');
        }

        if(Auth::user()->level == 'user') {
            return redirect('/news');
        }

        //return redirect('/artikel');

        //return view('daftarArtikel');
    }

    public function logout()
    {
        \Auth::logout();
        // \Admin::logout();
        // \User::logout();
        return redirect('/login'); // ini untuk redirect setelah logout
    }
}
