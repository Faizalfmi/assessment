<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        ->join('provinces as provinsi', 'forms.id_provinsi', '=', 'provinsi.id')
        ->join('cities as kota', 'forms.id_kota', '=', 'kota.id')
        ->join('provinces as provinsi_lahir', 'forms.provinsi_lahir', '=', 'provinsi_lahir.id')
        ->join('cities as kota_lahir', 'forms.kota_lahir', '=', 'kota_lahir.id')
        ->select(
            'forms.*',
            'provinsi.provinsi as nama_provinsi',
            'kota.kota as nama_kota',
            'provinsi_lahir.provinsi as nama_provinsi_lahir',
            'kota_lahir.kota as nama_kota_lahir'
        )
        ->get();

    
        
        
        return view ('home', ['data' => $data,'data2' => $data2]);
    }
    public function list(){
        $data = DB::table('forms')->get();
        $data2 = DB::table('forms')
        ->join('provinces as provinsi', 'forms.id_provinsi', '=', 'provinsi.id')
        ->join('cities as kota', 'forms.id_kota', '=', 'kota.id')
        ->join('provinces as provinsi_lahir', 'forms.provinsi_lahir', '=', 'provinsi_lahir.id')
        ->join('cities as kota_lahir', 'forms.kota_lahir', '=', 'kota_lahir.id')
        ->select(
            'forms.*',
            'provinsi.provinsi as nama_provinsi',
            'kota.kota as nama_kota',
            'provinsi_lahir.provinsi as nama_provinsi_lahir',
            'kota_lahir.kota as nama_kota_lahir'
        )->where('id_user', Auth::user()->id)
        ->get();

    
        
        
        return view ('history', ['data' => $data,'data2' => $data2]);
    }
}
