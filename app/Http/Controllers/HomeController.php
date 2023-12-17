<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function index(){
        $data = DB::table('forms')->get();
        $data2 = DB::table('forms')
    ->join('provinces', 'forms.id_provinsi', '=', 'provinces.id')
    ->join('cities', 'forms.id_kota', '=', 'cities.id')
    ->select(
        'forms.*',
        'provinces.provinsi as nama_provinsi',
        'cities.kota as nama_kota'
    )->get();
    
        
        
        return view ('home', ['data' => $data,'data2' => $data2]);
    }
}
