<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Form;
use Barryvdh\DomPDF\Facade\Pdf;
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
                'nik' => 'required',
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
                'picture' => 'required',
                
            ]);

            $file = $request->file('picture');
            $filename = uniqid() . "_" . $file->getClientOriginalName();
            $file->storeAs('public/', $filename);
            
            
            Form::create([
                'id_user' => Auth::user()->id,
                'nama' => $request->nama,
                'nik' => $request->nik,
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
                'picture' => $filename,
                
                
            ]);
    
            return redirect(route('home'))->with('success', 'Berhasil Mendaftar');
        } catch (\Throwable $th) {
            return back()->withInput()->withErrors(['msg' => $th->getMessage()]);
        }
    }

    public function edit($id)
    {
        $data = DB::table('forms')->where('id', $id)->first();
        $provinsi = DB::table('provinces')->get();
        $kota = DB::table('cities')->get();
        $provinsi2 = DB::table('provinces')->get();
        $kota2 = DB::table('cities')->get();
        return view('edit', ['provinsi' =>$provinsi, 'kota'=> $kota, 'provinsi2' =>$provinsi2, 'kota2'=> $kota2, 'data'=> $data]);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'id_user' => 'required',
                'nama' => 'required',
                'nik' => 'required',
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
                'picture' => 'required',
                
            ]);
            
            $form = Form::find($id);

            if($request->picture){
                $file = $request->file('picture');
                $filename = uniqid() . "_" . $file->getClientOriginalName();
                $file->storeAs('public/', $filename);
                
                $form->update([
                    'picture' => $filename
                ]);
            }
            $form->update([
                'id_user' => $request->id_user,
                'nama' => $request->nama,
                'nik' => $request->nik,
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
    
            return redirect(route('home'))->with('success', 'Berhasil Mengubah Data');
        } catch (\Throwable $th) {
            return back()->withInput()->withErrors(['msg' => $th->getMessage()]);
        }
    }



    public function getKota(Request $request){
        $kota = City::where("id_provinsi",$request->provID)->pluck('id','kota');
        return response()->json($kota);
    }

    public function destroy(string $id)
    {
        $form = Form::find($id);

        $form->delete();

        return redirect(route('home'))->with('success', 'Data telah dihapus');
    }

    public function cetak_pdf($id)
    {
    	$data = DB::table('forms')
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
        )->where('forms.id', $id)
        ->first();
        $waktu = now();
 
    	$pdf = Pdf::loadview('cetak',['data'=>$data, 'waktu' => $waktu]);
    	return $pdf->download('data-pendaftaran-' . $data->nama . '.pdf');
    }
}
