<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    public function index()
    {
        $provinsi = DB::table('provinces')->get();
        $kota = DB::table('cities')->get();
        $provinsi2 = DB::table('provinces')->get();
        $kota2 = DB::table('cities')->get();
        return view('daftar', ['provinsi' =>$provinsi, 'kota'=> $kota, 'provinsi2' =>$provinsi2, 'kota2'=> $kota2]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'sekarang' => 'required',
                'ktp' => 'required',
                'provinsi' => 'required',
                'kota' => 'required',
                'kecamatan' => 'required',
                'telepon' => 'required',
                'hp' => 'required',
                'email' => 'required',
                'kewargaan' => 'required',
                'tgl_lahir' => 'required',
                'provinsi_lahir' => 'required',
                'kota_lahir' => 'required',
                'kelamin' => 'required',
                'status' => 'required',
                'agama' => 'required',
                
            ]);
            
            Form::create([
                'id_user' => Auth::user()->id,
                'nama' => $request->nama,
                'alamat_ktp' => $request->ktp,
                'alamat_sekarang' => $request->sekarang,
                'id_provinsi' => $request->provinsi,
                'id_kota' => $request->kota,
                'kecamatan' => $request->kecamatan,
                'telepon' => $request->telepon,
                'hp' => $request->hp,
                'email' => $request->email,
                'kewargaan' => $request->kewargaan,
                'tgl_lahir' => $request->tgl_lahir,
                'provinsi_lahir' => $request->provinsi_lahir,
                'kota_lahir' => $request->kota_lahir,
                'kelamin' => $request->kelamin,
                'status' => $request->status,
                'agama' => $request->agama,
                
                
            ]);
    
            return redirect(route('home'))->with('success', 'Berhasil Mendaftar');
        } catch (\Throwable $th) {
            return back()->withInput()->withErrors(['msg' => $th->getMessage()]);
        }
    }
}
